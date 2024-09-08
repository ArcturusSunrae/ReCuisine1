<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReCuisine</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
</head>

<style>
    #flash-banner {
        animation: fadeOut 5s forwards; /* Fade out after 5 seconds */
    }

    @keyframes fadeOut {
        0% { opacity: 1; }
        80% { opacity: 1; }
        100% { opacity: 0; }
    }
</style>

<body class="bg-[#f5e3cc] min-h-screen"> <!-- Updated to light brown background -->

@if (session('success'))
    <div id="flash-banner" class="top-0 left-0 right-0 bg-green-800 text-white text-center py-3 z-50">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="flash-banner" class="top-0 left-0 right-0 bg-red-500 text-black text-center py-3 z-50">
        {{ session('error') }}
    </div>
@endif

<div class="container mx-auto mt-10">
    <div class="sm:flex shadow-lg bg-white rounded-lg overflow-hidden my-10 border border-green-200">
        <!-- Cart Section -->
        <div class="w-full sm:w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b-2 border-green-200 pb-8">
                <h1 class="font-bold text-4xl text-green-700">Food Cart</h1>
                <h2 class="font-bold text-2xl text-brown-700">{{ $count }} Items</h2>
            </div>

            <?php $value = 0; ?>

            @foreach($cart as $cartItem)
                <div class="md:flex items-center py-8 md:py-10 lg:py-8 border-t border-gray-200">
                    <div class="md:w-4/12 2xl:w-1/4 w-full">
                        <img src="https://i.ibb.co/TTnzMTf/Rectangle-21.png" alt="Food Item Image" class="w-full h-full object-center object-cover rounded-lg shadow-md" />
                    </div>
                    <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                        <div class="flex items-center justify-between w-full">
                            <p class="text-lg font-bold text-green-900">{{ $cartItem->fooditem->title }}</p>
                            <form action="{{ url('remove_cart', $cartItem->id) }}" method="POST" class="ml-auto">
                                @csrf
                                <button type="submit" class="py-2 px-4 bg-red-500 hover:bg-red-600 text-white font-bold rounded-full shadow-lg">
                                    <i class="fas fa-trash-alt"></i> Remove
                                </button>
                            </form>
                        </div>
                        <p class="text-sm text-gray-600 pt-2">Total Price: LKR {{ $cartItem->price }}</p>
                        <p class="text-sm text-gray-600 py-2">Quantity: {{ $cartItem->quantity }}</p>
                    </div>
                </div>

                    <?php $value += $cartItem->price; ?>
            @endforeach

            <a href="{{ route('home') }}" class="flex font-bold text-green-600 text-lg mt-10 items-center">
                <svg class="fill-current mr-2 text-green-600 w-5" viewBox="0 0 448 512">
                    <path
                        d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Go back to Home
            </a>
        </div>

        <!-- Order Summary Section -->
        <div id="summary" class="w-full sm:w-1/4 px-8 py-10 bg-green-50 rounded-lg shadow-lg">
            <h1 class="font-bold text-3xl text-brown-700 border-b pb-8">Order Summary</h1>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-bold text-sm uppercase text-gray-600">Name</span>
                <span class="font-bold text-sm">{{ Auth::user()->name }}</span>
            </div>
            <div class="flex justify-between mb-5">
                <span class="font-bold text-sm uppercase text-gray-600">Email</span>
                <span class="font-bold text-sm">{{ Auth::user()->email }}</span>
            </div>

            <div>
                <label class="font-medium inline-block mb-3 text-sm uppercase text-gray-600">Schedule Pickup</label>
                <select class="block p-3 text-gray-600 w-full text-sm rounded-lg shadow-md border border-green-300">
                    <option>Standard Time (5 - 1hr)</option>
                </select>
            </div>

            <div class="border-t mt-8">
                <div class="flex font-bold justify-between py-6 text-lg text-green-900">
                    <span>Total Cost</span>
                    <span>LKR {{ $value }}</span>
                </div>

                <div class="flex flex-wrap justify-center gap-3 py-3">
                    <form action="{{ url('confirm_order') }}" method="POST">
                        @csrf
                        <button class="bg-green-700 font-semibold hover:bg-green-800 py-4 px-10 text-sm text-white uppercase w-full rounded-lg shadow-lg transition ease-in-out">
                            Pay at Pickup
                        </button>
                    </form>

                    <a href="{{ url('stripe', $value) }}">
                        <button class="bg-[#5b3921] font-semibold hover:bg-[#4e321c] py-4 px-10 text-sm text-white uppercase w-full rounded-lg shadow-lg transition ease-in-out">
                            Pay Online
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var flashBanner = document.getElementById('flash-banner');
            if (flashBanner) {
                flashBanner.style.transition = 'opacity 0.5s ease';
                flashBanner.style.opacity = '0';
                setTimeout(function() {
                    flashBanner.remove();
                }, 500); // Remove element after fade out
            }
        }, 5000); // Display for 5 seconds
    });
</script>

</body>
</html>
