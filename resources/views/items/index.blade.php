@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-800">Manage Items</h1>
        <a href="{{ route('items.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded shadow">
            + Add New Item
        </a>
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <!-- Filters Section -->
    <form method="GET" action="{{ route('items.index') }}" class="mb-4 flex flex-wrap gap-4">
        <!-- Search Input -->
        <input type="text" name="search" value="{{ request('search') }}" 
               placeholder="Search items..." 
               class="flex-grow p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
        
        <!-- Stock Filter Dropdown -->
        <select name="stock_filter" 
                class="p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option value="">All Items</option>
            <option value="low_stock" {{ request('stock_filter') == 'low_stock' ? 'selected' : '' }}>
                Low Stock
            </option>
        </select>

        <!-- Filter Button -->
        <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded shadow">
            Filter
        </button>
    </form>

    <!-- Items Table -->
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium border-b">ID</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium border-b">Name</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium border-b">Category</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium border-b">Size</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium border-b">Color</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium border-b">Price</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium border-b">Stock</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 text-gray-800 border-b">{{ $item->id }}</td>
                    <td class="py-3 px-4 text-gray-800 border-b">{{ $item->name }}</td>
                    <td class="py-3 px-4 text-gray-800 border-b">{{ $item->category }}</td>
                    <td class="py-3 px-4 text-gray-800 border-b">{{ $item->size }}</td>
                    <td class="py-3 px-4 text-gray-800 border-b">{{ $item->color }}</td>
                    <td class="py-3 px-4 text-gray-800 border-b">₱{{ number_format($item->price, 2) }}</td>
                    <td class="py-3 px-4 text-gray-800 border-b">
                        <span class="{{ $item->stock <= 10 ? 'text-red-600 font-semibold' : '' }}">
                            {{ $item->stock }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-gray-800 border-b">
                        <a href="{{ route('items.edit', $item->id) }}" 
                           class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" 
                              class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $items->links() }}
    </div>
</div>
@endsection
