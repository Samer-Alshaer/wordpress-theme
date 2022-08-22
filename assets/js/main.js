let navbar_toggler = document.querySelector('.navbar-toggler');
let custom_nav_class = document.querySelector('.menu-top-menu-container');


let menu_icon = document.querySelector('.custom_nav_class');

navbar_toggler.addEventListener('click', function () {
  custom_nav_class.classList.toggle('active_nav');
  if (custom_nav_class.classList.contains('active_nav')) {
    navbar_toggler.classList.remove('bx-menu')
    navbar_toggler.classList.add('bx-x')
  } else {
    navbar_toggler.classList.add('bx-menu')
    navbar_toggler.classList.remove('bx-x')
  }
});
