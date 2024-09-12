import "./styles/global.scss";

import "bootstrap";

import $ from 'jquery';

// app.js

// const $ = require('jquery');
// // this "modifies" the jquery module: adding behavior to it
// // the bootstrap module doesn't export/return anything
// require('bootstrap');

// or you can include specific pieces
require("bootstrap/js/dist/tooltip");
require("bootstrap/js/dist/popover");

// $(document).ready(function() {
//     $('[data-toggle="popover"]').popover();
// });
$(function () {
  console.log("jQuery est chargé !");
});

$(function () {
  var navbar = $(".navbar");
  var origOffsetY = navbar.offset().top;

  function onScroll() {
    if ($(window).scrollTop() > origOffsetY) {
      navbar.addClass("fixed-top");
      $("body").css("padding-top", navbar.outerHeight() + "px");
    } else {
      navbar.removeClass("fixed-top");
      $("body").css("padding-top", "0");
    }
  }
  $(window).on("scroll", onScroll);
});

//swipe
document.addEventListener("DOMContentLoaded", function () {
  var swiperMain = new Swiper(".swiper-container", {
    slidesPerView: 3,
    spaceBetween: 10,
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  });

  var swiperArticles = new Swiper(".swiper-container-articles", {
    slidesPerView: 2,
    spaceBetween: 30,
    breakpoints: {
      645: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      992: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    // autoplay: {
    //   delay: 3500,
    //   disableOnInteraction: false,
    // },
  });
});
