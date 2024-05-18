const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
  navLinks.classList.toggle("open");

  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
});

navLinks.addEventListener("click", (e) => {
  navLinks.classList.remove("open");
  menuBtnIcon.setAttribute("class", "ri-menu-line");
});
document.addEventListener('DOMContentLoaded', function () {
  const getStartedButton = document.querySelector('.btn.btn__primary');
  if (getStartedButton) {
    getStartedButton.addEventListener('click', function () {
      window.location.href = 'BUTTON.html'; // Redirect to BUTTON.html when clicked
    });
  }
});
// JavaScript function to show toast message
function showToast(message) {
  // Get the toast element
  var toast = document.getElementById("toast");

  // Set the message content
  toast.innerHTML = message;

  // Show the toast
  toast.style.display = "block";

  // Hide the toast after 2 minutes (120000 milliseconds)
  setTimeout(function () {
    toast.style.display = "none";
  }, 120000); // 2 minutes
}

const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

ScrollReveal().reveal(".header__content h1", {
  ...scrollRevealOption,
});
ScrollReveal().reveal(".header__content h2", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".header__content p", {
  ...scrollRevealOption,
  delay: 1000,
});
ScrollReveal().reveal(".header__content .header__btn", {
  ...scrollRevealOption,
  delay: 1500,
});

ScrollReveal().reveal(".about__card", {
  duration: 1000,
  interval: 500,
});

ScrollReveal().reveal(".trainer__card", {
  ...scrollRevealOption,
  interval: 500,
});

ScrollReveal().reveal(".blog__card", {
  ...scrollRevealOption,
  interval: 500,
});

const swiper = new Swiper(".swiper", {
  direction: 'horizontal',
  loop: true,
  pagination: {
    el: '.swiper-pagination',
  },
});

// Get the full name from local storage
var firstName = localStorage.getItem('firstName');
var lastName = localStorage.getItem('lastName');
function getInitials(name) {
  return name.trim().split(' ').map(word => word.charAt(0)).join('');
}
// Combine the initials of first name and last name
var initials = getInitials(firstName) + getInitials(lastName);

// Update the user name initials in the navigation bar
document.getElementById('nameLogo').innerText = initials;

