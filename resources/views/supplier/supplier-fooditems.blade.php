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
    <div class="flex-1 px-6">

        <div class="p-6">
            <p class="text-gray-700 mb-4">
                By default, a 50% discount will be applied when 30% or more of the inventory remains three hours before closing time.
            </p>
            <h2 class="text-2xl font-bold mb-4">Customize Discount</h2>
            <form method="POST"
                {{--              action="{{ route('supplier.discount-settings.update') }}"--}}
            >
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="discount_rate">Discount Rate (%)</label>
                    <input type="number" name="discount_rate" id="discount_rate" value="
{{--                {{ $discountSettings->discount_rate }}--}}
                " class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="inventory_threshold">Inventory Threshold (%)</label>
                    <input type="number" name="inventory_threshold" id="inventory_threshold" value="
{{--                {{ $discountSettings->inventory_threshold }}--}}
                " class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="time_before_closing">Time Before Closing (Hours)</label>
                    <input type="number" name="time_before_closing" id="time_before_closing" value="
{{--                {{ $discountSettings->time_before_closing }}--}}
                " class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Discount Settings
                    </button>
                </div>
            </form>
        </div>

{{--    <div class="p-6">--}}
        <h2 class="text-2xl font-bold mb-4">Food Items</h2>

{{--        <div class="flex justify-end mb-4">--}}
{{--            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                Add Items--}}
{{--            </button>--}}
{{--        </div>--}}

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-200 text-gray-600">
            <tr>
                <th class="py-2">Name</th>
                <th class="py-2">Description</th>
                <th class="py-2">Category</th>
                <th class="py-2">Available Stock</th>
                <th class="py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            <div class="flex justify-end mb-4">

                    <a href="{{ route('supplier.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add Items
                    </a>
            @foreach($foodItems as $fooditem)
                <tr>
                    <td class="py-3 px-4 text-center">
                        {{ $fooditem->title }}
{{--                        Fish bun--}}
                    </td>
                    <td class="py-3 px-4 text-center">
                        {{ $fooditem->description }}
{{--                        Tasty bun--}}
                    </td>
                    <td class="py-3 px-4 text-center">
                        {{ $fooditem->category }}
{{--                        Pastry--}}
                    </td>
                    <td class="py-3 px-4 text-center">
                        {{ $fooditem->stock }}
{{--                        50--}}
                    </td>
                    <td class="py-3 px-1 text-center">
                        <a href="
{{--                        {{ route('supplier.food-items.show', $fooditem->id) }}--}}
                        " class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-7 py-2 rounded">Show</a>
                        <a href="
                        {{ route('supplier.edit', $fooditem->id) }}
                        " class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold px-7 py-2 rounded">Edit</a>
                        <form action="
{{--                        {{ route('supplier.food-items.destroy', $fooditem->id) }}--}}
                        " method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-7 py-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>







</div>

</body>
</html>
