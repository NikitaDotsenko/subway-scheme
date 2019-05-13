<?php

namespace App\Http\Controllers;

use App\Model\Branch;
use App\Model\Station;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StationController extends Controller
{
    public function index(){
        return Inertia::render('Index', [
            'blueBranch' => Branch::whereId(2)->first()->load(['stations'])->toArray(),
        ]);
    }
}
