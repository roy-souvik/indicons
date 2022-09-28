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

      function addCountdownTimer(countdownDayMonth = '01/27/') {
          const second = 1000;
          const minute = second * 60;
          const hour = minute * 60;
          const day = hour * 24;

          let today = new Date();
          let dd = String(today.getDate()).padStart(2, "0");
          let mm = String(today.getMonth() + 1).padStart(2, "0");
          let yyyy = today.getFullYear();
          let nextYear = yyyy + 1;
          let monthDay = countdownDayMonth;
          let birthday = monthDay + yyyy;

          today = mm + "/" + dd + "/" + yyyy;

          if (today > birthday) {
              birthday = monthDay + nextYear;
          }

          const countDown = new Date(birthday).getTime();

          const x = setInterval(function() {
              const now = new Date().getTime(),
                  distance = countDown - now;

              document.getElementById("days").innerText = Math.floor(distance / (day)),
                  document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                  document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                  document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

              //do something later when date is reached
              if (distance < 0) {
                  document.getElementById("headline").innerText = "It's the conference day!";
                  document.getElementById("countdown").style.display = "none";
                  document.getElementById("content").style.display = "block";
                  clearInterval(x);
              }
              //seconds
          }, 0);
      }
  </script>
