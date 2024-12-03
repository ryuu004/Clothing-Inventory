<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Inventory</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg rounded-r-lg p-6">
            <!-- App Icon -->
            <div class="text-center">
                <img src="{{ asset('img/icon.jpg') }}" alt="App Icon" class="w-20 h-20 rounded-full mx-auto border border-gray-300 shadow-md">
                <h1 class="mt-4 text-xl font-semibold text-gray-800">Inventory System</h1>
            </div>

            <!-- Navigation -->
            <nav class="mt-8 space-y-4">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-gray-100 rounded-lg transition duration-300 ease-in-out
                            {{ request()->routeIs('dashboard') ? 'text-blue-600 font-semibold border-b-2 border-blue-500' : '' }} focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('items.index') }}" class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-gray-100 rounded-lg transition duration-300 ease-in-out
                            {{ request()->routeIs('items.index') ? 'text-blue-600 font-semibold border-b-2 border-blue-500' : '' }} focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Items
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transactions.index') }}" class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-gray-100 rounded-lg transition duration-300 ease-in-out
                            {{ request()->routeIs('transactions.index') ? 'text-blue-600 font-semibold border-b-2 border-blue-500' : '' }} focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Transaction History
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 space-y-6 bg-gray-100 rounded-l-lg overflow-auto">
            @yield('content')
        </div>
    </div>

</body>
</html>
