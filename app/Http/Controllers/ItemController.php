<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return inertia('Items', [
            'items' => Item::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'items.*.name' => 'required|string|max:255',
            'items.*.description' => 'nullable|string',
        ]);

        foreach ($validated['items'] as $itemData) {
            Item::create($itemData);
        }

        return redirect()->route('items.index')->with('success', 'Items saved successfully!');
    }
}
