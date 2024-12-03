<?php

// app/Http/Controllers/ItemController.php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query and filter option
        $searchQuery = $request->input('search');
        $stockFilter = $request->input('stock_filter');
    
        // Start the query for items
        $items = Item::query();
    
        // If there is a search query, filter by name, category, size, or color
        if ($searchQuery) {
            $items = $items->where('name', 'like', "%{$searchQuery}%")
                           ->orWhere('category', 'like', "%{$searchQuery}%")
                           ->orWhere('size', 'like', "%{$searchQuery}%")
                           ->orWhere('color', 'like', "%{$searchQuery}%");
        }
    
        // Apply the stock filter if "low_stock" is selected
        if ($stockFilter === 'low_stock') {
            $items = $items->where('stock', '<', 5);  // You can adjust this threshold
        }
    
        // Paginate the results
        $items = $items->paginate(10);
    
        return view('items.index', compact('items'));
    }
    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'size' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Store the item in the database
        Item::create([
            'name' => $request->name,
            'category' => $request->category,
            'size' => $request->size,
            'color' => $request->color,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Redirect back to the items index page with a success message
        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'size' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'name' => $request->name,
            'category' => $request->category,
            'size' => $request->size,
            'color' => $request->color,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}

