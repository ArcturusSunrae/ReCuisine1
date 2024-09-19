<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Assuming you're using Tailwind CSS -->
</head>
<body class="bg-gray-100">

<!-- Sidebar -->
<div class="flex h-screen">
    <aside class="w-64 bg-blue-800 text-white flex flex-col">
        <div class="px-4 py-5 bg-blue-900 text-center">
            <h2 class="text-lg font-semibold">Supplier Dashboard</h2>
        </div>
        <nav class="flex-1 px-2 py-4">
            <ul>
                <li>
                    <a href="{{ route('fooditems.index') }}" class="block px-4 py-2 rounded hover:bg-blue-700">
                        Manage Food Items
                    </a>
                </li>
                <li>
                    <a href="{{ route('fooditems.create') }}" class="block px-4 py-2 rounded hover:bg-blue-700">
                        Add New Food Item
                    </a>
                </li>
                <!-- Add more links as needed -->
            </ul>
        </nav>
        <div class="px-4 py-4 border-t border-blue-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>
</div>

</body>
</html>
