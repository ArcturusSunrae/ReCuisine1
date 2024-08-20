<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReCuisine</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Swiper.js JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v1.1.5/dist/alpine.js"></script>



</head>
<body class="bg-brown-900">
<div class="flex min-h-screen items-center justify-center bg-slate-200">
    <div class="mx-auto max-w-6xl px-12">
        <h1 class="font-bold text-5xl text-center mb-10">Select Payment Method</h1>

        <div class="flex flex-wrap justify-center gap-3">
            <label class="cursor-pointer">
                <input type="radio" class="peer sr-only" name="paymentMethod" value="pickup" />
                <div class="w-72 max-w-xl rounded-md bg-white p-5 text-black ring-2 ring-transparent transition-all hover:shadow peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                    <div class="flex items-center justify-between text-2xl">
                        <p>Pay at Pickup</p>
                    </div>
                </div>
            </label>

            <label class="cursor-pointer">
                <input type="radio" class="peer sr-only" name="paymentMethod" value="online" />
                <div class="w-72 max-w-xl rounded-md bg-white p-5 text-black  ring-2 ring-transparent transition-all hover:shadow peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                    <div class="flex items-center justify-between text-2xl">
                        <p>Pay Online</p>
                    </div>
                </div>
            </label>
        </div>

        <div class="flex flex-wrap justify-center gap-3">
            <button onclick="proceed()" class="font-semibold text-2xl mt-4 px-4 py-2 bg-green-500 text-white rounded ">Proceed</button>
        </div>

        <a href="{{ url('mycart') }}" class="flex font-semibold text-indigo-600 text-sm mt-3">
            <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
            </svg>
            Back
        </a>
    </div>
</div>

<script>
    function proceed() {
        const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;

        if (paymentMethod === 'pickup') {
            window.location.href = "{{ route('pickup.scheduling') }}";
        } else if (paymentMethod === 'online') {
            window.location.href = "{{ route('online.payment') }}";
        }
    }
</script>


</body>
</html>
