<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Planet;

class PlanetController extends Controller
{

    public function index()
    {
        $planets = Planet::all();

        if ($planets->isEmpty()) {
            $this->syncPlanetsWithDB();
            $planets = Planet::all();
        }

        return $planets;
    }

    public function detail($id)
    {
        $planet = Planet::find($id);

        if ($planet) {
            return $planet;
        }

        return response()->json([
            'message' => 'Planet not found'
        ], 404);
    }

    public function syncPlanetsWithDB()
    {
        $planets = Http::get("https://swapi.dev/api/planets");
        $planets = $planets['results'];

        if (!$planets) {
            return response()->json([
                'message' => 'Error fetching planets from SWAPI'
            ], 500);
        }

        foreach ($planets as $planet) {
            $existingPlanet = Planet::where('name', $planet['name'])->first();

            if (!$existingPlanet) {
                Planet::create([
                    'name' => $planet['name'],
                    'climate' => $planet['climate'],
                    'gravity' => $planet['gravity'],
                    'population' => $planet['population'],
                    'terrain' => $planet['terrain']
                ]);
            }
        }

        return response()->json([
            'message' => 'Planets synced with DB'
        ], 200);
    }
}
