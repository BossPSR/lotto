<?php

namespace App\Console\Commands;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Console\Command;

class HappyBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $birthdays = User::orWhere('birthday', 'like', '%'.date('-m-d').'%')->where('status', 'อนุมัติ')->get();
        if ($birthdays) {
            foreach ($birthdays as $user) {
                $tran = new Transactions();
                $tran->user_id = $user->id;
                $tran->admin_id = 0;
                $tran->status = 'confirm';
                $tran->direction = 'IN';
                $tran->type = 'BONUS';
                $tran->remark = 'สุขสันต์วันเกิด';
                $tran->amount = 100;
                $tran->save();

                User::where('id', $user->id)->increment('money', 100);
            }
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
