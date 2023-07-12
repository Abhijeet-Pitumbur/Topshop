// Abhijeet Pitumbur - Topshop 2023
(function ($) {
	"use strict";
	var $headerStick = $(".Sticky");
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 80) {
			$headerStick.addClass("sticky-element");
		} else {
			$headerStick.removeClass("sticky-element");
		}
	});
	$(window).resize(function () {
		if ($(window).width() >= 768) {
			$('a[href="#"]').on("click", function (event) {
				event.preventDefault();
			});
			$(".categories").addClass("menu");
			$(".menu ul > li").on("mouseover", function (event) {
				$(this).find("ul:first").show();
				$(this).find("> span a").addClass("active");
			}).on("mouseout", function (event) {
				$(this).find("ul:first").hide();
				$(this).find("> span a").removeClass("active");
			});
			$(".menu ul li li").on("mouseover", function (event) {
				if ($(this).has("ul")["length"]) {
					$(this).parent().addClass("expanded");
				}
				$(".menu ul:first", this).parent().find("> span a").addClass("active");
				$(".menu ul:first", this).show();
			}).on("mouseout", function (event) {
				$(this).parent().removeClass("expanded");
				$(".menu ul:first", this).parent().find("> span a").removeClass("active");
				$(".menu ul:first", this).hide();
			});
		} else {
			$(".categories").removeClass("menu");
		}
	}).resize();
	var $mobileMenu = $("#menu").mmenu({
		"extensions": ["pagedim-black"],
		counters: true,
		keyboardNavigation: {
			enable: true,
			enhance: true
		},
		navbar: {
			title: "MENU"
		},
		offCanvas: {
			pageSelector: "#page"
		},
		navbars: [{
			position: "bottom",
			content: ['<a href="#">Abhijeet Pitumbur &copy; Topshop 2023</a>']
		}]
	}, {
		clone: true,
		classNames: {
			fixedElements: {
				fixed: "menu-fixed"
			}
		}
	});
	$("a.open-close").on("click", function () {
		$(".main-menu").toggleClass("show");
		$(".layer").toggleClass("layer-is-visible");
	});
	$("a.show-submenu").on("click", function () {
		$(this).next().toggleClass("show-normal");
	});
	$("a.show-submenu-mega").on("click", function () {
		$(this).next().toggleClass("show-mega");
	});
	$("a.btn-search-mob").on("click", function () {
		$(".search-mob-wp").slideToggle("fast");
	});
	$(".prod-pics").owlCarousel({
		items: 1,
		loop: false,
		margin: 0,
		dots: true,
		lazyLoad: true,
		nav: false
	});
	$(".products-carousel").owlCarousel({
		center: false,
		items: 2,
		loop: false,
		margin: 10,
		dots: false,
		nav: true,
		lazyLoad: true,
		navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
		responsive: {
			0: {
				nav: false,
				dots: true,
				items: 2
			},
			560: {
				nav: false,
				dots: true,
				items: 3
			},
			768: {
				nav: false,
				dots: true,
				items: 4
			},
			1024: {
				items: 4
			},
			1200: {
				items: 4
			}
		}
	});
	$(".carousel-centered").owlCarousel({
		center: true,
		items: 2,
		loop: true,
		margin: 10,
		responsive: {
			0: {
				items: 1,
				dots: false
			},
			600: {
				items: 2
			},
			1000: {
				items: 4
			}
		}
	});
	$("#brands").owlCarousel({
		autoplay: true,
		items: 2,
		loop: true,
		margin: 10,
		dots: false,
		nav: false,
		lazyLoad: true,
		autoplayTimeout: 3000,
		responsive: {
			0: {
				items: 3
			},
			767: {
				items: 4
			},
			1000: {
				items: 6
			},
			1300: {
				items: 8
			}
		}
	});
	$("[data-countdown]").each(function () {
		var $this = $(this);
		var finalDate = $(this).data("countdown");
		$this.countdown(finalDate, function (event) {
			$this.html(event.strftime("%DD %H:%M:%S"));
		});
	});
	var lazyloadInstance = new LazyLoad({
		elementsSelector: ".lazy"
	});
	$(".custom-select-form select").niceSelect();
	$(".color").on("click", function () {
		$(".color").removeClass("active");
		$(this).addClass("active");
	});
	$(".numbers-row").append('<div class="inc button-inc">+</div><div class="dec button-inc">-</div>');
	$(".button-inc").on("click", function () {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		var newValue = 0;
		if ($button.text() == "+") {
			if (oldValue < 999) {
				newValue = parseFloat(oldValue) + 1;
			} else {
				newValue = 999;
			}
		} else {
			if (oldValue > 1) {
				newValue = parseFloat(oldValue) - 1;
			} else {
				newValue = 1;
			}
		}
		$button.parent().find("input").val(newValue);
		$button.parent().find("input").change();
	});
	$(".dropdown-cart, .dropdown-access").hover(function () {
		$(this).find(".dropdown-menu").stop(true, true).delay(50).fadeIn(300);
	}, function () {
		$(this).find(".dropdown-menu").stop(true, true).delay(50).fadeOut(300);
	});
	$(window).bind("load resize", function () {
		var width = $(window).width();
		if (width <= 768) {
			$("a.cart-bt, a.access-link").removeAttr("data-toggle", "dropdown");
		} else {
			$("a.cart-bt,a.access-link").attr("data-toggle", "dropdown");
		}
	});
	$(".opacity-mask").each(function () {
		$(this).css("background-color", $(this).attr("data-opacity-mask"));
	});
	new WOW().init();
	$("#forgot").on("click", function () {
		$("#forgotPassword").fadeToggle("fast");
	});
	$("#forgotBack").on("click", function () {
		$("#forgotPassword").fadeToggle("fast");
	});
	var $topPanel = $(".top-panel");
	var $panelMask = $(".layer");
	$("a.search-panel").on("click", function () {
		$topPanel.addClass("show");
		$panelMask.addClass("layer-is-visible");
	});
	$("a.close-top-panel-btn").on("click", function () {
		$topPanel.removeClass("show");
		$panelMask.removeClass("layer-is-visible");
	});
	var $headingFooter = $("footer h3");
	$(window).resize(function () {
		if ($(window).width() <= 768) {
			$headingFooter.attr("data-bs-toggle", "collapse");
		} else {
			$headingFooter.removeAttr("data-bs-toggle", "collapse");
		}
	}).resize();
	$headingFooter.on("click", function () {
		$(this).toggleClass("opened");
	});
	if ($(window).width() >= 1024) {
		$("footer.revealed").footerReveal({
			shadow: false,
			opacity: 0.6,
			zIndex: 1
		});
	}
	var pixelShow = 800;
	var scrollSpeed = 100;
	$(window).scroll(function () {
		if ($(window).scrollTop() >= pixelShow) {
			$("#btn-to-top").addClass("visible");
		} else {
			$("#btn-to-top").removeClass("visible");
		}
	});
	$("#btn-to-top").on("click", function () {
		$("html, body").animate({
			scrollTop: 0
		}, scrollSpeed);
		return false;
	});
	var tooltips = []["slice"].call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	var bootstrapTooltips = tooltips.map(function (data) {
		return new bootstrap.Tooltip(data);
	});
	$("#sign-in").magnificPopup({
		type: "inline",
		fixedContentPos: true,
		fixedBgPos: true,
		overflowY: "auto",
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		closeMarkup: '<button title="%title%" type="button" class="mfp-close"></button>',
		mainClass: "my-mfp-zoom-in"
	});
	$(".magnific-gallery").each(function () {
		$(this).magnificPopup({
			delegate: "a",
			type: "image",
			preloader: true,
			gallery: {
				enabled: true
			},
			removalDelay: 500,
			callbacks: {
				beforeOpen: function () {
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
					this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			closeOnContentClick: true,
			midClick: true
		});
	});
	setTimeout(function () {
		$(".popup-wrapper").css({
			"opacity": "1",
			"visibility": "visible"
		});
		$(".popup-close").on("click", function () {
			$(".popup-wrapper").fadeOut(300);
		});
	}, 1500);
})(window.jQuery);
$(document).ready(function () {
	document.getElementById("query").focus();
	$("#signIn").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/sign-in",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data == "sign-in-success") {
					window.location.href = "index";
				} else if (data == "checkout-sign-in-success") {
					window.location.href = "checkout";
				} else if (data == "inactive-sign-in-success") {
					window.location.href = "account-created";
				} else {
					$("#signInMsg").html(data);
				}
			}
		})
	})
	$("#signUp").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/sign-up",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data == "sign-up-success") {
					window.location.href = "account-created";
				} else {
					$("#signUpMsg").html(data);
				}
			}
		})
	})
	$("#searchProducts").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/search",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data !== "") {
					window.location.href = "search?query=" + data;
				}
			}
		})
	})
	$("#updateCart").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/update-cart",
			method: "POST",
			dataType: "json",
			data: $(this).serialize(),
			success: function (data) {
				if (data.outputMsg == "add-to-cart-success") {
					document.getElementById("addToCartPanel").classList.add("show");
					document.getElementById("layer").classList.add("layer-is-visible");
					document.getElementById("updateCartType").value = "removeFromCart";
					var updateCartBtn = document.getElementById("updateCartBtn");
					updateCartBtn.classList.add("outline");
					updateCartBtn.value = "Added to Cart";
					updateCartBtn.setAttribute("onmouseover", "removeFromCartText(this)");
					updateCartBtn.setAttribute("onmouseout", "addedToCartText(this)");
					$("#updateCartMsg").html("");
					if (data.numCartItems > 99) {
						$("#headerCartNumItems").html("<strong>99</strong>");
					} else if (data.numCartItems > 0) {
						$("#headerCartNumItems").html("<strong>" + data.numCartItems + "</strong>");
					}
				} else if (data.outputMsg == "remove-from-cart-success") {
					document.getElementById("updateCartType").value = "addToCart";
					var updateCartBtn = document.getElementById("updateCartBtn");
					updateCartBtn.classList.remove("outline");
					updateCartBtn.value = "Add to Cart";
					updateCartBtn.removeAttribute("onmouseover");
					updateCartBtn.removeAttribute("onmouseout");
					$("#updateCartMsg").html('<h6 class="text-error">Removed from cart</h6>');
					if (data.numCartItems > 99) {
						$("#headerCartNumItems").html("<strong>99</strong>");
					} else if (data.numCartItems > 0) {
						$("#headerCartNumItems").html("<strong>" + data.numCartItems + "</strong>");
					} else if (data.numCartItems == 0) {
						$("#headerCartNumItems").html("");
					}
				} else {
					$("#updateCartMsg").html(data.outputMsg);
				}
			}
		})
	})
	$("#quantity").on("change", function (event) {
		event.preventDefault();
		if (document.getElementById("updateCartType").value == "removeFromCart") {
			document.getElementById("updateCartType").value = "updateCartQuantity";
			$.ajax({
				url: "functions/update-cart",
				method: "POST",
				dataType: "json",
				data: $("#updateCart").serialize(),
				success: function (data) {
					document.getElementById("updateCartType").value = "removeFromCart";
					$("#updateCartMsg").html(data.outputMsg);
				}
			})
		} else {
			$("#updateCartMsg").html("");
		}
	})
	$("#applyCoupon").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/apply-coupon",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data == "apply-coupon-success") {
					window.location.href = "cart";
				} else {
					$("#applyCouponMsg").html(data);
				}
			}
		})
	})
	$("#confirmCheckout").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/confirm-checkout",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data == "paypal-checkout") {
					document.getElementById("paypalForm").submit();
				} else if ((data == "card-checkout-success") || (data == "checkout-success")) {
					window.location.href = "order-placed";
				} else {
					$("#confirmCheckoutMsg").html(data);
				}
			}
		})
	})
	$("#editAccount").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/edit-account",
			method: "POST",
			dataType: "json",
			data: $(this).serialize(),
			success: function (data) {
				$("#editAccountMsg").html(data.outputMsg);
				$("#dashboardName").html("Hello, " + data.firstName + "!");
				$("#searchProducts").html('<input type="text" class="form-control" name="query" id="query" placeholder="Hi, ' + data.firstName + '! What are you looking for?"> <button type="submit"><i class="header-icon-search-custom"></i></button>');
				$("#dropdownName").html('<h6>Hi, ' + data.firstName + '!</h6> <p>' + data.email + '</p>');
				$("#currentName").html(data.currentName);
				$("#currentAddress").html(data.currentAddress);
				$("#currentPhone").html(data.currentPhone);
			}
		})
	})
	$("#changePassword").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/change-password",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				$("#changePasswordMsg").html(data);
			}
		})
	})
	$("#forgotPassword").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/forgot-password",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data == "forgot-password-success") {
					window.location.href = "reset-requested";
				} else {
					$("#forgotPasswordMsg").html(data);
				}
			}
		})
	})
	$("#resetPassword").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/new-password",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data == "reset-password-success") {
					window.location.href = "password-reset";
				} else {
					$("#resetPasswordMsg").html(data);
				}
			}
		})
	})
	$("#adminSignIn").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/admin-sign-in",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data == "admin-sign-in-success") {
					window.location.href = "administrator/dashboard";
				} else {
					$("#adminSignInMsg").html(data);
				}
			}
		})
	})
	$("#submitMessage").on("submit", function (event) {
		event.preventDefault();
		document.getElementById("submitMessageIcon").innerHTML = '<i class="ti-timer"></i>';
		$.ajax({
			url: "functions/submit-message",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data == "submit-message-success") {
					document.getElementById("submitMessage").reset();
					$("#submitMessageMsg").html('<h6 class="text-success">Message sent</h6>');
				} else {
					$("#submitMessageMsg").html(data);
				}
				document.getElementById("submitMessageIcon").innerHTML = "Submit Message";
			}
		})
	})
	$("#searchProductsMobile").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url: "functions/search",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data !== "") {
					window.location.href = "search?query=" + data;
				}
			}
		})
	})
	$("#subscribeNewsletter").on("submit", function (event) {
		event.preventDefault();
		var subscribeNewsletterBtn = document.getElementById("subscribeNewsletterIcon");
		subscribeNewsletterBtn.classList.remove("ti-angle-double-right");
		subscribeNewsletterBtn.classList.add("ti-timer");
		$.ajax({
			url: "functions/subscribe-newsletter",
			method: "POST",
			data: $(this).serialize(),
			success: function (data) {
				if (data == "subscribe-newsletter-success") {
					document.getElementById("subscribeNewsletter").reset();
					$("#subscribeNewsletterMsg").html('Thank you for subscribing!');
				} else if (data == "already-subscribed") {
					document.getElementById("subscribeNewsletter").reset();
					$("#subscribeNewsletterMsg").html('You are already subscribed!');
				} else {
					$("#subscribeNewsletterMsg").html(data);
				}
				subscribeNewsletterBtn.classList.remove("ti-timer");
				subscribeNewsletterBtn.classList.add("ti-angle-double-right");
			}
		})
	})
})