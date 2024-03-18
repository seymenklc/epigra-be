<?php

namespace App\Console\Commands;

use App\Http\Controllers\PlanetController;
use Illuminate\Console\Command;
use Log;

class SyncDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Database sync started');

        $planetController = new PlanetController();
        $plantes = $planetController->syncPlanetsWithDB();

        if ($plantes) {
            Log::info('Database sync completed');
        } else {
            Log::error('Database sync failed');
        }
    }
}
