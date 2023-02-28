const form = document.getElementById("search-bar");
const submit = document.getElementById("search_btn");
submit.addEventListener("keyup", function (e) {
  e.preventDefault();
  submit.submit();
});
