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

class DataController extends Controller
{
    public function index()
    {
        return Inertia::render('Data', [
            'branches' => Branch::all(),
            'stations' => Station::all(),
        ]);
    }
}
