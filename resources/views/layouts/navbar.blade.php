 <!-- Navbar -->
 <nav id="nav"
     class=" flex justify-center item-center bg-white text-black opacity-90 shadow-xl fixed w-full z-10 transition-all duration-300 ease-in-out">
     <div class="container mx-auto flex justify-between items-center px-20 py-4">
         <!-- Hamburger Button -->
         <button id="menu-toggle" class="relative flex flex-col items-center justify-center w-8 h-8 space-y-1 lg:hidden">
             <span id="line1" class="w-6 h-1 bg-black rounded transition-all duration-300"></span>
             <span id="line2" class="w-6 h-1 bg-black rounded transition-all duration-300"></span>
             <span id="line3" class="w-6 h-1 bg-black rounded transition-all duration-300"></span>
         </button>

         <!-- Logo -->
         <div id="logo">
             <a href="{{ route('auth.register') }}" class="text-xl font-bold">Brainstorm</a>
         </div>

         <!-- Desktop Menu -->
         <div>
             <ul
                 class="hidden flex justify-center items-center text-center lg:flex space-x-8 text-lg text-center font-medium">
                 <li><a href="#" class="hover:text-gray-700">Home</a></li>
                 <li><a href="#" class="hover:text-gray-700">Products</a></li>
                 <li><a href="#" class="hover:text-gray-700">About</a></li>
                 <li><a href="#" class="hover:text-gray-700">Service</a></li>
             </ul>
         </div>

         <button class="text-xl">
             <i class="fa-solid fa-user"></i>
         </button>
     </div>

     <!-- Mobile Menu -->
     <div id="menu" class="hidden bg-white backdrop-blur-lg opacity-85 w-full px-4 py-4 text-black lg:hidden">
         <ul class="space-y-4">
             <li>
                 <a href="#" class="block text-lg font-medium hover:text-gray-700">Home</a>
             </li>
             <li>
                 <a href="#" class="block text-lg font-medium hover:text-gray-700">Products</a>
             </li>
             <li>
                 <a href="#" class="block text-lg font-medium hover:text-gray-700">About</a>
             </li>
             <li>
                 <a href="#" class="block text-lg font-medium hover:text-gray-700">Contact</a>
             </li>
         </ul>
     </div>
 </nav>


 <!-- Menu Toggle -->
 <script>
     const menuToggle = document.getElementById("menu-toggle");
     const menu = document.getElementById("menu");
     const line1 = document.getElementById("line1");
     const line2 = document.getElementById("line2");
     const line3 = document.getElementById("line3");

     let menuOpen = false;

     menuToggle.addEventListener("click", () => {
         menuOpen = !menuOpen;

         // Toggle animasi hamburger
         if (menuOpen) {
             line1.classList.add("transform", "rotate-45", "translate-y-2");
             line2.classList.add("opacity-0");
             line3.classList.add("transform", "-rotate-45", "-translate-y-2");

             // Tampilkan menu
             menu.classList.remove("hidden");
         } else {
             line1.classList.remove("transform", "rotate-45", "translate-y-2");
             line2.classList.remove("opacity-0");
             line3.classList.remove("transform", "-rotate-45", "-translate-y-2");

             // Sembunyikan menu
             menu.classList.add("hidden");
         }
     });
 </script>

 <!-- Nav Scroll -->
 <script>
     // Change navbar style on scroll
     const navbar = document.getElementById("nav");
     const logo = document.getElementById("logo");

     window.addEventListener("scroll", () => {
         if (window.scrollY > 10) {
             navbar.classList.remove("bg-transparent", "shadow-xl", "text-slate-500");

             navbar.classList.add("backdrop-blur-3xl");
         } else {
             navbar.classList.add("bg-transparent", "text-slate-500");
             navbar.classList.remove("backdrop-blur-3xl");
         }
     });
 </script>
