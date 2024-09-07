
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-10">
        <!-- Food Item 1 -->
        @foreach($foodItems as $fooditem)
            <div class="bg-white p-6 rounded-lg shadow-lg dish-card" data-aos="fade-up">
                <img src="/mnt/data/image.png" alt="Dish Image" class="w-full h-40 object-cover rounded-t-lg mb-4">
                <h3 class="text-xl font-bold mb-2">{{ $fooditem->title }}</h3>
                <p class="text-gray-600 mb-2">LKR {{ $fooditem->price }}</p>

{{--                Discounted price (should be there only if the discounted price is available, and also there should be a strikethrough in the
                     original price if the discounted price is there--}}
{{--                <p class="text-green-600 font-bold text-xl mb-2">LKR {{ $fooditem->discounted_price }}</p>--}}


                <div class="flex justify-between items-center">
                    <form action="{{ url('add_cart', $fooditem->id) }}" method="POST" class="flex items-center">
                        @csrf <!-- This is important for security reasons (CSRF protection) -->

                        <div class="flex items-center">
                            <button type="button" class="button-primary px-3 py-1 rounded-l-lg" onclick="updateQuantity(this, -1)">-</button>
                            <input type="number" name="quantity" value="1" min="1" class="w-12 text-center border-t border-b">
                            <button type="button" class="button-primary px-3 py-1 rounded-r-lg" onclick="updateQuantity(this, 1)">+</button>
                        </div>

                        <input type="hidden" name="price" value="{{ $fooditem->price }}">

                        <button type="submit" class="button-primary py-2 px-4 rounded-lg ml-4">Add to Cart</button>
                    </form>
                </div>
            </div>
        @endforeach



    </div>

</main>
