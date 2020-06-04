<template>
    <!--- CHAT -->
    <div v-if="fingerprint != ''">
        <a class="w-100 btn" v-on:click="toggleView()">
                                                        <label style="cursor:pointer"><i class="fa fa-comment-dots"></i> CHAT</label>
                                                    </a>
        <div style="">
            <div style="height: 410px; overflow-y:scroll" id="chat-div">
                <div v-for="(data, index) in chat">
                    <div v-if="data.is_admin == 1 && position == 'member'" class="text-left">
                        <label class="bg-warning text-white rounded pl-2 pr-2">{{data.text}}</label>
                    </div>
                    <div v-if="data.is_admin == 0 && position == 'member'" class="text-right">
                        <label class="bg-warning text-white rounded pl-2 pr-2">{{data.text}}</label>
                    </div>
                    <div v-if="data.is_admin == 1 && position == 'admin'" class="text-right">
                        <label class="bg-warning text-white rounded pl-2 pr-2">{{data.text}}</label>
                    </div>
                    <div v-if="data.is_admin == 0 && position == 'admin'" class="text-left">
                        <label class="bg-warning text-white rounded pl-2 pr-2">{{data.text}}</label>
                    </div>
                </div>
            </div>
            <form v-on:submit="send($event)">
                <div class="row" style="max-height: 50px;;">
    
                    <div class="col-md-8 col-sm-8 col-8">
                        <input type="text" class="form-control" style="height: 30px !important" id="inputChat">
                    </div>
                    <div class="col-md-4 col-sm-4 col-4 pl-0">
                        <button class="btn btn-success text-white btn-sm w-100 " v-on:click="send($event)">ส่ง</button>
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
        console.log(app.position)
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
            console.log(this.fingerprint)


        },
        send($event) {
            const app = this;
            $event.preventDefault();
            var data = {
                fingerprint: this.fingerprint,
                text: $('#inputChat').val(),
            }
            console.log(app.position)
            if (app.position == "admin")
                data['is_admin'] = 1;

            this.axios.post('/add_chat_list', data)
                .then(function(response) {
                    $('#inputChat').val("")
                    console.log(response.data)
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
