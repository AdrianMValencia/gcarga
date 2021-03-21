var url = window.location;
$("ul.nav-sidebar a")
  .filter(function () {
    return this.href == url;
  })
  .addClass("active");
$("ul.nav-treeview a")
  .filter(function () {
    return this.href == url;
  })
  .parentsUntil(".nav-sidebar > .nav-treeview")
  .addClass("menu-open")
  .prev("a")
  .addClass("active");

$(".select2").select2({
  theme: "bootstrap4",
});

$(document).ready(function () {
  $("td:even").addClass("odd");
});