<?php

namespace App\Http\Controllers;

use App\Model\Branch;
use App\Model\Station;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DataController extends Controller
{
    public function index(){
        return Inertia::render('Data', [
            'branches' => Branch::all(),
            'stations' => Station::all(),
        ]);
    }
}
