<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateExistingStationRequest;
use App\Model\Branch;
use App\Model\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

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
            'station' => $station,
            'branch' => $station->branch
        ]);
    }

    public function edit(Station $station, Request $request)
    {
        return Inertia::render('StationEdit', [
            'station' => $station,
            'branches' => Branch::all()->toArray()
        ]);
    }

    public function update(Station $station, UpdateExistingStationRequest $request)
    {
        if ($station->hasMedia('station_logos')) {
            $station->clearMediaCollection('station_logos');
        }
        DB::transaction(function () use ($station, $request){
            $station->update($request->validated());
            if(!blank($request->file('logo'))) {
                $station->addMedia($request->file('logo'))->toMediaCollection('station_logos');
            }
            $station->branch()->associate(Branch::find($request->input('branch_id')));
            $station->save();
        });

        return Redirect::route('station.show',['station'=>$station->id]);
    }
}
