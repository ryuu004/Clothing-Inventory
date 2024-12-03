@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-800">Add Transaction</h1>
        <a href="{{ route('transactions.index') }}" class="text-blue-500 hover:underline">
            ← Back to Transactions
        </a>
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- Add Transaction Form -->
    <form action="{{ route('transactions.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-4">
        @csrf

        <!-- Item Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Item Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name') }}" 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                placeholder="Enter the item name" 
                required>
        </div>

        <!-- Type (Sale or Purchase) -->
        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
            <select 
                id="type" 
                name="type" 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                required>
                <option value="Sale" {{ old('type') == 'Sale' ? 'selected' : '' }}>Sale</option>
                <option value="Purchase" {{ old('type') == 'Purchase' ? 'selected' : '' }}>Purchase</option>
            </select>
        </div>

        <!-- Size -->
        <div>
            <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
            <input 
                type="text" 
                id="size" 
                name="size" 
                value="{{ old('size') }}" 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                placeholder="Optional">
        </div>

        <!-- Color -->
        <div>
            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
            <input 
                type="text" 
                id="color" 
                name="color" 
                value="{{ old('color') }}" 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                placeholder="Optional">
        </div>

        <!-- Quantity -->
        <div>
            <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input 
                type="number" 
                id="qty" 
                name="qty" 
                value="{{ old('qty') }}" 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                placeholder="Enter the quantity" 
                required>
        </div>

        <!-- Total Price -->
        <div>
            <label for="total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
            <input 
                type="number" 
                id="total_price" 
                name="total_price" 
                value="{{ old('total_price') }}" 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                placeholder="Enter the total price" 
                required>
        </div>

        <!-- Date -->
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
            <input 
                type="date" 
                id="date" 
                name="date" 
                value="{{ old('date') }}" 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                required>
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button 
                type="submit" 
                class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-md shadow">
                Save Transaction
            </button>
        </div>
    </form>
</div>
@endsection
