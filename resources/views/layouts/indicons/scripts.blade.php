  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
      // search-box open close js code
      let navbar = document.querySelector(".navbar");
      let searchBox = document.querySelector(".search-box .bx-search");
      // let searchBoxCancel = document.querySelector(".search-box .bx-x");

      searchBox.addEventListener("click", () => {
          navbar.classList.toggle("showInput");
          if (navbar.classList.contains("showInput")) {
              searchBox.classList.replace("bx-search", "bx-x");
          } else {
              searchBox.classList.replace("bx-x", "bx-search");
          }
      });

      // sidebar open close js code
      let navLinks = document.querySelector(".nav-links");
      let menuOpenBtn = document.querySelector(".navbar .bx-menu");
      let menuCloseBtn = document.querySelector(".nav-links .bx-x");
      menuOpenBtn.onclick = function() {
          navLinks.style.left = "0";
      }
      menuCloseBtn.onclick = function() {
          navLinks.style.left = "-100%";
      }


      // sidebar submenu open close js code
      let htmlcssArrow = document.querySelector(".htmlcss-arrow");

      if (htmlcssArrow) {
          htmlcssArrow.onclick = function() {
            navLinks.classList.toggle("show1");
          }
      }


      let moreArrow = document.querySelector(".more-arrow");

      if (moreArrow) {
          moreArrow.onclick = function() {
            navLinks.classList.toggle("show2");
          }
      }

      let jsArrow = document.querySelector(".js-arrow");

      if (jsArrow) {
          jsArrow.onclick = function() {
            navLinks.classList.toggle("show3");
          }
      }
  </script>
