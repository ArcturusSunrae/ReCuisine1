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
            <h1 class="text-3xl font-bold text-gray-800">Orders</h1>

        </div>

        <!-- Dashboard Content -->
        <div class="container mx-auto">


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

                    @foreach($data as $data)
                    <tr>
                        <td class="py-3 px-4">{{$data-> order_number}}</td>
                        <td class="py-3 px-4">{{$data -> user -> name}}</td>
                        <td class="py-3 px-4">{{$data -> fooditem -> title}}</td>
                        <td class="py-3 px-4">{{$data -> quantity}}</td>

{{--                        if discounted price then show discounted price else show original price--}}
                        <td class="py-3 px-4">{{$data -> price}}</td>
                        <td class="py-3 px-4"><span class="text-yellow-500">{{$data -> status}}</span></td>
                        <td class="py-3 px-4">
                            <button class="bg-green-500 text-white px-4 py-2 rounded-lg">Completed</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">Cancelled</button>

                    </tr>

                    @endforeach
                    <!-- Repeat for each order -->
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>

</body>
</html>
