/* HP Trading - Transport – JS nhẹ: menu mobile, đổ bóng header khi cuộn, khởi tạo AOS. */
(function () {
	'use strict';

	// Menu mobile & Accordion Sub-menu (Chuẩn design-taste-frontend)
	var toggle = document.getElementById('menu-toggle');
	var menu = document.getElementById('mobile-menu');
	if (toggle && menu) {
		var openIcon = toggle.querySelector('[data-icon-open]');
		var closeIcon = toggle.querySelector('[data-icon-close]');

		toggle.addEventListener('click', function () {
			var expanded = toggle.getAttribute('aria-expanded') === 'true';
			var willOpen = !expanded;
			toggle.setAttribute('aria-expanded', String(willOpen));
			toggle.setAttribute('aria-label', willOpen ? (toggle.dataset.labelClose || 'Đóng menu') : (toggle.dataset.labelOpen || 'Mở menu'));
			menu.classList.toggle('hidden', !willOpen);
			document.body.classList.toggle('anp-menu-open', willOpen);
			if (openIcon && closeIcon) {
				openIcon.classList.toggle('hidden', willOpen);
				closeIcon.classList.toggle('hidden', !willOpen);
			}
		});

		// Accordion cho các mục có cấp con (.menu-item-has-children) trong mobile menu
		var hasChildrenItems = menu.querySelectorAll('.menu-item-has-children');
		hasChildrenItems.forEach(function (item) {
			var link = item.querySelector(':scope > a');
			var subMenu = item.querySelector(':scope > .sub-menu');
			if (!subMenu) return;

			var subToggle = document.createElement('button');
			subToggle.type = 'button';
			subToggle.className = 'anp-sub-toggle';
			subToggle.setAttribute('aria-expanded', 'false');
			subToggle.setAttribute('aria-label', 'Mở danh mục con');
			subToggle.innerHTML = '<svg class="h-4 w-4 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>';

			var toggleSub = function (e) {
				if (e) {
					e.preventDefault();
					e.stopPropagation();
				}
				var isOpen = item.classList.toggle('is-open');
				subToggle.setAttribute('aria-expanded', String(isOpen));
			};

			subToggle.addEventListener('click', toggleSub);

			if (link) {
				link.insertAdjacentElement('afterend', subToggle);
				link.addEventListener('click', function (e) {
					var href = link.getAttribute('href') || '';
					if (href.indexOf('#') !== -1 || href === '#' || href === '') {
						e.preventDefault();
						toggleSub(e);
					}
				});
			} else {
				item.insertBefore(subToggle, subMenu);
			}
		});

		// Chạm vào liên kết đích thì đóng menu (không đóng khi bấm vào mục cha có cấp con)
		menu.querySelectorAll('a').forEach(function (a) {
			a.addEventListener('click', function () {
				var parentLi = a.closest('.menu-item-has-children');
				if (parentLi && a.parentElement === parentLi) {
					var href = a.getAttribute('href') || '';
					if (href.indexOf('#') !== -1 || href === '#' || href === '') {
						return;
					}
				}
				if (toggle.getAttribute('aria-expanded') === 'true') {
					toggle.click();
				}
			});
		});

		// Tự động đóng drawer và giải phóng scroll khi kéo rộng màn hình lên desktop
		window.addEventListener('resize', function () {
			if (window.innerWidth >= 1024 && toggle.getAttribute('aria-expanded') === 'true') {
				toggle.click();
			}
		}, { passive: true });
	}

	// Đổ bóng header khi cuộn
	var header = document.getElementById('site-header');
	if (header) {
		// Co gọn header: cuộn xuống thì ẩn thanh trên cùng, chỉ giữ thanh menu chính.
		// Hai ngưỡng khác nhau (80px khi cuộn xuống, 24px khi cuộn lên) để không bị nhấp nháy.
		var shrunk = false;
		var onScroll = function () {
			var y = window.scrollY || window.pageYOffset;
			if (!shrunk && y > 80) {
				shrunk = true;
				header.classList.add('is-scrolled');
			} else if (shrunk && y < 24) {
				shrunk = false;
				header.classList.remove('is-scrolled');
			}
		};
		window.addEventListener('scroll', onScroll, { passive: true });
		onScroll();
	}

	// Hiệu ứng xuất hiện khi cuộn (tôn trọng giảm chuyển động)
	var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	// Reveal Observer (Zero-dependency Native Animation Engine)
	var revealElements = document.querySelectorAll('.reveal-up, .reveal-down, .reveal-left, .reveal-right, .reveal-scale, .reveal-fade');
	if (revealElements.length) {
		if (!reduce && 'IntersectionObserver' in window) {
			var revealObserver = new IntersectionObserver(function (entries, obs) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-revealed');
						obs.unobserve(entry.target);
					}
				});
			}, {
				threshold: 0.12,
				rootMargin: '0px 0px -40px 0px'
			});

			revealElements.forEach(function (el) {
				revealObserver.observe(el);
			});
		} else {
			revealElements.forEach(function (el) {
				el.classList.add('is-revealed');
			});
		}
	}

	// Counter số đếm (chạy mượt khi phần tử cuộn vào màn hình)
	var counters = document.querySelectorAll('[data-counter]');
	if (counters.length && !reduce) {
		var easeOutExpo = function (t) {
			return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
		};

		var animateCounter = function (el) {
			var text = el.getAttribute('data-counter-value') || el.innerText.trim();
			var match = text.match(/^([^\d]*)(\d[\d,\.]*)(.*)$/);
			if (!match) return;

			var prefix = match[1] || '';
			var numStr = match[2].replace(/,/g, '');
			var suffix = match[3] || '';
			var target = parseFloat(numStr);
			if (isNaN(target)) return;

			var start = target > 1900 && target < 2100 ? target - 50 : 0;
			var duration = 1600;
			var startTime = null;

			var step = function (timestamp) {
				if (!startTime) startTime = timestamp;
				var progress = Math.min((timestamp - startTime) / duration, 1);
				var current = Math.floor(start + (target - start) * easeOutExpo(progress));
				el.innerText = prefix + current + suffix;
				if (progress < 1) {
					requestAnimationFrame(step);
				} else {
					el.innerText = text;
				}
			};

			requestAnimationFrame(step);
		};

		if ('IntersectionObserver' in window) {
			var observer = new IntersectionObserver(function (entries, obs) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						animateCounter(entry.target);
						obs.unobserve(entry.target);
					}
				});
			}, { threshold: 0.3 });

			counters.forEach(function (el) {
				observer.observe(el);
			});
		} else {
			counters.forEach(animateCounter);
		}
	}

	// Hero Ambient Slider & Timeline Progress Engine
	var heroSection = document.getElementById('hero-section');
	var heroSlider = document.getElementById('hero-slider');
	if (heroSection && heroSlider) {
		var slides = heroSlider.querySelectorAll('.anp-hero-slide');
		var buttons = heroSection.querySelectorAll('.hero-progress-btn');
		var totalSlides = slides.length;
		if (totalSlides > 1) {
			var currentIndex = 0;
			var duration = parseInt(heroSlider.getAttribute('data-interval'), 10) || 5000;
			var startTime = null;

			var updateUI = function (index) {
				slides.forEach(function (slide, i) {
					if (i === index) {
						slide.classList.add('is-active');
					} else {
						slide.classList.remove('is-active');
					}
				});

				buttons.forEach(function (btn, i) {
					var bar = btn.querySelector('.hero-progress-bar');
					if (i === index) {
						btn.classList.add('is-active');
						btn.setAttribute('aria-selected', 'true');
					} else {
						btn.classList.remove('is-active');
						btn.setAttribute('aria-selected', 'false');
						if (bar) bar.style.width = i < index ? '100%' : '0%';
					}
				});
			};

			var setSlide = function (newIndex) {
				currentIndex = (newIndex + totalSlides) % totalSlides;
				updateUI(currentIndex);
				startTime = performance.now();
			};

			var tick = function (now) {
				if (!reduce && !document.hidden) {
					if (!startTime) startTime = now;
					var elapsed = now - startTime;
					var progress = Math.min(elapsed / duration, 1);
					var activeBar = buttons[currentIndex] ? buttons[currentIndex].querySelector('.hero-progress-bar') : null;
					if (activeBar) {
						activeBar.style.width = (progress * 100) + '%';
					}

					if (progress >= 1) {
						setSlide(currentIndex + 1);
					}
				} else {
					startTime = now;
				}
				requestAnimationFrame(tick);
			};

			// Xử lý sự kiện click vào bullet/segment để chuyển slide ngay lập tức
			buttons.forEach(function (btn) {
				btn.addEventListener('click', function (e) {
					e.preventDefault();
					var targetIdx = parseInt(btn.getAttribute('data-slide-target'), 10);
					if (!isNaN(targetIdx)) {
						setSlide(targetIdx);
					}
				});
			});

			updateUI(0);
			if (!reduce) {
				requestAnimationFrame(tick);
			}
		}
	}
})();
