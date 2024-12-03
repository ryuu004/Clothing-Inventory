@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Edit Transaction</h1>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="alert alert-success mb-4">
        <div class="bg-green-100 text-green-800 p-3 rounded">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <!-- Edit Transaction Form -->
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Item Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Item Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $transaction->name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Type -->
        <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
            <input type="text" id="type" name="type" value="{{ old('type', $transaction->type) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Size -->
        <div class="mb-4">
            <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
            <input type="text" id="size" name="size" value="{{ old('size', $transaction->size) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
        </div>

        <!-- Color -->
        <div class="mb-4">
            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
            <input type="text" id="color" name="color" value="{{ old('color', $transaction->color) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
        </div>

        <!-- Quantity -->
        <div class="mb-4">
            <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input type="number" id="qty" name="qty" value="{{ old('qty', $transaction->qty) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Total Price -->
        <div class="mb-4">
            <label for="total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
            <input type="number" id="total_price" name="total_price" value="{{ old('total_price', $transaction->total_price) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Date -->
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" id="date" name="date" value="{{ old('date', $transaction->date)}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Update Transaction</button>
    </form>
</div>
@endsection
