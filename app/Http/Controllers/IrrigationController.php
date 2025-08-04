<?php

namespace App\Http\Controllers;

use App\Models\Irrigation;
use App\Models\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IrrigationController extends Controller
{
    public function index()
    {
        return Irrigation::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['pivot_id' => 'required|uuid','applicationAmount' => 'required|numeric','irrigationDate' => 'required|date']);

        $pivot = Pivot::where('id',$validated['pivot_id'])->where('user_id', Auth::id())->first();

        if (!$pivot) {
            return response()->json(['message' => 'Pivot not found or unauthorized'], 404);
        }

        $irrigation = Irrigation::create([...$validated, 'user_id' => Auth::id()]);

        return response()->json(['message' => 'Irrigation recorded successfully','irrigation' => $irrigation,], 201);
    }

    public function show(string $id)
    {
        $irrigation = Irrigation::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$irrigation) {
            return response()->json(['message' => 'Irrigation not found'], 404);
        }

        return $irrigation;
    }

    public function destroy(string $id)
    {
        $irrigation = Irrigation::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$irrigation) {
            return response()->json(['message' => 'Irrigation not found'], 404);
        }

        $irrigation->delete();

        return response()->json(['message' => 'Irrigation deleted']);
    }
}
