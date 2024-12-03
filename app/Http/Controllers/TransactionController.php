<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Display all transactions
    public function index(Request $request)
    {
        $query = Transaction::query();

        // If a search query is present, filter based on the criteria
        if ($request->has('search')) {
            $search = $request->input('search');

            // Search for transactions by item name, transaction type, or transaction ID
            $query->whereHas('item', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orWhere('id', 'like', "%{$search}%")
            ->orWhere('type', 'like', "%{$search}%");
        }

        // Paginate the results
        $transactions = $query->with('item')->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    // Show the form for creating a new transaction
    public function create()
    {
        $items = Item::all(); // Get all items for the transaction form
        return view('transactions.create', compact('items'));
    }

    // Store a newly created transaction in the database
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:Sale,Purchase',
            'size' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'qty' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        // Create the new transaction
        Transaction::create([
            'name' => $request->name,
            'type' => $request->type,
            'size' => $request->size,
            'color' => $request->color,
            'qty' => $request->qty,
            'total_price' => $request->total_price,
            'date' => $request->date,
        ]);

        // Redirect to the transactions index with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    // Show the form for editing the specified transaction
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $items = Item::all(); // Get all items for the transaction form
        return view('transactions.edit', compact('transaction', 'items'));
    }

    // Update the specified transaction in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:Sale,Purchase',
            'size' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'qty' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        // Find the transaction and update its details
        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'item_id' => $request->item_id,
            'type' => $request->type,
            'size' => $request->size,
            'color' => $request->color,
            'qty' => $request->qty,
            'total_price' => $request->total_price,
            'date' => $request->date,
        ]);

        // Redirect to the transactions index with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    // Delete the specified transaction from the database
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
