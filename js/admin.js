const NavDrop = document.querySelector(".navdrop");
const NavdropBoxes = document.querySelectorAll(".NavdropBox");
const navBarAdmin = document.querySelectorAll(".navBarAdmin");

const notifBox = document.querySelector(".notifBox");
const notificationsToggle = document.getElementById("notifications");
const SidebarAdmin = document.getElementById("SidebarAdmin");

notificationsToggle.addEventListener("click", () => {
  notifBox.classList.toggle("BoxNotifications-Active");
});

navBarAdmin.forEach((othernav) => {
  othernav.addEventListener("click", () => {
    navBarAdmin.forEach((nav) => {
      if (nav !== othernav && nav.classList.contains("navAdmin-active")) {
        nav.classList.remove("navAdmin-active");
      }
    });
    othernav.classList.add("navAdmin-active");
  });
});

// Navlink Active Navbar
const pathName = window.location.pathname;
const pageName = pathName.split("/").pop();
// Navlink
if (pageName === "Homepage-Admin.html") {
  document.querySelectorAll(".FrontendNav").forEach(function (element) {
    element.classList.add("navAdmin-active");
    const ParentBox = NavDrop.parentNode;
    const NavdropNextElement = NavDrop.nextElementSibling;
    SidebarAdmin.classList.add("overflow-y-auto");
    NavDrop.classList.add("NavAdminToggle-active");
    NavdropNextElement.classList.add("BoxNavAdmin-Active");
    ParentBox.classList.add("parentAdminNav-Active");
  });
}

if (pageName === "Dashboard-Admin.html") {
  document.querySelectorAll(".DashboardNav").forEach(function (element) {
    element.classList.add("navAdmin-active");
  });
}

// Navlink end

// Navlink Active Navbar End

NavDrop.addEventListener("click", () => {
  const ParentBox = NavDrop.parentNode;
  const NavdropNextElement = NavDrop.nextElementSibling;
  SidebarAdmin.classList.toggle("overflow-y-auto");
  NavDrop.classList.toggle("NavAdminToggle-active");
  NavdropNextElement.classList.toggle("BoxNavAdmin-Active");
  ParentBox.classList.toggle("parentAdminNav-Active");
});
