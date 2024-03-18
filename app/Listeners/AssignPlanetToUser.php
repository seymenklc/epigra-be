<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\Planet;
use App\Models\UserPlanet;
use Illuminate\Http\Request;

class AssignPlanetToUser
{
    /**
     * Create the event listener.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $planets = Planet::all();

        $randomPlanet = $planets->random();

        UserPlanet::create([
            'planet_id' => $randomPlanet->id,
            'user_id' => $event->user->id,
        ]);

    }
}
