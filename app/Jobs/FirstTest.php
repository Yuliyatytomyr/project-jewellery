<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FirstTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }


    public function handle()
    {
        throw new Exception('Error', 101);
        info($this->message);
    }

    public function failed(Exception $exception){
        // метод для создания события при неуспешном выплнении задания
        // php artisan queue:retry all - команда для запуска неуспешно выполненых задач снова, можно создать консольную команду и через планировщик запускать в определенный промежуток времени
        info(__CLASS__ . ': ошибка выполнения');
    }
}
