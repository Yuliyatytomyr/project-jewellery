<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
// models
use App\Models\TreshImage;


class CronTrashimagesdelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:trashimagesdelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all trashed images';

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
        $date = Carbon::now()->subMonth();
        $trash_images = TreshImage::whereDate('created_at', '<', $date)
            ->limit(20)
            ->get();

        foreach ($trash_images as $image){
            if(file_exists (public_path($image->image_path) )){
                unlink(public_path($image->image_path));
            }
            $image->delete();
        }

        info('Мусорные изображения успешно удалены! Дата и время: '.Carbon::now());
    }
}
