<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PlanningResource;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plans::all();

       /*  dd($plannings); */

        return response()
            ->json($plans);
    }
}
