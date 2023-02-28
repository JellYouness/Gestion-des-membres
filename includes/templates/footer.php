        <script>
          function myFunction() {
          var nav = document.getElementById("nav");
          var body = document.getElementById("inside-container");
          if (nav.style.display == "none") {
            nav.style.display = "flex";
            body.style.margin = "5.8rem 0 0 2rem";
            } else {
            nav.style.display = "none";
            body.style.margin = "5.8rem 0 0 0";
          }
        }
        </script>
  </body>
</html>