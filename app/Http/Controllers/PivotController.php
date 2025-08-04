<?php

namespace App\Http\Controllers;

use App\Models\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PivotController extends Controller
{
    public function index()
    {
        return Pivot::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['description' => 'required|string', 'flowRate' => 'required|numeric',
        'minApplicationDepth' => 'required|numeric']);

        $pivot = Pivot::create([...$validated,'user_id' => Auth::id()]);

        return response()->json(['message' => 'Pivot created successfully!', 'pivot' => $pivot], 201);
    }

    public function show(string $id)
    {
        $pivot = Pivot::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$pivot) {
            return response()->json(['message' => 'Pivot not found'], 404);
        }

        return $pivot;
    }

    public function update(Request $request, string $id)
    {
        $pivot = Pivot::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$pivot) {
            return response()->json(['message' => 'Pivot not found'], 404);
        }

        $validated = $request->validate(['description' => 'sometimes|string', 'flowRate' => 'sometimes|numeric',
            'minApplicationDepth' => 'sometimes|numeric',
        ]);

        $pivot->update($validated);

        return response()->json(['message' => 'Pivot updated successfully', 'pivot' => $pivot]);
    }

    public function destroy(string $id)
    {
        $pivot = Pivot::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$pivot) {
            return response()->json(['message' => 'Pivot not found'], 404);
        }

        $pivot->delete();

        return response()->json(['message' => 'Pivot deleted successfully']);
    }
}
