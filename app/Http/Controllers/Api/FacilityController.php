<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helper\Help;
use Illuminate\Support\Facades\DB;
use App\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        return Facility::all();
    }

    public function show(Facility $facility)
    {
        return $facility;
    }

    public function store(Request $request)
    {
        $facility = Facility::create($request->all());

        return response()->json($facility, 201);
    }

    public function update(Request $request, Facility $facility)
    {
        $facility->update($request->all());

        return response()->json($facility, 200);
    }

    public function delete(Facility $facility)
    {
        $facility->delete();

        return response()->json(null, 204);
    }
}
