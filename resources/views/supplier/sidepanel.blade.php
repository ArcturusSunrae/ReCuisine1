<aside class="w-64 bg-gray-800 text-gray-200">
    <div class="p-6 text-center">
        <h2 class="text-2xl font-bold">Supplier Dashboard</h2>
    </div>
    <nav class="mt-10">
        <a href="{{ route('supplier.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Dashboard
        </a>
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Orders
        </a>
        <a href="{{ route('supplier.food-items') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Food Items
        </a>


        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Logout
        </a>
    </nav>
</aside>
