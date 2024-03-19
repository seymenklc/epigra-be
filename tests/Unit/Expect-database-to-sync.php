<?php
use App\Models\Planet;

it('database-sync-with-swapi', function () {
    Artisan::command('app:sync-database', function () {
        $this->comment('Database sync with swapi');
    })->purpose('Sync database with swapi')->everyThreeMinutes();

    $this->artisan('schedule:run');

    expect(Planet::count())->toBeGreaterThan(0);
});
