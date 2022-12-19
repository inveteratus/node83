<?php

namespace App\Console\Commands;

use App\Models\Paste;
use Illuminate\Console\Command;

class ExpirePastes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:pastes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all expired pastes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Paste::query()
            ->where('expires', '<', now())
            ->delete();

        return Command::SUCCESS;
    }
}
