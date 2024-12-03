@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 space-y-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-800">Transactions</h1>
        <a href="{{ route('transactions.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md shadow">
            + Add New Transaction
        </a>
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- Search Form -->
    <form action="{{ route('transactions.index') }}" method="GET" class="flex items-center space-x-4">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            class="flex-grow px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
            placeholder="Search by transaction ID, item, or type">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow">
            Search
        </button>
    </form>

    <!-- Transactions Table -->
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse bg-white rounded shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left text-gray-600 font-medium">Transaction ID</th>
                    <th class="border px-4 py-2 text-left text-gray-600 font-medium">Item Name</th>
                    <th class="border px-4 py-2 text-left text-gray-600 font-medium">Type</th>
                    <th class="border px-4 py-2 text-left text-gray-600 font-medium">Size</th>
                    <th class="border px-4 py-2 text-left text-gray-600 font-medium">Color</th>
                    <th class="border px-4 py-2 text-left text-gray-600 font-medium">Quantity</th>
                    <th class="border px-4 py-2 text-left text-gray-600 font-medium">Total Price</th>
                    <th class="border px-4 py-2 text-left text-gray-600 font-medium">Date</th>
                    <th class="border px-4 py-2 text-center text-gray-600 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $transaction)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $transaction->id }}</td>
                    <td class="border px-4 py-2">{{ $transaction->name }}</td>
                    <td class="border px-4 py-2">{{ $transaction->type }}</td>
                    <td class="border px-4 py-2">{{ $transaction->size }}</td>
                    <td class="border px-4 py-2">{{ $transaction->color }}</td>
                    <td class="border px-4 py-2">{{ $transaction->qty }}</td>
                    <td class="border px-4 py-2">₱{{ number_format($transaction->total_price, 2) }}</td>
                    <td class="border px-4 py-2">{{ $transaction->date }}</td>
                    <td class="border px-4 py-2 text-center space-x-2">
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center border px-4 py-2 text-gray-500">No transactions found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $transactions->links() }}
    </div>
</div>
@endsection
