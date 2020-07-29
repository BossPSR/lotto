<template>
    <!--- CHAT -->
    <div v-if="fingerprint != ''">
        <a class="w-100 btn" v-on:click="toggleView()">
                                    <label style="cursor:pointer"><i class="fa fa-comment-dots"></i> ติดต่อ ADMIN</label>
                                </a>
        <div style="">
            <div style="height: 400px; overflow-y:scroll" id="chat-div">
                <div v-for="(data, index) in chat">
                    <div v-if="data.is_admin == 1 && position == 'member'" class="text-left">
                        <label class="bg-info text-white rounded pl-2 pr-2">{{data.text}}</label>
                    </div>
                    <div v-if="data.is_admin == 0 && position == 'member'" class="text-right">
                        <label class="bg-warning text-white rounded pl-2 pr-2">{{data.text}}</label>
                    </div>
                    <div v-if="data.is_admin == 1 && position == 'admin'" class="text-right">
                        <label class="bg-warning text-white rounded pl-2 pr-2">{{data.text}}</label>
                    </div>
                    <div v-if="data.is_admin == 0 && position == 'admin'" class="text-left">
                        <label class="bg-info text-white rounded pl-2 pr-2">{{data.text}}</label>
                    </div>


                    <div v-if="data.is_admin == 1 && position == 'member' && data.image " class="text-left">
                        <a target="_blank" v-bind:href="data.image"><img v-bind:src="data.image" style="width:80%; height:auto"></a>
                    </div>
                    <div v-if="data.is_admin == 0 && position == 'member' && data.image" class="text-right">
                        <a target="_blank" v-bind:href="data.image"><img v-bind:src="data.image"  style="width:80%; height:auto"></a>
                    </div>
                    <div v-if="data.is_admin == 1 && position == 'admin' && data.image" class="text-right">
                        <a target="_blank" v-bind:href="data.image"><img v-bind:src="data.image" style="width:80%; height:auto"></a>
                    </div>
                    <div v-if="data.is_admin == 0 && position == 'admin' && data.image" class="text-left">
                        <a target="_blank" v-bind:href="data.image"><img v-bind:src="data.image" style="width:80%; height:auto"></a>
                    </div>

                </div>
            </div>
            <form v-on:submit="send($event)">
                <div class="row pt-2" style="height: 80px;">
                    <div class="col-md-8 col-md-8 col-8">
                        <input type="text" class="form-control" style="height: 40px !important" id="inputChat">
                    </div>
                    <div class="col-md-2 col-md-2 col-2 pl-0">
                        <label class="btn btn-light w-100" style="height: 40px !important"  for="inputFileChat">รูป</label>
                        <input type="file" class="form-control" accept="image/*" style="height: 40px !important; display:none;" v-on:change="send($event)" id="inputFileChat">
                    </div>
                    <div class="col-md-2 col-md-2 col-2 pl-0">
                        <button class="btn btn-success text-white btn-md w-100 " v-on:click="send($event)">ส่ง</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</template>

<script>
export default {
    props: {
        position: {
            type: String,
            default: 'member'
        },
        fingerprint: {
            type: String,
            default: ''
        }
    },
    data: function() {
        return {
            last_count: 0,
            chat: []
        }
    },
    created: function() {

        const app = this
        this.axios.post('/get_fingerprint', {})
            .then(function(response) {
                if (app.fingerprint == '')
                    app.fingerprint = response.data;
                setInterval(function() {
                    app.reloadChat();
                }.bind(this), 1000);
            })
            .catch(function(error) {
                console.log(error)
            });

    },
    mounted() {
        console.log('Component mounted.')
        if (localStorage.toggle) {
            if (localStorage.toggle == 'on')
                this.toggleView()
        }
    },
    updated() {
        const app = this;
        if (app.last_count != app.chat.length) {
            // app.$forceUpdate();

            var objDiv = document.getElementById("chat-div");
            objDiv.scrollTop = (objDiv.scrollHeight);
        }
        app.last_count = app.chat.length;
    },
    methods: {
        toggleView() {
            if (this.position == 'member') {
                if ($('#app').height() == 500) {
                    $('#app').height(40);
                    localStorage.toggle = 'off';

                } else {
                    localStorage.toggle = 'on';

                    $('#app').height(500);
                }

            }

        },
        reloadChat() {
            const app = this;
            this.axios.post('/get_chat_list', {
                    fingerprint: this.fingerprint,
                    position: this.position
                })
                .then(function(response) {
                    app.chat = response.data;
                })
                .catch(function(error) {
                    console.log(error)
                });


        },
        send($event) {
            const app = this;
            $event.preventDefault();



            let formData = new FormData();
            formData.append('image', $('#inputFileChat').prop('files')[0]);
            formData.append('fingerprint', app.fingerprint);
            formData.append('text', $('#inputChat').val());
            if (app.position == "admin")
                formData.append('is_admin', 1);

            // You should have a server side REST API
            this.axios.post('/add_chat_list',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                .then(function(response) {
                    $('#inputChat').val("")
                    $('#inputFileChat').val("")
                    app.reloadChat()
                })
                .catch(function(error) {
                    console.log(error)
                });
            console.log(this.fingerprint)
        }
    }

}
</script>
