/*---------------------------------------------------------------------
    File Name: custom.js
---------------------------------------------------------------------*/


$(function () {

	"use strict";

	/* Preloader
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	setTimeout(function () {
		$('.loader_bg').fadeToggle();
	}, 1500);

	/* JQuery Menu
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$('header nav').meanmenu();
	});

	/* Tooltip
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});

	/* sticky
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$(".sticky-wrapper-header").sticky({ topSpacing: 0 });
	});

	/* Mouseover
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$(".main-menu ul li.megamenu").mouseover(function () {
			if (!$(this).parent().hasClass("#wrapper")) {
				$("#wrapper").addClass('overlay');
			}
		});
		$(".main-menu ul li.megamenu").mouseleave(function () {
			$("#wrapper").removeClass('overlay');
		});
	});

	/* NiceScroll
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(".brand-box").niceScroll({
		cursorcolor: "#9b9b9c",
	});

	/* NiceSelect
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$('select').niceSelect();
	});


	
	/* OwlCarousel - Product Slider
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$('.owl-carousel').owlCarousel({
		items: 5,
		loop: true,
		margin: 10,
		merge: true,
		responsive: {
			678: {
				mergeFit: true
			},
			1000: {
				mergeFit: false
			}
		}
	});

	/* Scroll to Top
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(window).on('scroll', function () {
		scroll = $(window).scrollTop();
		if (scroll >= 100) {
			$("#back-to-top").addClass('b-show_scrollBut')
		} else {
			$("#back-to-top").removeClass('b-show_scrollBut')
		}
	});
	$("#back-to-top").on("click", function () {
		$('body,html').animate({
			scrollTop: 0
		}, 1000);
	});

	/* Contact-form
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	$.validator.setDefaults({
		submitHandler: function () {
			alert("submitted!");
		}
	});

	$(document).ready(function () {
		$("#contact-form").validate({
			rules: {
				firstname: "required",
				email: {
					required: true,
					email: true
				},
				lastname: "required",
				message: "required",
				agree: "required"
			},
			messages: {
				firstname: "Please enter your firstname",
				email: "Please enter a valid email address",
				lastname: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				message: "Please enter your Message",
				agree: "Please accept our policy"
			},
			errorElement: "div",
			errorPlacement: function (error, element) {
				// Add the `help-block` class to the error element
				error.addClass("help-block");

				if (element.prop("type") === "checkbox") {
					error.insertAfter(element.parent("input"));
				} else {
					error.insertAfter(element);
				}
			},
			highlight: function (element, errorClass, validClass) {
				$(element).parents(".col-md-4, .col-md-12").addClass("has-error").removeClass("has-success");
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).parents(".col-md-4, .col-md-12").addClass("has-success").removeClass("has-error");
			}
		});
	});

	/* heroslider
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	var swiper = new Swiper('.heroslider', {
		spaceBetween: 30,
		centeredSlides: true,
		slidesPerView: 'auto',
		paginationClickable: true,
		loop: true,
		autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
			dynamicBullets: true
		},
	});


	/* Product Filters
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	var swiper = new Swiper('.swiper-product-filters', {
		slidesPerView: 3,
		slidesPerColumn: 2,
		spaceBetween: 30,
		breakpoints: {
			1024: {
				slidesPerView: 3,
				spaceBetween: 30,
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 30,
				slidesPerColumn: 1,
			},
			640: {
				slidesPerView: 2,
				spaceBetween: 20,
				slidesPerColumn: 1,
			},
			480: {
				slidesPerView: 1,
				spaceBetween: 10,
				slidesPerColumn: 1,
			}
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
			dynamicBullets: true
		}
	});

	/* Countdown
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$('[data-countdown]').each(function () {
		var $this = $(this),
			finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function (event) {
			var $this = $(this).html(event.strftime(''
				+ '<div class="time-bar"><span class="time-box">%w</span> <span class="line-b">weeks</span></div> '
				+ '<div class="time-bar"><span class="time-box">%d</span> <span class="line-b">days</span></div> '
				+ '<div class="time-bar"><span class="time-box">%H</span> <span class="line-b">hr</span></div> '
				+ '<div class="time-bar"><span class="time-box">%M</span> <span class="line-b">min</span></div> '
				+ '<div class="time-bar"><span class="time-box">%S</span> <span class="line-b">sec</span></div>'));
		});
	});

	/* Deal Slider
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$('.deal-slider').slick({
		dots: false,
		infinite: false,
		prevArrow: '.previous-deal',
		nextArrow: '.next-deal',
		speed: 500,
		slidesToShow: 3,
		slidesToScroll: 3,
		infinite: false,
		responsive: [{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 2,
				infinite: true,
				dots: false
			}
		}, {
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		}, {
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}]
	});

	/* News Slider
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$('#news-slider').slick({
		dots: false,
		infinite: false,
		prevArrow: '.previous',
		nextArrow: '.next',
		speed: 500,
		slidesToShow: 1,
		slidesToScroll: 1,
		responsive: [{
			breakpoint: 1024,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				dots: false
			}
		}, {
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}, {
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}]
	});

	/* Fancybox
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(".fancybox").fancybox({
		maxWidth: 1200,
		maxHeight: 600,
		width: '70%',
		height: '70%',
	});

	/* Toggle sidebar
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$(this).toggleClass('active');
		});
	});

	/* Product slider 
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	// optional
	$('#blogCarousel').carousel({
		interval: 5000
	});
});

$(document).ready(function() {
	/* set session */
	var localStorage = window.localStorage;
	localStorage.setItem('login', 0);

	/* init user */
	var user = {
		id: '',
		name: '',
		email: '',
		role: ''
	};

	/* map api's */
	var apiURLs = {
		products: 'shop/api/product_read_all.php',
		contact: 'shop/api/contact_create.php',
		login: 'shop/api/login.php'
	}

	/* define requests */
	var getProducts = $.ajax({
		method: "GET",
		url: apiURLs.products
	})
	.done(function(resp) {
		// console.log(resp.result.products,'products')
		populateProducts(resp);
	});

	var postCredentials = function (params) {
		$.ajax({
			method: "POST",
			url: apiURLs.login,
			data: params
		})
		.done(function (resp) {
			resp.login === true ? loginSuccess(resp) : throwError();
		});
	};

	var postContact = function (params) {
		$.ajax({
			method: "POST",
			url: apiURLs.contact,
			data: params
		})
		.done(function (resp) {
			resp.created === true ? displaySuccess() : displayError()
		});
	};
	
	var categories = {
		'1': [],
		'2': [],
		'3': [],
		'4': [],
		'5': []
	};
	/*populate product list */
	var populateProducts = function(params) {
		for (var index = 0; index < params.result.products.length; index++) {
			categories[params.result.products[index].category_id].push(params.result.products[index]);
		};

		$($('div[data-cat-id]')).each(function() {
			var cat = $(this).attr('data-cat-id');
			$(this).find('span').text(`${categories[cat].length} colectii`)
		});
	};

	/* modal data */
	$('.item').on('click', function() {
		var catId = $(this).find('div[data-cat-id]').attr('data-cat-id');
		var catTitle = $(this).find('div[data-cat-id]').find('h3').text();

		$('.modal-title').text(catTitle);

		categories[catId].forEach(elem => {
			var content = `
				<div class='modal-item'>
    				<h3>${elem.name}</h3>
    				<p>${elem.description}</p>
    				<p>${elem.price} RON</p>
				</div>
			`;
			$('.modal-body').append(content);
		});
	});
	$(".modal").on("hidden.bs.modal", function(){
		$(".modal-body").empty();
	});

	/* login */
	if (parseInt(localStorage.login) === 1) {
		$('#connect').text('Delogheaza-te')
	} else {
		$('#connect').text('Conectare')
	}

	$('#connect').on('click', function() {
		$('#login_form').addClass('d-block');
	});

	$('#submit_credentials').on('click', function() {
		var credentials = {
			email: $('#email').val(),
			pwd: $('#pwd').val()
		};
		postCredentials(credentials);
	});

	var throwError = function() {
		$('#login_message').addClass('d-block');
	};

	var loginSuccess = function(params) {
		localStorage.setItem('login', 1);
		$('#login_message').removeClass('d-block');

		$.each( params.result, function( key, value ) {
			user[key] = value;
		});
		$('#connect').text('Delogheaza-te');
		$('#login_form').removeClass('d-block');
	};

	/* contact form */
	$('#send_message').on('click', function(ev) {
		ev.preventDefault();

		var messageData = {
			title: $('input[name=title]').val(),
			message: $('textarea[name=message]').val(),
			user_id: parseInt(localStorage.login) === 1 ? user.id : ''
		};
		postContact(messageData);

		$('input[name=title]').val('');
		$('textarea[name=message]').val('');
	});

	function displaySuccess() {
		$('.alert-success').addClass('d-block');
		setTimeout(() => {
			$('.alert-success').removeClass('d-block');
		}, 3000);
	}

	function displayError() {
		$('.alert-danger').addClass('d-block');
		setTimeout(() => {
			$('.alert-danger').removeClass('d-block');
		}, 3000);
	}
});