@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 space-y-6">
    <!-- Page Header -->
    <h1 class="text-2xl font-semibold text-gray-800">Add New Item</h1>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <!-- Create Item Form -->
    <form action="{{ route('items.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                   placeholder="Enter item name" required>
        </div>

        <!-- Category -->
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Type</label>
            <input type="text" id="category" name="category" value="{{ old('category') }}" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                   placeholder="Enter item type" required>
        </div>

        <!-- Size -->
        <div>
            <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
            <input type="text" id="size" name="size" value="{{ old('size') }}" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                   placeholder="Enter item size (optional)">
        </div>

        <!-- Color -->
        <div>
            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
            <input type="text" id="color" name="color" value="{{ old('color') }}" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                   placeholder="Enter item color (optional)">
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                   placeholder="Enter item price" required>
        </div>

        <!-- Stock -->
        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                   placeholder="Enter stock quantity" required>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
                Save Item
            </button>
        </div>
    </form>
</div>
@endsection
