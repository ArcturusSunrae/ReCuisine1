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
<body class="bg-gradient-to-br from-green-100 via-green-50 to-brown-50 text-gray-900 min-h-screen flex items-center justify-center">

<!-- Fancy Box with Shadows and Border -->
<section class="relative max-w-5xl mx-auto p-10 bg-white shadow-2xl rounded-3xl border border-green-300 duration-300 ease-in-out">
    <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-green-600 via-brown-500 to-yellow-400 rounded-t-3xl"></div>

    <!-- Order Confirmation Heading -->
    <div class="text-center mb-8">
        <h2 class="font-manrope font-extrabold text-5xl sm:text-6xl text-green-700 mb-5">
            Order Confirmed!
        </h2>
        <h6 class="font-medium text-2xl text-green-600 mb-4">Hello, {{Auth::user()->name}}</h6>
        <p class="font-normal text-lg text-gray-500 mb-8">Your order has been completed. Please pick it up at the scheduled time.</p>
    </div>

    <!-- Fancy Order Details Box -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 py-8 border-y border-gray-200 mb-10 bg-gradient-to-tr from-brown-100 to-green-100 p-6 rounded-lg shadow-inner">
        <div class="text-center group">
            <p class="font-semibold text-base text-gray-700 mb-2">Pickup Date and Time</p>
            <h6 class="font-bold text-2xl text-green-800"></h6>
        </div>
        <div class="text-center group">
            <p class="font-semibold text-base text-gray-700 mb-2">Order Token</p>
            <h6 class="font-bold text-2xl text-green-800">{{$orderNumber}}</h6>
        </div>
        <div class="text-center group">
            <p class="font-semibold text-base text-gray-700 mb-2">Payment Method</p>
            @if($order->payment_status === 'Pay at Pickup')
                <h6 class="font-bold text-2xl text-green-800">Pay at Pickup</h6>
            @elseif($order->payment_status === 'Paid Online')
                <h6 class="font-bold text-2xl text-green-800">Online</h6>
            @else
                <h6 class="font-bold text-2xl text-red-800">Unknown</h6>
            @endif

        </div>
        <div class="text-center group">
            <p class="font-semibold text-base text-gray-700 mb-2">Supplier</p>
            <h6 class="font-bold text-2xl text-green-800">Supplier Name</h6>
        </div>
    </div>

    <!-- Cart Items Loop -->
    <div>
        <?php $value = 0; ?>
        @foreach($cart as $cartItem)
            <div class="grid grid-cols-7 gap-4 w-full pb-6 border-b border-gray-300">
                <div class="col-span-2">
                    <img src="https://i.ibb.co/TTnzMTf/Rectangle-21.png" alt="Food Item" class="w-full h-full object-cover rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out" />
                </div>
                <div class="col-span-5 flex flex-col justify-between">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="font-manrope font-bold text-2xl text-green-700 mb-2">{{$cartItem->fooditem->title}}</h5>
                            <p class="font-normal text-gray-600">Quantity: <span class="text-black font-semibold">{{$cartItem->quantity}}</span></p>
                        </div>
                        <h5 class="font-manrope font-bold text-3xl text-brown-600">LKR {{$cartItem->price}}</h5>
                    </div>
                </div>
            </div>
                <?php $value += $cartItem->price; ?>
        @endforeach
    </div>

    <!-- Order Summary -->
    <div class="mt-8 text-right">
        <div class="py-6 border-t border-b border-gray-200">
            <p class="font-manrope font-semibold text-2xl text-gray-900">Total</p>
            <p class="font-manrope font-extrabold text-3xl text-green-600">LKR {{$value}}</p>
        </div>
    </div>

    <!-- Thank You Message -->
    <div class="text-center mt-10">
        <p class="font-normal text-lg text-gray-600 mb-4">Show the Order Token when picking up your order.</p>
        <h6 class="font-manrope font-extrabold text-2xl text-brown-700">Thank you for your order!</h6>
    </div>
</section>

</body>
</html>
