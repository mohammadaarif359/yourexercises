<footer class="text-center text-lg-start text-white ps-footer" style="background-color: #2c2e31">
   <!-- Section: Social media -->
   <section class="d-flex justify-content-between py-2 p-md-4 container flex-wrap" style="background-color: #1f2126">
      <!-- Left -->
      <div class="me-5">
         <span class="paragraph-lg">Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
      <div class=" pt-2 pt-md-0">
         <a href="" class="text-white mr-4">
         <i class="fab fa-facebook-f"></i>
         </a>
         <a href="" class="text-white mr-4">
         <i class="fab fa-twitter"></i>
         </a>
         <a href="" class="text-white mr-4">
         <i class="fab fa-google"></i>
         </a>
         <a href="" class="text-white mr-4">
         <i class="fab fa-instagram"></i>
         </a>
         <a href="" class="text-white mr-4">
         <i class="fab fa-linkedin"></i>
         </a>
         <a href="" class="text-white mr-4">
         <i class="fab fa-github"></i>
         </a>
      </div>
   </section>
   <!-- Section: Social media -->
   <!-- Section: Links  -->
   <section class="">
      <div class="container text-center text-md-start mt-5">
         <!-- Grid row -->
         <div class="row mt-3 flex-wrap">
            <!-- Grid column -->
            <div class="col-sm-3 col-lg-4 col-xl-3 mb-4 text-left">
               <!-- Content -->
               <h6 class="text-uppercase fw-bold">Your Exerises name</h6>
               <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #4a4a4a; height: 2px" />
               <p>
                  Here you can use rows and columns to organize your footer
                  content. Lorem ipsum dolor sit amet, consectetur adipisicing
                  elit.
               </p>
            </div>
            <!-- Grid column -->
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4 text-left">
               <!-- Links -->
               <h6 class="text-uppercase fw-bold">Products</h6>
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
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4 text-left">
               <!-- Links -->
               <h6 class="text-uppercase fw-bold">Quick links</h6>
               <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #4a4a4a; height: 2px" />
               <p class="m-0">
                  <a href="#!" class="text-white">Your Account</a>
               </p>
               <p class="m-0">
                  <a href="#!" class="text-white">Book A Demo</a>
               </p>
               <p class="m-0">
                  <a href="#!" class="text-white">Contact</a>
               </p>
               <p class="m-0">
                  <a href="#!" class="text-white">privacy Policy</a>
               </p>
            </div>
            <!-- Grid column -->
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-left">
               <!-- Links -->
               <h6 class="text-uppercase fw-bold">Contact</h6>
               <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #4a4a4a; height: 2px" />
               <p class="m-1"><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
               <p class="m-1"><i class="fas fa-envelope mr-3"></i> info@yourexercises.com</p>
               <p class="m-1"><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
               <p class="m-1"><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
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
<script>
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
   
  const navbarMenu = document.getElementById("menu");
  const burgerMenu = document.getElementById("burger");
  const headerMenu = document.getElementById("header");
   
  // Open Close Navbar Menu on Click Burger
  if (burgerMenu && navbarMenu) {
    burgerMenu.addEventListener("click", () => {
      burgerMenu.classList.toggle("is-active");
      navbarMenu.classList.toggle("is-active");
    });
  }

  // Close Navbar Menu on Click Menu Links
  document.querySelectorAll(".menu-link").forEach((link) => {
    link.addEventListener("click", () => {
      burgerMenu.classList.remove("is-active");
      navbarMenu.classList.remove("is-active");
    });
  });

  // Change Header Background on Scrolling
  window.addEventListener("scroll", () => {
    if (this.scrollY >= 85) {
      headerMenu.classList.add("on-scroll");
    } else {
      headerMenu.classList.remove("on-scroll");
    }
  });
   
  // Fixed Navbar Menu on Window Resize
  window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
      if (navbarMenu.classList.contains("is-active")) {
        navbarMenu.classList.remove("is-active");
      }
    }
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
</script>