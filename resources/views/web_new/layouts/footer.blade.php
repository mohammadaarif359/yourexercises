<footer class="text-center text-lg-start text-white ps-footer" style="background-color: #2c2e31">
   <!-- Section: Social media -->
   <section class="d-flex justify-content-between py-2 p-md-4 container flex-wrap" style="background-color: #1f2126">
      <!-- Left -->
      <div class="me-5">
         <span class="paragraph-lg">Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
      <div class=" pt-2 pt-md-0">
         <a href="https://www.facebook.com/yourexercises/" class="text-white mr-4">
         <i class="fab fa-facebook-f"></i>
         </a>
         <a href="#" class="text-white mr-4">
         <i class="fa-brands fa-x-twitter"></i>
         </a>
         <a href="https://www.instagram.com/yourexercises/" class="text-white mr-4">
         <i class="fab fa-instagram"></i>
         </a>
         <a href="https://in.linkedin.com/company/yourexercises" class="text-white mr-4">
         <i class="fab fa-linkedin"></i>
         </a>     
         <a href="https://www.youtube.com/@YourExercises-YE" class="text-white mr-4">
         <i class="fab fa-youtube"></i>
         </a>>
      </div>
   </section>
   <!-- Section: Social media -->
   <!-- Section: Links  -->
   <section class="">
      <div class="container text-center text-md-start mt-3">
         <!-- Grid row -->
         <div class="row mt-3 flex-wrap">
            <!-- Grid column -->
            {{--<div class="col-sm-3 col-lg-4 col-xl-3 mb-4 text-left">
               <!-- Content -->
               <h6 class="text-uppercase fw-bold">Your Exerises name</h6>
               <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #4a4a4a; height: 2px" />
               <p>
                  Here you can use rows and columns to organize your footer
                  content. Lorem ipsum dolor sit amet, consectetur adipisicing
                  elit.
               </p>
            </div>--}}
            <!-- Grid column -->
            <!-- Grid column -->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4 text-left">
               <!-- Links -->
               <a href="{{ url('/features') }}" class="text-white"><h6 class="text-uppercase fw-bold">Features</h6></a>
               <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #4a4a4a; height: 2px" />
               <p class="m-0">
                  <a href="#!" class="text-white">Paperless Patient Management</a>
               </p>
               <p class="m-0">
                  <a href="#!" class="text-white">Advanced Performance Dashboard</a>
               </p>
               <p class="m-0">
                  <a href="#!" class="text-white">Custom Exercise Creation</a>
               </p>
               <p class="m-0">
                  <a href="#!" class="text-white">Boost Your Online Presence</a>
               </p>
            </div>
            <!-- Grid column -->
            <!-- Grid column -->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4 text-left">
               <!-- Links -->
               <h6 class="text-uppercase fw-bold">About YE</h6>
               <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #4a4a4a; height: 2px" />
               <p class="m-0">
                  <a href="#!" class="text-white">Your Account</a>
               </p>
               <p class="m-0">
                  <a href="{{ url('/book-a-demo') }}" class="text-white">Book A Demo</a>
               </p>
               <p class="m-0">
                  <a href="{{ url('/privacy-policy') }}" class="text-white">Privacy Policy</a>
               </p>
               <p class="m-0">
                  <a href="{{ url('/terms-condition') }}" class="text-white">Terms Condition</a>
               </p>
            </div>
            <!-- Grid column -->
            <!-- Grid column -->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4 text-left">
               <!-- Links -->
               <h6 class="text-uppercase fw-bold">Contact</h6>
               <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #4a4a4a; height: 2px" />
               <p class="m-1"><i class="fas fa-home mr-3"></i> Toronto, ON</p>
               <p class="m-1"><i class="fas fa-phone mr-3"></i> (647) 890-2111</p>
               <p class="m-1"><i class="fas fa-envelope mr-3"></i> info@yourexercises.com</p>
               <p class="m-1"><i class="fas fa-envelope mr-3"></i> support@yourexercises.com</p>
            </div>
            <!-- Grid column -->
         </div>
         <!-- Grid row -->
      </div>
   </section>
   <!-- Section: Links  -->
   <!-- Copyright -->
   <div class="text-center p-3" style="background-color: #1f2126">
      © {{ date('Y') }} Copyright:
      <a class="text-white" href="{{ url('/') }}">yourexercises.com</a>
   </div>
   <!-- Copyright -->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>  
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script> 
<script>
   // header script start
   document.addEventListener("DOMContentLoaded", () => {
      const menuToggle = document.querySelector(".menu-toggle");
      const navLinks = document.querySelector(".nav-links");
      const dropdownToggle = document.querySelector(".ps-dropdown-toggle-mobile");
      const dropdownMenu = document.querySelector(".ps-dropdown-menu-mobile");

      // Toggle menu on hamburger click
      menuToggle.addEventListener("click", (event) => {
         event.stopPropagation();
         navLinks.classList.toggle("active");
      });

      // Prevent closing menu when clicking inside
      navLinks.addEventListener("click", (event) => {
         event.stopPropagation(); // Stops clicks inside menu from closing it
      });

      // Toggle mobile dropdown
      dropdownToggle.addEventListener("click", function (event) {
         event.preventDefault();
         event.stopPropagation(); // Prevents click from reaching document
         dropdownMenu.classList.toggle("show");
      });

      // Prevent dropdown from closing when clicking inside
      dropdownMenu.addEventListener("click", (event) => {
         event.stopPropagation();
      });

      // Close menu when clicking completely outside
      document.addEventListener("click", (event) => {
         if (!navLinks.contains(event.target) && !menuToggle.contains(event.target)) {
            navLinks.classList.remove("active");
         }

         if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove("show");
         }
      });
   });

   document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter");
    const animateCounters = () => {
      counters.forEach((counter) => {
        const updateCounter = () => {
          const target = +counter.getAttribute("data-target");
          const current = +counter.innerText;
          const increment = Math.ceil(target / 800); // Adjust speed by changing the divisor
  
          if (current < target) {
            counter.innerText = current + increment;
            setTimeout(updateCounter, 20); // Adjust timing here
          } else {
            counter.innerText = target;
          }
        };
        updateCounter();
      });
   };
   
   const checkScroll = () => {
      const triggerHeight = window.innerHeight * 0.9; // 90% of viewport height
      counters.forEach((counter) => {
        const counterTop = counter.getBoundingClientRect().top;
        if (counterTop < triggerHeight) {
          animateCounters();
        }
      });
   };
   
   window.addEventListener("scroll", checkScroll);
    checkScroll(); // Trigger check on load
   });
   
   // swtiper
   const swiper = new Swiper('.swiper', {
    loop: true,                // Loop through slides
    autoplay: {
      delay: 3000,             // Auto-slide delay (in ms)
      disableOnInteraction: false, // Keep auto-slide after interaction
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
   });

  document.addEventListener("DOMContentLoaded", function () {
      // Select all sections with the class 'section'
      const sections = document.querySelectorAll('.section');

      // Options for the IntersectionObserver
      const observerOptions = {
         root: null, // Use the viewport as the root
         rootMargin: '0px', // No margin
         threshold: 0.1 // Trigger when 10% of the section is visible
      };

      // Callback function for the IntersectionObserver
      const observerCallback = (entries, observer) => {
         entries.forEach(entry => {
            // Check if the section is in view and hasn't been animated yet
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
            // Add the 'animate' class to trigger the animation
            entry.target.classList.add('animate', 'animated');
            // Stop observing the section after animation
            observer.unobserve(entry.target);
            }
         });
      };

      // Create the IntersectionObserver
      const observer = new IntersectionObserver(observerCallback, observerOptions);

      // Observe each section
      sections.forEach(section => {
         observer.observe(section);
      });
   });
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
   });
   @if(Session::get('success'))
      Toast.fire({
         icon: 'success',
         title: '{!! Session::get('success') !!}'
      });
   @elseif(Session::get('error'))
      Toast.fire({
         icon: 'error',
         title: '{!! Session::get('error') !!}'
      });
   @endif
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script> AOS.init(); </script>