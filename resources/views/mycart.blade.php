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

<body>

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

<div class="max-w-md mx-auto mt-16 bg-white rounded-lg overflow-hidden md:max-w-lg border border-gray-400">
    <div class="px-4 py-2 border-b border-gray-200">
        <h1 class="font-bold text-gray-800 text-center text-3xl">My Cart</h1>

        <a href="{{ route('home') }}" class="flex font-semibold text-indigo-600 text-sm mt-3">
            <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                <path
                    d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
            </svg>
            Go back
        </a>
    </div>

    <?php
    $value = 0;
    ?>

    @foreach($cart as $cartItem)

        <div class="flex flex-col divide-y divide-gray-200">

            <div class="flex items-center py-4 px-6">
                <img class="w-16 h-16 object-cover rounded" src="https://dummyimage.com/100x100/F3F4F7/000000.jpg" alt="Product Image">
                <div class="ml-3">
                    <h3 class="text-gray-900 font-semibold">{{$cartItem -> fooditem -> title}}</h3>
                    <p class="text-gray-700 mt-1">Price: LKR{{$cartItem -> price}}</p>
                    <p class="text-gray-700 mt-1">Quantity: {{$cartItem -> quantity}}</p>

                </div>
                <form action="{{ url('remove_cart', $cartItem->id) }}" method="POST" class="ml-auto">
                    @csrf
                    <button type="submit" class="py-2 px-4 bg-red-500 hover:bg-red-600 text-white rounded-lg">
                        Remove
                    </button>
                </form>
            </div>

        </div>

            <?php
            $value += $cartItem -> fooditem -> price;
            ?>

    @endforeach

    <div class="flex items-center justify-between px-6 py-3 bg-gray-100">
        <h3 class="text-gray-900 font-semibold">Total: LKR{{$value}}</h3>
        <a href="{{ url('paymentmethod') }}">
            <button class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">
                Checkout
            </button>
        </a>
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
