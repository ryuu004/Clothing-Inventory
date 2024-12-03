<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // For the sake of the dashboard, we'll fetch some sample data.
        
        // Mock Top 10 Best Sellers (sample, replace with actual data later)
        $topSellers = Item::orderBy('stock', 'asc')->take(10)->get();  // Sample query, replace with actual logic for best sellers

        // Sample Total Products Sold (this is a mock, you can aggregate actual data later)
        $totalProductsSold = Transaction::sum('qty');  // Sum of all quantities sold from the transactions table
        
        // Sample Total Revenue (sum of all total prices from the transactions table)
        $totalRevenue = Transaction::sum('total_price');  // Sum of the total_price from the transactions table

        return view('dashboard.index', compact('topSellers', 'totalProductsSold', 'totalRevenue'));
    }
}
