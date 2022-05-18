const bgModalLogin = document.querySelector('.bg-modal-login');
const bgModalSignup = document.querySelector('.bg-modal-signup');
const openModalLogin = document.querySelector('.open-modal-login');
const openModalSignup = document.querySelector('.open-modal-signup');
const closeModalLogin = document.querySelector('.close-modal-login');
const closeModalSignup = document.querySelector('.close-modal-signup');

openModalLogin.addEventListener('click', function() {
    bgModalSignup.classList.remove('show');
    bgModalLogin.classList.add('show');
});

closeModalLogin.addEventListener('click', function() {
    bgModalLogin.classList.remove('show');
});

openModalSignup.addEventListener('click', function() {
    bgModalLogin.classList.remove('show');
    bgModalSignup.classList.add('show');
});

closeModalSignup.addEventListener('click', function() {
    bgModalSignup.classList.remove('show');
});

new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
    }
});

(function($) {
    "use strict";
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
})(jQuery);
