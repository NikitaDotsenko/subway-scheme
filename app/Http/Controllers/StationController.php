<?php

namespace App\Http\Controllers;

use App\Model\Branch;
use App\Model\Station;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StationController extends Controller
{
    public function index()
    {
        return Inertia::render('Stations', [
            'blueBranch' => Branch::find(2)->load(['stations']),
            'redBranch' => Branch::find(1)->load(['stations']),
            'greenBranch' => Branch::find(3)->load(['stations'])
        ]);
    }

    public function show(Station $station, Request $request)
    {
        return Inertia::render('Station', [
            'name' => $station->name,
            'branch' => $station->branch
        ]);
    }

    public function edit(Station $station, Request $request)
    {
        return Inertia::render('StationEdit', [
            'station' => $station,
        ]);
    }
}
