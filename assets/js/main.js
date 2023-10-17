$(document).ready(function() {

	// lazy load 
	$('.lazy_bag').lazy({
      effect: "fadeIn",
      effectTime: 300,
      threshold: 0
	})
	$('.lazy_img').lazy({
      effect: "fadeIn",
      effectTime: 300,
      threshold: 0
	})
	$('.lazy_img2').lazy({
      effect: "fadeIn",
      effectTime: 500,
      threshold: 0
	})


	// 
	setTimeout(function() {
		$('.preloader').animate({
			opacity : 0
		}, 500, function () {
			$(this).css('display', 'none')
		})
	}, 500)


	// 
	$('.menu_pj').click(function(){$('.menu_ph').addClass('menu_ph_act')})
	$('.menu_ph_ic').click(function(){$('.menu_ph').removeClass('menu_ph_act')})
	$('.mp_di a').click(function(){$('.menu_ph').removeClass('menu_ph_act')})


	// 
	let scroll = $(window).scrollTop();
	if (scroll > 80) {
		$('.header').addClass('header_fix');
   } else {
    	$('.header').removeClass('header_fix');
   }
	$(window).scroll(function() {
    	scroll = $(window).scrollTop();
		if (scroll > 80) {
			$('.header').addClass('header_fix');
	   } else {
	    	$('.header').removeClass('header_fix');
	   }
	})






	// mask form
	$('.fr_phone').mask('8 (000) 000-00-00');
	$('.fr_phone2').mask('0 (000) 000-00-00');
	$('.fr_code').mask('0000');
	$('.fr_age').mask('00');
	$('.fr_price').mask('# ##0 тг', {reverse: true});
	$('.fr_number').mask('# ##0', {reverse: true});
	$('.fr_number2').mask('#0', {reverse: true});
	$('.fr_number3').mask('# ##0 шт', {reverse: true});


	// form - input
	$('input').on('input', function(){
		if ($(this).attr('type') == 'tel') {
			in_rez = $(this).val().replace(/ /g, '').replace(/\+/g, '').replace(/\)/g, '').replace(/\(/g, '').replace(/-/g, '').replace(/_/g, '')
			if (in_rez.length < $(this).attr('data-lenght')) {
				$(this).attr('data-pr', 0)
			} else {
				$(this).attr('data-pr', 1)
				$(this).attr('data-val', in_rez)
			}
		} else {
			if ($(this).val().length < $(this).attr('data-lenght')) {
				$(this).attr('data-pr', 0)
			} else {
				$(this).attr('data-pr', '1')
				$(this).attr('data-val', $(this).val())
			}
		}
	})



	$('.zabr_back').click(function(){
		$('.zabr_nom').removeClass('zabr_nom_act')
	})
	$('.disb_zab').click(function() {
		$('.zabr_nom').addClass('zabr_nom_act')
	})

	$('.orderSend').on('click', function() {

		var name = $(this).parent().siblings().children('.name')
		var phone = $(this).parent().siblings().children('.phone')

		if (name.attr('data-pr') != 1 || phone.attr('data-pr') != 1) mess('Введите свой данный')
		else {
			$.ajax({
				url: "/config/send.php?mess",
				type: "POST",
				dataType: "html",
				data: ({name: name.val(), phone: phone.val()}),
				beforeSend: function(){ mess('Отправка..') },
				error: function(data){ console.log(data) },
				success: function(data){
					if (data == 'yes') { 
						mess('Успешно отправлено')
						phone.val('')
						phone.attr('data-pr', 0)
						name.val('')
						name.attr('data-pr', 0)
					} else {
						mess('Пожалуйста, перезагрузите сайт <br>и попробуйте еще раз')
						console.log(data);
					}
				},
			})
		}
	})


	// function
	function mess(e) {
		$('.bl_mess').addClass('bl_mess_zak')
		$('.bl_mess_sam').html(e)

		setTimeout(function(){
			$('.bl_mess').removeClass('bl_mess_zak')
		}, 3000)
	}
	$('.bl_mess').on('click', function() {
		$(this).removeClass('bl_mess_zak')
	})








	// 
	function nav_top(sum) {
	    $('body,html').animate({
	        scrollTop: sum
	    }, 1000);
	}
	$('.clc_top').click(function () {
		$('body,html').animate({
	        scrollTop: 0
	    }, 1000);
	})



	
	// var page_swiper = new Swiper('.page_swiper', {
	//   speed: 500,
	//   slidesPerView: 1,
	//   loop: true,
	//   autoplay: {
	//     delay: 5000,
	//   },
	//   pagination: {
	//     el: '.swiper-pagination',
	//     clickable: true,
	//   },
	//   navigation: {
	//     nextEl: '.swiper-button-next',
	//     prevEl: '.swiper-button-prev',
	//   },
	// });

	var galleryThumbs = new Swiper('.gallery-thumbs', {
      slidesPerView: 'auto',
      loop: true,
      freeMode: true,
      loopedSlides: 5,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
   	centeredSlides: true,
      on: {
	   	slideChange: function () {
	      	$('.lazy_img').lazy({
			      effect: "fadeIn",
			      effectTime: 300,
			      threshold: 0
		   	})
	    	},
	  	},
   })
   var galleryTop = new Swiper('.gallery-top', {
      loop: true,
      loopedSlides: 5,
   	centeredSlides: true,
   	effect: 'fade',
   	fadeEffect: {
    		crossFade: true
  		},
      navigation: {
      	nextEl: '.gallery-top-next',
      	prevEl: '.gallery-top-prev',
      },
      thumbs:{swiper:galleryThumbs},
      on: {
	   	slideChange: function () {
	      	$('.lazy_img').lazy({
			      effect: "fadeIn",
			      effectTime: 300,
			      threshold: 0
		   	})
	    	},
	  	},
   })




	var bl5_con = new Swiper('.bl5_con', {
      slidesPerView: 'auto',
      spaceBetween: 30,
    //   navigation: {
    //     nextEl: '.bl5_next',
    //     prevEl: '.bl5_prev',
    //   },
      on: {
	   	slideChange: function () {
	      	$('.lazy_img2').lazy({
			      effect: "fadeIn",
			      effectTime: 500,
			      threshold: 0
		   	})
	    	},
	  	},
	  	breakpoints: {
        	0:{spaceBetween:0},
        	501:{spaceBetween:30}
    	}
   });






	// 
	$('.rrr_zab').click(function() {
		$('.rrr_nom').addClass('rrr_nom_act')
		imgsw = '/assets/uploads/' + $(this).attr('data-img')
		$('.rrr_nom img').attr('src', imgsw)
	})
	$('.rrr_back').click(function(){
		$('.rrr_nom').removeClass('rrr_nom_act')
	})







})