<?php

namespace App\Console\Commands;

use App\Models\Image;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ExpireImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all expired images';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Image::query()
            ->where('expires', '<', now())
            ->each(function ($image) {
                Storage::disk('public')->delete($image->filename);
                $image->delete();
            });

        return Command::SUCCESS;
    }
}
