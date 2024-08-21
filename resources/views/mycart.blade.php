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

<body class="bg-gray-100">

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
    <div class="sm:flex shadow-md my-10">
        <div class="  w-full  sm:w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Food Cart</h1>
                <h2 class="font-semibold text-2xl">{{ $count }} Items</h2>
            </div>

            <?php
            $value = 0;
            ?>

            @foreach($cart as $cartItem)

                <div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
                    <div class="md:w-4/12 2xl:w-1/4 w-full">
                        <img src="https://i.ibb.co/TTnzMTf/Rectangle-21.png" alt="Food Item Image" class="md:hidden w-full h-full object-center object-cover" />

                    </div>
                    <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base font-black leading-none text-gray-800">{{$cartItem -> fooditem -> title}}</p>
                            <form action="{{ url('remove_cart', $cartItem->id) }}" method="POST" class="ml-auto">
                                @csrf
                                <button type="submit" class="py-2 px-4 bg-red-500 hover:bg-red-600 text-white rounded-lg">
                                    Remove
                                </button>
                            </form>

                        </div>
                        <p class="text-xs leading-3 text-gray-600 pt-2">Total Price: LKR {{$cartItem -> price}}</p>
                        <p class="text-xs leading-3 text-gray-600 py-4">Quantity: {{$cartItem -> quantity}}</p>

                    </div>
                </div>

                    <?php
                    $value += $cartItem->price;
                    ?>

            @endforeach

            <a href="{{ route('home') }}" class="flex font-semibold text-indigo-600 text-sm mt-10">
                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                    <path
                        d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Go back
            </a>
        </div>


        <div id="summary" class=" w-full   sm:w-1/4   md:w-1/2     px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">Name</span>
                <span class="font-semibold text-sm">{{Auth::user() -> name}}</span>
            </div>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">Email</span>
                <span class="font-semibold text-sm">{{Auth::user() -> email}}</span>
            </div>

            <div>
                <label class="font-medium inline-block mb-3 text-sm uppercase py-10">
                    Schedule Pickup
                </label>
                <select class="block p-2 text-gray-600 w-full text-sm">
                    <option>Standard Time (5 - 1hr)</option>

    {{-- pick up time options should come starting from 1 hour from the current time till the supplier's closing time--}}

                </select>
            </div>


            <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Total cost</span>
                    <span>LKR {{$value}}</span>
                </div>

                <a href="{{ url('paymentmethod') }}">
                    <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
                        Checkout
                    </button>
                </a>
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
