<?php

namespace App\Console\Commands;
use Mail;
use Illuminate\Console\Command;
use App\Models\MailingFromSite;

class MailingOfLetters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailing:letters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will send the letters';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
               
        $users = MailingFromSite::all();
        foreach ($users as $user) {
            Mail::send("emails.mailing", ['user' => $user], function ($mail) use ($user) {
                $mail->from('nikitosnov@gmail.com');
                $mail->to($user->email)
                     ->subject('Mailing From Site');
            });
        }
         
        echo 'Operation done';

    }
}
