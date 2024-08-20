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

    <style>
        @keyframes rotateCategories {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .marquee {
            overflow: hidden;
            white-space: nowrap;
        }
        .marquee-content {
            display: inline-block;
            animation: rotateCategories 20s linear infinite;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .icon {
            background: #9B5618;
            border-radius: 50%;
            padding: 10px;
        }
        .icon img {
            filter: invert(1);
        }
        .button-primary {
            background: #9B5618;
            color: #ffffff;
            border-radius: 10px;
            padding: 10px 20px;
            transition: background 0.3s ease;
        }
        .button-primary:hover {
            background: #208D4C;
        }
        .button-secondary {
            background: #208D4C;
            color: #ffffff;
            border-radius: 10px;
            padding: 10px 20px;
            border: 2px solid #9B5618;
            transition: background 0.3s ease;
        }
        .button-secondary:hover {
            background: #9B5618;
        }
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .step-section {
            display: none;
        }
        .step-section.active {
            display: flex;
        }

        .footerbody {
            font-family: Arial, sans-serif;
        }

        .footerbody {
            background-color: #2f855a;
            color: white;
            padding: 24px;
            margin-top: 40px;
        }
        .footerbody .container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }
        .footerbody .flex {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .footerbody h3 {
            font-weight: bold;
            font-size: 1.125rem;
            margin-bottom: 8px;
        }
        .footerbody ul {
            list-style: none;
            padding: 0;
        }
        .footerbody ul li {
            margin-bottom: 4px;
        }
        .footerbody a {
            color: white;
            text-decoration: none;
        }
        .footerbody a:hover {
            text-decoration: underline;
        }
        .footerbody .mt-4 {
            margin-top: 16px;
        }
        .footerbody .mt-6 {
            margin-top: 24px;
        }
        .footerbody p {
            font-size: 0.875rem;
        }


        .page-content {
            height: 150vh;
            background-color: #f0f0f0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        /* Footer Styles */
        .site-footer {
            background-color: #004d40;
            color: white;
            padding: 2.5rem 0;
            opacity: 0;
            transform: translateY(100%);
            transition: opacity 1s ease-out, transform 1s ease-out;
            text-align: center;
        }

        .site-footer.show {
            opacity: 1;
            transform: translateY(0);
        }

        .site-footer h2 {
            font-size: 6rem;
            font-weight: bold;
            margin: 0;
        }

        .site-footer a {
            color: white;
            transition: color 0.3s ease;
            margin: 0 0.75rem;
        }

        .site-footer a:hover {
            color: #b2dfdb;
        }

        .site-footer img {
            max-height: 2.5rem;
            transition: opacity 0.3s ease;
        }

        .site-footer img:hover {
            opacity: 0.8;
        }

        .social-links a {
            font-size: 2rem;
            margin: 0 0.75rem;
        }



        .button-primary {
            display: inline-block;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            cursor: pointer;
        }


        body {
            background-color: #f3ede8;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }

        .card {
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background-color: #f3f3f3;
        }

        #how-it-works {
            background-color: #f8f8f8;
            padding: 5rem 0;
        }

        #how-it-works .container {
            max-width: 1200px;
        }

        #how-it-works h2 {
            font-size: 3rem;
            color: #160d04;
        }

        .card {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 1rem;
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }

        .card:nth-child(1) {
            animation-delay: 0.3s;
        }

        .card:nth-child(2) {
            animation-delay: 0.6s;
        }

        .card:nth-child(3) {
            animation-delay: 0.9s;
        }

        .icon img {
            width: 3rem;
            height: 3rem;
            transition: transform 0.3s;
        }

        .card:hover .icon img {
            transform: rotate(360deg);
        }

        .card h3 {
            font-size: 1.75rem;
            color: #333333;
        }

        .card p {
            font-size: 1rem;
            color: #555555;
        }

        #flash-banner {
            animation: fadeOut 5s forwards; /* Fade out after 5 seconds */
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            80% { opacity: 1; }
            100% { opacity: 0; }
        }


    </style>
</head>
<body class="bg-brown-900">



@if (session('success'))
    <div id="flash-banner" class="top-0 left-0 right-0 bg-yellow-200 text-black text-center py-3 z-50">
        {{ session('success') }}
    </div>
@endif


<!-- Header Section -->
<header class="bg-green-900 text-white">
    <div class="container mx-auto flex justify-between items-center p-4">
        <div class="flex items-center">
            <img src="images/logo.jpg" alt="ReCuisine Logo" class="h-12 w-12 mr-3">
            <select class="ml-20 bg-white text-black p-2 rounded">
                <option>Select Location</option>
            </select>
        </div>
        <div class="flex items-center space-x-6">
            <a href="{{ route('home') }}" class="text-white">Home</a>
            <a href="{{ route('all-items') }}" class="text-white">All Items</a>

            <!-- Show Login and Register links only if the user is not logged in -->
            @guest
                <a href="{{ route('login') }}" class="text-white">Login</a>
                <a href="{{ route('register') }}" class="text-white">Register</a>
            @endguest

            <!-- Show Logout link only if the user is logged in -->
            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white">Logout</button>
                </form>
            @endauth

            <a href="{{ route('register_supplier') }}" class="bg-green-700 hover:bg-green-800 text-white py-2 px-4 rounded">Become a Supplier</a>

            <a href="{{url('mycart')}}" class="text-white">
                <i class="fas fa-shopping-cart"></i>
                ({{ $count }})
            </a>
        </div>
    </div>
</header>



<!-- Search Section -->
<section class="bg-white py-8">
    <div class="container mx-auto flex justify-center items-center">
        <input type="text" placeholder="Search" class="w-1/2 border border-gray-300 rounded-lg px-4 py-2">
    </div>
</section>




<!-- Categories -->
<section class="py-8 bg-gray-100">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-center">Search by Category</h2>
        <div class="flex justify-center space-x-6 overflow-x-auto pb-4">
            <!-- Category 1 -->
            <div class="flex flex-col items-center w-40 h-40 flex-shrink-0">
                <div class="w-full h-full rounded-full overflow-hidden bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="/mnt/data/image.png" alt="Fast Food" class="object-cover w-full h-full">
                </div>
                <p class="text-center mt-2 font-semibold">Fast Food</p>
            </div>
            <!-- Category 2 -->
            <div class="flex flex-col items-center w-40 h-40 flex-shrink-0">
                <div class="w-full h-full rounded-full overflow-hidden bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="/mnt/data/image.png" alt="Bread" class="object-cover w-full h-full">
                </div>
                <p class="text-center mt-2 font-semibold">Bread</p>
            </div>
            <!-- Category 3 -->
            <div class="flex flex-col items-center w-40 h-40 flex-shrink-0">
                <div class="w-full h-full rounded-full overflow-hidden bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="/mnt/data/image.png" alt="Protein" class="object-cover w-full h-full">
                </div>
                <p class="text-center mt-2 font-semibold">Protein</p>
            </div>
            <!-- Add more categories as needed -->
        </div>
    </div>
</section>




<!-- Available Suppliers -->
<section class="py-8 bg-gray-100">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Suppliers</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <img src="/mnt/data/image.png" alt="Supplier 1" class="w-full h-32 object-cover rounded-lg mb-4">
                <h3 class="text-lg font-bold mb-2">Foodworld</h3>
                <p class="text-gray-600">Coming Soon</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <img src="/mnt/data/image.png" alt="Supplier 2" class="w-full h-32 object-cover rounded-lg mb-4">
                <h3 class="text-lg font-bold mb-2">Pizzahub</h3>
                <p class="text-gray-600">Coming Soon</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <img src="/mnt/data/image.png" alt="Supplier 3" class="w-full h-32 object-cover rounded-lg mb-4">
                <h3 class="text-lg font-bold mb-2">Donuts Hut</h3>
                <p class="text-green-500 font-semibold">Open Now</p>
            </div>
        </div>
        <div class="text-center mt-8">
            <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">View All</button>
        </div>
    </div>
</section>




<!-- Food Listing Section -->
<main class="container mx-auto mt-10">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">Available food items </h2>

    @include('fooditem')

</main>


<!-- Contact Section -->
<section class="bg-gray-800 text-white py-5">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="mb-6 md:mb-0">
                <h3 class="text-3xl font-bold">Contact Us</h3>
                <p class="text-gray-300">We'd love to hear from you. Drop us a line and we'll get back to you shortly.</p>
            </div>
            <div style="width: 400px">
                <form>
                    <div class="m-6">
                        <input type="text" placeholder="Name" class="w-full p-2 rounded-md bg-gray-900 text-white border-2 border-gray-700 focus:outline-none focus:border-white">
                    </div>
                    <div class="mb-4">
                        <input type="email" placeholder="Email" class="w-full p-2 rounded-md bg-gray-900 text-white border-2 border-gray-700 focus:outline-none focus:border-white">
                    </div>
                    <div class="mb-4">
                        <textarea placeholder="Message" class="w-full p-2 rounded-md bg-gray-900 text-white border-2 border-gray-700 focus:outline-none focus:border-white" rows="5"></textarea>
                    </div>
                    <div>
                        <button class="button-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>








<!-- Footer Section -->
<footer class="footerbody">
    <div class="container">
        <div class="flex">
            <div>
                <h3>PROGRAMS</h3>
                <ul>
                    <li><a href="#" class="hover:underline">Food Rescue</a></li>
                    <li><a href="#" class="hover:underline">Just Eats</a></li>
                    <li><a href="#" class="hover:underline">Heat-n-Eats</a></li>
                    <li><a href="#" class="hover:underline">Healthy Eats</a></li>
                    <li><a href="#" class="hover:underline">Transportation Partnership</a></li>
                </ul>
            </div>
            <div>
                <h3>NEWS & INFO</h3>
                <ul>
                    <li><a href="#" class="hover:underline">In the News</a></li>
                    <li><a href="#" class="hover:underline">Press Room</a></li>
                    <li><a href="#" class="hover:underline">Public Documents</a></li>
                    <li><a href="#" class="hover:underline">Funders</a></li>
                </ul>
            </div>
            <div>
                <h3>HOW TO HELP</h3>
                <ul>
                    <li><a href="#" class="hover:underline">Donate</a></li>
                    <li><a href="#" class="hover:underline">Donate Food</a></li>
                    <li><a href="#" class="hover:underline">Volunteer</a></li>
                    <li><a href="#" class="hover:underline">Share Your Story</a></li>
                </ul>
            </div>
            <div>
                <h3>CONTACT US</h3>
                <ul>
                    <li><a href="#" class="hover:underline">Food Rescue Donations</a></li>
                    <li><a href="#" class="hover:underline">Volunteer</a></li>
                    <li><a href="#" class="hover:underline">Media Inquiries</a></li>
                </ul>
                <div class="mt-4">
                    <a href="#" class="hover:underline">Check out our four star rating on Charity Navigator!</a>
                </div>
            </div>
        </div>

    </div>
</footer>






<!-- Footer Section -->
<footer class="site-footer" id="footer">
    <div class="container mx-auto text-center">
        <img src="images/logo.png" alt="Rescue Cuisine Logo" class="mx-auto mb-4">
        <h2 class="mb-4">RESCUE CUISINE</h2>
        <div class="social-links mb-8">
            <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-linkedin"></i></a>
            <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-tiktok"></i></a>
            <a href="#" class="text-white hover:text-gray-300"><i class="fab fa-youtube"></i></a>
        </div>
        <div class="footer-links mb-4">
            <a href="#" class="text-white hover:text-gray-300">Careers</a>
            <a href="#" class="text-white hover:text-gray-300">Press</a>
            <a href="#" class="text-white hover:text-gray-300">Support</a>
            <a href="#" class="text-white hover:text-gray-300">MyStore</a>
        </div>
        <div class="policy-links mb-4">
            <a href="#" class="text-white hover:text-gray-300">Legal</a>
            <a href="#" class="text-white hover:text-gray-300">Privacy Policy</a>
            <a href="#" class="text-white hover:text-gray-300">Cookie Policy</a>
            <a href="#" class="text-white hover:text-gray-300">Terms & Conditions</a>
            <a href="#" class="text-white hover:text-gray-300">Contact Us</a>
            <a href="#" class="text-white hover:text-gray-300">DSA Disclosure</a>
            <a href="#" class="text-white hover:text-gray-300">Do Not Sell or Share My Data</a>
            <a href="#" class="text-white hover:text-gray-300">Food Waste Sources</a>
        </div>


        <div class="mt-6">
            <p>&copy; 2024 ReCuisine. All rights reserved.</p>
        </div>

</footer>










<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
    });

    document.addEventListener('scroll', function() {
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach(element => {
            const rect = element.getBoundingClientRect();
            if (rect.top <= window.innerHeight) {
                element.classList.add('visible');
            }
        });
    });

    function updateQuantity(button, delta) {
        const input = button.parentNode.querySelector('input');
        const currentValue = parseInt(input.value);
        input.value = Math.max(currentValue + delta, 0);
    }

    document.addEventListener('DOMContentLoaded', () => {
        const sections = document.querySelectorAll('.step-section');
        window.addEventListener('scroll', () => {
            const scrollPosition = window.scrollY + window.innerHeight / 2;
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                if (scrollPosition > sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    section.classList.add('active');
                } else {
                    section.classList.remove('active');
                }
            });
        });
    });




    document.addEventListener('DOMContentLoaded', function () {
        const footer = document.getElementById('footer');

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    footer.classList.add('show');
                    observer.disconnect();
                }
            });
        }, { threshold: 0.1 });

        observer.observe(footer);
    });

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
