<?php

namespace App\Http\Controllers;

use App\Models\UserPlanet;

class UserPlanetController extends Controller
{
    public function index($planetId = null, $userId = null)
    {
        $result = null;

        if (!$planetId && !$userId) {
            return UserPlanet::with('planets', 'users')->get();
        } else if ($planetId && !$userId) {
            $result = UserPlanet::with('planets', 'users')->where('planet_id', $planetId)->get();
        } else if (!$planetId && $userId) {
            $result = UserPlanet::with('planets', 'users')->where('user_id', $userId)->get();
        } else {
            $result = UserPlanet::with('planets', 'users')->where('planet_id', $planetId)->where('user_id', $userId)->get();
        }

        if (!$result->isEmpty()) {
            return response()->json(['error' => 'No data found']);
        }

        return response()->json($result);
    }
}
