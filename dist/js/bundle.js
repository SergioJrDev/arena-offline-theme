/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

	'use strict';

	$(document).ready(function () {
		$('.hamburger').click(function () {

			if ($(this).closest('.nav').find('.nav-content').hasClass('showMenu')) {
				$(this).removeClass('is-active');
				$(this).closest('.nav').find('.nav-content').removeClass('showMenu').slideUp('slow');
			} else {
				$(this).addClass('is-active');
				$(".nav-content").removeClass('showMenu').slideUp('slow');
				$(this).closest('.nav').find('.nav-content').addClass('showMenu').slideDown('slow');
			}
		});

		$('.click-game').click(function () {
			if ($(this).hasClass('showGame')) {
				$(this).removeClass('showGame');
				$(this).next().slideUp('slow');
			} else {
				$('.game-content').slideUp('slow');
				$('.click-game').removeClass('showGame');
				$(this).addClass('showGame');
				$(this).next().slideDown('slow');
			}
		});

		$('.select_paginate').change(function (e) {
			$(this).closest("form").submit();
		});

		$('.slider-front').owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			dots: false,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				}
			}
		});

		$('.owl-carousel-main').owlCarousel({
			loop: true,
			margin: 10,
			nav: false,
			dots: true,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			responsive: {
				0: {
					items: 1
				}
			}
		});
	});

/***/ })
/******/ ]);
//# sourceMappingURL=bundle.js.map
