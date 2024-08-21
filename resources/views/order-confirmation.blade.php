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
<body>

<section class="py-24 relative">
    <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">

        <h2 class="font-manrope font-bold text-3xl sm:text-4xl leading-10 text-black mb-11">
            Your Order Confirmed
        </h2>
        <h6 class="font-medium text-xl leading-8 text-black mb-3">Hello, {{Auth::user() -> name}}</h6>
        <p class="font-normal text-lg leading-8 text-gray-500 mb-11">Your order has been completed. Please pick up your order at the given time.</p>
        <div
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-8 py-6 border-y border-gray-100 mb-6">
            <div class="box group">
                <p class="font-normal text-base leading-7 text-gray-500 mb-3 transition-all duration-500 group-hover:text-gray-700">Pickup Date and Time</p>
                <h6 class="font-semibold font-manrope text-2xl leading-9 text-black">Dec 01, 2023 </h6>
            </div>
{{--            <div class="box group">--}}
{{--                <p class="font-normal text-base leading-7 text-gray-500 mb-3 transition-all duration-500 group-hover:text-gray-700">Order</p>--}}
{{--                <h6 class="font-semibold font-manrope text-2xl leading-9 text-black">{{$order->order_number}}</h6>--}}
{{--            </div>--}}

            <div class="box group">
                <p class="font-normal text-base leading-7 text-gray-500 mb-3 transition-all duration-500 group-hover:text-gray-700">Order</p>
                <h6 class="font-semibold font-manrope text-2xl leading-9 text-black">{{$orderNumber}}</h6>
            </div>

            <div class="box group">
                <p class="font-normal text-base leading-7 text-gray-500 mb-3 transition-all duration-500 group-hover:text-gray-700">Payment Method</p>

                <h6 class="font-semibold font-manrope text-2xl leading-9 text-black">Pay at Pickup</h6>

            </div>
            <div class="box group">
                <p class="font-normal text-base leading-7 text-gray-500 mb-3 transition-all duration-500 group-hover:text-gray-700">Supplier</p>
                <h6 class="font-semibold font-manrope text-2xl leading-9 text-black">
{{--                    Supplier Name--}}
                </h6>
            </div>
        </div>

        <?php
        $value = 0;
        ?>

        @foreach($cart as $cartItem)

        <div class="grid grid-cols-7 w-full pb-6 border-b border-gray-100">
            <div class="col-span-7 min-[500px]:col-span-2 md:col-span-1">
                <img src="https://i.ibb.co/TTnzMTf/Rectangle-21.png" alt="Food Item Image" class="md:hidden w-full h-full object-center object-cover" />
            </div>
            <div
                class="col-span-7 min-[500px]:col-span-5 md:col-span-6 min-[500px]:pl-5 max-sm:mt-5 flex flex-col justify-center">
                <div class="flex flex-col min-[500px]:flex-row min-[500px]:items-center justify-between">
                    <div class="">
                        <h5 class="font-manrope font-semibold text-2xl leading-9 text-black mb-6">{{$cartItem -> fooditem -> title}}
                        </h5>
                        <p class="font-normal text-xl leading-8 text-gray-500">Quantity : <span
                                class="text-black font-semibold">{{$cartItem -> quantity}}</span></p>
                    </div>

                    <h5 class="font-manrope font-semibold text-3xl leading-10 text-black sm:text-right mt-3">
                        LKR {{$cartItem -> price}}
                    </h5>
                </div>
            </div>
        </div>

                <?php
                $value += $cartItem->price;
                ?>

        @endforeach


        <div class="flex items-center justify-center sm:justify-end w-full my-6">
            <div class=" w-full">
                <div class="flex items-center justify-between mb-6">

                </div>
                <div class="flex items-center justify-between mb-6">

                </div>
                <div class="flex items-center justify-between mb-6">

                </div>
                <div class="flex items-center justify-between mb-6">

                </div>
                <div class="flex items-center justify-between py-6 border-y border-gray-100">
                    <p class="font-manrope font-semibold text-2xl leading-9 text-gray-900">Total</p>
                    <p class="font-manrope font-bold text-2xl leading-9 text-indigo-600">LKR {{$value}}</p>
                </div>
            </div>
        </div>
        <div class="data ">
            <p class="font-normal text-lg leading-8 text-gray-500 mb-11">We'll be sending a token to your email which you need to show when picking up your order.</p>
            <h6 class="font-manrope font-bold text-2xl leading-9 text-black mb-3">Thank you for you order!</h6>
        </div>
    </div>
</section>


</body>
</html>
