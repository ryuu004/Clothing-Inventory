@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-4xl font-extrabold text-gray-800 mb-8">Dashboard Overview</h1>

    <!-- Dashboard Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 mb-8">

        <!-- Total Products Sold Card (Landscape) -->
        <div class="bg-white shadow-lg rounded-lg p-8 transition-transform transform hover:scale-105 hover:shadow-xl">
            <h2 class="text-xl font-semibold text-gray-600 mb-2">Total Products Sold</h2>
            <p class="text-4xl font-extrabold text-blue-500">{{ $totalProductsSold ?? '0' }}</p>
        </div>

        <!-- Total Revenue Card (Landscape) -->
        <div class="bg-white shadow-lg rounded-lg p-8 transition-transform transform hover:scale-105 hover:shadow-xl">
            <h2 class="text-xl font-semibold text-gray-600 mb-2">Total Revenue</h2>
            <p class="text-4xl font-extrabold text-blue-600">₱{{ number_format($totalRevenue, 2) ?? '0.00' }}</p>
        </div>

    </div>

    <!-- Top 10 Best Sellers (Portrait) -->
    <div class="bg-white shadow-lg rounded-lg p-8 transition-transform transform hover:scale-105 hover:shadow-xl">
        <h2 class="text-xl font-semibold text-gray-600 mb-4">Top 10 Best Sellers</h2>
        <div class="mt-4 max-h-[350px] overflow-y-auto">
            <ul class="space-y-4">
                @foreach($topSellers as $item)
                    <li class="flex justify-between items-center border-b border-gray-300 py-2">
                        <span class="text-lg text-gray-800">{{ $item->name }}</span>
                        <span class="text-sm text-gray-500">{{ $item->stock }} left</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
