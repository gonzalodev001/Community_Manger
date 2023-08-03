const sidebarToggle = document.querySelector("#sidebar-toggle");
console.log(sidebarToggle);
sidebarToggle.addEventListener("click", function() {
    document.querySelector("#sidebar").classList.toggle("collapsed");
});