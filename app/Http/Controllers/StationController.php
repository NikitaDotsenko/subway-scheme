<?php

namespace App\Http\Controllers;

use App\Model\Branch;
use App\Model\Station;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StationController extends Controller
{
    public function index(){
        return Inertia::render('Stations', [
            'blueBranch' => Branch::find(2)->load(['stations'])->toArray(),
            'redBranch' => Branch::find(1)->load(['stations'])->toArray(),
            'greenBranch' => Branch::find(3)->load(['stations'])->toArray()
        ]);
    }

    public function show(Station $station, Request $request){
        return Inertia::render('Station',[
            'name' => $station->name,
            'branch' => $station->branch->toArray()
        ]);
    }
}
