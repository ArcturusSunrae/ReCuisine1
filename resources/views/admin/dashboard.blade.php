<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-center">Admin Dashboard</h2>
        </div>
        <nav class="flex-1">
            <ul class="space-y-4 p-6">
                <li><a href="#" class="block py-2 px-4 bg-gray-700 hover:bg-gray-600 rounded-md">Dashboard</a></li>
                <li><a href="#" class="block py-2 px-4 hover:bg-gray-600 rounded-md">Suppliers</a></li>
                <li><a href="#" class="block py-2 px-4 hover:bg-gray-600 rounded-md">Orders</a></li>
                <li><a href="#" class="block py-2 px-4 hover:bg-gray-600 rounded-md">Products</a></li>
                <li><a href="#" class="block py-2 px-4 hover:bg-gray-600 rounded-md">Settings</a></li>
                <li><a href="#" class="block py-2 px-4 hover:bg-gray-600 rounded-md">Logout</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <div class="mb-6">
            <h1 class="text-3xl font-semibold">Supplier Authentication</h1>
        </div>

        <!-- Supplier Authentication Table -->
        <section class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold mb-4">Authenticate Suppliers</h3>
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Supplier ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Supplier Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Status</th>
                    <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">001</td>
                    <td class="border border-gray-300 px-4 py-2">John Doe Supplies</td>
                    <td class="border border-gray-300 px-4 py-2">Pending</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Authenticate</button>
                    </td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">002</td>
                    <td class="border border-gray-300 px-4 py-2">Fresh Food Co.</td>
                    <td class="border border-gray-300 px-4 py-2">Pending</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Authenticate</button>
                    </td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">003</td>
                    <td class="border border-gray-300 px-4 py-2">Organic Farms Ltd.</td>
                    <td class="border border-gray-300 px-4 py-2">Approved</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button class="bg-gray-400 text-white px-4 py-2 rounded" disabled>Authenticated</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
    </main>
</div>
</body>
</html>
