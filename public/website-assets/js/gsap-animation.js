gsap.registerPlugin(ScrollTrigger, SplitText);
gsap.config({
    nullTargetWarn: false,
    trialWarn: false
});
/*----  Functions  ----*/

function getpercentage(x, y, elm) { 
    elm.find('.pbmit-fid-inner').html(y + '/' + x);
    var cal = Math.round((y * 100) / x);
    return cal;
}

function pbmit_title_animation() {

	ScrollTrigger.matchMedia({
		"(min-width: 991px)": function() {

		var pbmit_var = jQuery('.pbmit-heading, .pbmit-heading-subheading');
		if (!pbmit_var.length) {
			return;
		}
		const quotes = document.querySelectorAll(".pbmit-heading-subheading .pbmit-title, .pbmit-heading .pbmit-title");

			quotes.forEach(quote => {

				//Reset if needed
				if (quote.animation) {
					quote.animation.progress(1).kill();
					quote.split.revert();
				}

				var getclass = quote.closest('.pbmit-heading-subheading, .pbmit-heading').className;
				var animation = getclass.split('animation-');
				if (animation[1] == "style4") return

				quote.split = new SplitText(quote, {
					type: "lines,words,chars",
					linesClass: "split-line"
				});
				gsap.set(quote, { perspective: 400 });

				if (animation[1] == "style1") {
					gsap.set(quote.split.chars, {
						opacity: 0,
						y: "90%",
						rotateX: "-40deg"
					});
				}
				if (animation[1] == "style2") {
					gsap.set(quote.split.chars, {
						opacity: 0,
						x: "50"
					});
				}
				if (animation[1] == "style3") {
					gsap.set(quote.split.chars, {
						opacity: 0,
					});
				}
				quote.animation = gsap.to(quote.split.chars, {
					scrollTrigger: {
						trigger: quote,
						start: "top 90%",
					},
					x: "0",
					y: "0",
					rotateX: "0",
					opacity: 1,
					duration: 1,
					ease: Back.easeOut,
					stagger: .02
				});
			});
		},
	});
}

function pbmit_extend_section() {
	const pbmit_elm = gsap.utils.toArray('.pbmit-extend-animation');
	if (pbmit_elm.length == 0) return	
	ScrollTrigger.matchMedia({
		"(min-width: 1200px)": function() {
			 
			pbmit_elm.forEach(section => {
				let tl = gsap.timeline({
					scrollTrigger: {
						trigger: section,
						start: "top 50%",
						end: "+=400px",
						scrub: 1
					},
					defaults: { ease: "none" }
				});
				tl.fromTo(section, { clipPath: 'inset(0% 5% 0% 5% round 30px)' }, { clipPath: 'inset(0% 0% 0% 0% round 0px)', duration: 1.5 })	
			});			 
		}
	});
}

function pbmit_sticky_special() {	 
	
	if (jQuery('.pbmit-sticky-col2-special').hasClass('.elementor-element-edit-mode')) {
		return;
	}
	ScrollTrigger.matchMedia({
		"(min-width: 1024px)": function() { 
			let pbmit_sticky_2 = jQuery(".pbmit-sticky-col2-special");
			let section = jQuery('.pbmit-sticky-special'); 
			let section_height = pbmit_sticky_2.height();
			const tweenOne = gsap.to(pbmit_sticky_2, {
				y: - (section_height - 600),
				scrollTrigger: {
				  trigger: section,
				  pin: section,
				  scrub: true,
				  start: "top top+=140px",
				  end: () => '+=' + (section_height - 600),
				}
			}); 
		},
		"(max-width:1024px)": function() {
			ScrollTrigger.getAll().forEach(section => section.kill(true));
		}
	}); 
}

function pbmit_sticky() {

	ScrollTrigger.matchMedia({
		"(min-width: 1200px)": function() {
			let pbmit_sticky_container = jQuery(".pbmit-sticky-col");
			let section = pbmit_sticky_container.closest('section');
			if (!section[0]) {
				section = pbmit_sticky_container.closest('.pbmit-sticky-section');
			} 
			let tl = gsap.timeline({
				scrollTrigger: {
					pin: pbmit_sticky_container,
					scrub: 1,
					start: "top top", 
					trigger: section,
					end: () => "+=" + ((section.height() + 250) - window.innerHeight), 
					invalidateOnRefresh: true
				},
				defaults: { ease: "none", duration: 1 }
			});
		},
	}); 
}

function pbmit_img_animation() {
	const boxes = gsap.utils.toArray('.pbmit-animation-style1,.pbmit-animation-style2,.pbmit-animation-style3,.pbmit-animation-style4,.pbmit-animation-style5,.pbmit-animation-style6,.pbmit-animation-style7');
	boxes.forEach(img => {
		gsap.to(img, {
			scrollTrigger: {
				trigger: img,
				start: "top 70%",
				end: "bottom bottom",
				toggleClass: "active",
				once: true,
			}
		});
	});
}

function pbmit_staticbox_hover() {
	var pbmit_var = jQuery('.pbmit-element-static-box-style-1, .pbmit-element-service-style-5, .pbmit-element-service-style-7');
	if (!pbmit_var.length) {
		return;
	}
	pbmit_var.each(function() {
		var pbmit_Class = '.pbmit-element-posts-wrapper > .pbmit-ele-static-box, .swiper-hover-slide-nav .pbmit-hover-inner li, article.pbmit-service-style-7';
		jQuery(this)
			.find(pbmit_Class).first()
			.addClass('pbmit-active');
		jQuery(this)
			.find(pbmit_Class)
			.on('mouseover', function() {
				jQuery(this).addClass('pbmit-active').siblings().removeClass('pbmit-active');
			});
	});
}

var pbmit_hover_slide = function() {

	if (typeof Swiper !== 'undefined') {

		var pbmit_hover1 = new Swiper(".pbmit-hover-image", {
			grabCursor: true,
			allowTouchMove: false,
			effect: 'fade',
			mousewheel: true,
			slidesPerView: 1,
			spaceBetween: 0,
			speed: 800,
		});
		jQuery('.pbmit-main-hover-slider li').hover(function(e) {
			e.preventDefault();
			var myindex = jQuery(this).index();
			pbmit_hover1.slideTo(myindex, 500, false);
		});
	}
}

function pbmit_tween_effect() {

	const pbmit_tween = gsap.utils.toArray('.pbmit-tween-effect');
	if (pbmit_tween.length == 0) return

	ScrollTrigger.matchMedia({
		"(min-width: 768px)": function() {

			pbmit_tween.forEach((box, i) => {
				let tl = gsap.timeline({
					scrollTrigger: {
						trigger: box,
						start: "top 90%",
						end: "bottom 70%",
						scrub: 1
					},
					defaults: { ease: "none" }
				});

				let xpos_val = box.getAttribute('data-x-start');
				let xpose_val = box.getAttribute('data-x-end');
				let ypos_val = box.getAttribute('data-y-start');
				let ypose_val = box.getAttribute('data-y-end');

				let scale_x_val = box.getAttribute('data-scale-x-start');
				let scale_xe_val = box.getAttribute('data-scale-x-end');

				let skew_x_val = box.getAttribute('data-skew-x-start');
				let skew_xe_val = box.getAttribute('data-skew-x-end');
				let skew_y_val = box.getAttribute('data-skew-y-start');
				let skew_ey_val = box.getAttribute('data-skew-y-end');

				let rotation_x_val = box.getAttribute('data-rotate-x-start');
				let rotation_xe_val = box.getAttribute('data-rotate-x-end');
				gsap.set(box, { xPercent: xpos_val, yPercent: ypos_val, scale: scale_x_val, skewX: skew_x_val, skewY: skew_y_val, rotation: rotation_x_val });
				tl.to(box, { xPercent: xpose_val, yPercent: ypose_val, scale: scale_xe_val, skewX: skew_xe_val, skewY: skew_ey_val, rotation: rotation_xe_val })
			});
		},
	});
}

function pbmit_mousehover_tooltip() {

	jQuery("<div id='pbmit-portfolio-cursor'><div class='pbmit-tooltip-content pbminfotech-box-content'></div></div>").appendTo("body");

	var pbmit_text = jQuery('.pbmit-element-portfolio-style-3 .pbminfotech-post-content');
	var pbmit_cursor = jQuery("#pbmit-portfolio-cursor");

	jQuery(document).on('mousemove', function(e) {
		var pbmit_x = e.clientX;
		var pbmit_y = e.clientY;
		pbmit_cursor.css({ "transform": "translate3d(" + pbmit_x + "px, " + pbmit_y + "px, 0px)" });
	})
	tooltiprecall();
}

function tooltiprecall(){
	var pbmit_text = jQuery('.pbmit-element-portfolio-style-3 .pbminfotech-post-content');
	var pbmit_cursor = jQuery("#pbmit-portfolio-cursor");
 
	if (pbmit_text.length) {
		pbmit_text.each(function() {
			var elm = jQuery(this);
			var pbmit_html = elm.find('.pbminfotech-box-content').html();
			elm.on('mouseenter', function() {
				pbmit_cursor.addClass('active').find('.pbmit-tooltip-content').html(pbmit_html);
			}).on('mouseleave', function(e) {
				pbmit_cursor.removeClass('active').find('.pbmit-tooltip-content').html('');
			});
		});
	}
}

function pbmit_set_tooltip() {
    $('[data-cursor-tooltip]').each(function() {
        var thisele = $(this);
        var thisele_html = thisele.find('.pbminfotech-box-content').html();
        thisele.attr("data-cursor-tooltip", thisele_html);
    });
}



ScrollTrigger.matchMedia({
    "(max-width: 1200px)": function() {
        ScrollTrigger.getAll().forEach(t => t.kill());
    }
});

// on ready
jQuery(document).ready(function() {
	pbmit_title_animation();
	pbmit_staticbox_hover();
});

// on resize
jQuery(window).resize(function() {
	pbmit_title_animation();
	pbmit_img_animation();
	pbmit_mousehover_tooltip();
});

// on load
jQuery(window).on('load', function(){
    pbmit_extend_section();
	pbmit_sticky_special();
	pbmit_sticky();
	pbmit_img_animation();
	pbmit_hover_slide();
	pbmit_tween_effect();
	pbmit_mousehover_tooltip();
	pbmit_set_tooltip();
	
	jQuery('[data-magnetic]').each(function() { new Magnetic(this); });
	gsap.delayedCall(1, () =>
		ScrollTrigger.getAll().forEach((t) => {
			t.refresh();
		})
	);	
	
	setTimeout(cleaning, 500);
	function cleaning(){
		ScrollTrigger.refresh(); 
	}
});