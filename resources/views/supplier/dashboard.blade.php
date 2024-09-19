<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Side Panel -->
<div class="flex min-h-screen">

    @include('supplier.sidepanel')

    <!-- Main Content -->
    <div class="flex-1 p-6">

        <!-- Dashboard Header -->
        <div class="bg-white shadow-md py-4 px-8 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Welcome to Your Dashboard</h1>
            <p class="text-gray-600">Manage your orders and track their progress.</p>
        </div>

        <!-- Dashboard Content -->
        <div class="container mx-auto">

            <!-- Order Summary -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h2 class="text-gray-600 font-semibold">Total Orders</h2>
                    <p class="text-2xl font-bold text-gray-800">120</p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h2 class="text-gray-600 font-semibold">Pending Orders</h2>
                    <p class="text-2xl font-bold text-yellow-500">35</p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h2 class="text-gray-600 font-semibold">Completed Orders</h2>
                    <p class="text-2xl font-bold text-green-500">85</p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h2 class="text-gray-600 font-semibold">Cancelled Orders</h2>
                    <p class="text-2xl font-bold text-red-500">10</p>
                </div>
            </div>

            <!-- Display Only pendding Orders -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="py-3 px-4 text-left">Order Number</th>
                        <th class="py-3 px-4 text-left">Customer Name</th>
                        <th class="py-3 px-4 text-left">Food Item</th>
                        <th class="py-3 px-4 text-left">Quantity</th>
                        <th class="py-3 px-4 text-left">Total Price</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    <!-- Example row -->
                    <tr>
                        <td class="py-3 px-4">#23658</td>
                        <td class="py-3 px-4">John Doe</td>
                        <td class="py-3 px-4">Fish Bun</td>
                        <td class="py-3 px-4">3</td>
                        <td class="py-3 px-4">$45.00</td>
                        <td class="py-3 px-4"><span class="text-yellow-500">Pending</span></td>
                        <td class="py-3 px-4">
                            <button class="bg-green-500 text-white px-4 py-2 rounded-lg">Completed</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">Cancelled</button>

                    </tr>
                    <!-- Repeat for each order -->
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>

</body>
</html>
