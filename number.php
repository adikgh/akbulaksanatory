	<!--  -->
	<div class="blnm" >
		<div class="bl_c">
			<div class="head_c">
				<h2>Номера</h2>
			</div>
			<div class="blnm_c">

				<div class="swiper sana_bl1b">
					<div class="swiper-wrapper">
						<? $number = db::query("select * from `bibi_number` order by number asc"); ?>
						<? while($number_d = mysqli_fetch_array($number)): ?>
							<div class="swiper-slide sana_bl1b_i"><?=$number_d['type']?></div>
						<? endwhile ?>
					</div>
				</div>
				<div class="swiper-container blnm_cn">
					<div class="swiper-wrapper">

						<? $number = db::query("select * from `bibi_number` order by number asc"); ?>
						<? while($number_d = mysqli_fetch_array($number)): ?>
							<div class="swiper-slide blnm_i">
								<div class="blnm_ic">
									<div class="blnm_ict"><?=$number_d['type']?></div>
									<div class="blnm_ico">
										<div class="">
											<i class="fal fa-vector-square"></i>
											<span><?=$number_d['door']?>0 М<sup>2</sup></span>
										</div>
										<div class="">
											<i class="fal fa-user-circle"></i>
											<span><?=$number_d['door']?> гостей</span>
										</div>
									</div>
									<div class="blnm_icp">
										<div class="blnm_icp2">Цена: <div class="fr_price"><?=$number_d['price']?></div></div>
										<div class="btn btn2">подробнее</div>
									</div>
								</div>
								<div class="blnm_img">
									<div class="lazy_img2" data-src="/assets/uploads/number/<?=$number_d['img']?>"></div>
								</div>
							</div>
						<? endwhile ?>

					</div>
				</div>
			</div>
		</div>
	</div>





    
/*  */
.blnm{
	position: relative;
	width: 100%;
}

.blnm .head_c{
	padding-top: 50px;
}



.sana_bl1b{
	position: relative;
	width: 100%;
	margin-bottom: 30px;
}
.sana_bl1b_i{
	position: relative;
	background-color: var(--gr);
	height: 54px;

	display: flex;
	justify-content: center;
	align-items: center;
}





.blnm_cn{
	width: calc(100% + 60px);
	margin: 0 -30px;
	width: 100%;
	margin: 0;
	overflow: hidden;
}
@media (max-width: 1024px) {
	.blnm_cn{
		width: calc(100% + 30px);
		margin: 0 -15px;
	}
}

.blnm_i{
	/* width: 32%; */
	background: var(--wh);
	box-shadow: var(--bx1);
	margin-bottom: 40px;
	overflow: hidden;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.blnm_i:first-child{
	/* margin-left: 30px; */
}
@media (max-width: 1024px) {
	.blnm_i{
		width: 50%;
		margin-left: 15px;
		margin-right: 0;
	}
	.blnm_i:first-child{
		margin-left: 15px;
	}
	.blnm_i:last-child{
		margin-right: 15px;
	}
}
@media (max-width: 768px) {
	.blnm_i{
		width: 75%;
	}
}
@media (max-width: 500px) {
	.blnm_i{
		width: calc(100% - 30px);
	}
}



.blnm_img{
	position: relative;
	width: 100%;
	padding-bottom: 35%;
}
.blnm_img div{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: var(--gr);
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
}


.blnm_ic{
	position: relative;
	width: 100%;
	padding: 25px 30px 30px 30px;
}
.blnm_ict{
	position: relative;
	width: 100%;
	text-align: center;
	font-size: 20px;
	text-transform: uppercase;
	font-weight: 800;
}

.blnm_ico{
	position: relative;
	width: 100%;
	margin-top: 20px;
	display: flex;
	align-items: center;
	justify-content: center;
}
.blnm_ico div{
	width: 50%;
	display: flex;
	justify-content: center;
	align-items: center;
}
.blnm_ico i{
	font-size: 20px;
	margin-right: 12px;
}
.blnm_ico sup{}



.blnm_icp{
	position: relative;
	width: 100%;
	margin-top: 16px;
	padding-top: 16px;
	display: flex;
	justify-content: space-between;
	align-items: center;
	border-top: 1px solid var(--gr);
}
.blnm_icp2, .blnm_icp2 div{
	font-weight: 700;
	font-size: 18px;
	display: inline;
	color: var(--cm);
}















// 
	var sana_bl1b = new Swiper('.sana_bl1b', {
		slidesPerView: 6,
		freeMode: true,
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
		// loop: true,
		// centeredSlides: true,
	});
	var blnm_cn = new Swiper('.blnm_cn', {
      	slidesPerView: 1,
     	spaceBetween: 30,
      	navigation: {
        	nextEl: '.bl5_next',
        	prevEl: '.bl5_prev',
      	},
      	on: {
			slideChange: function () {
				$('.lazy_img2').lazy({
					effect: "fadeIn",
					effectTime: 500,
					threshold: 0
				})
			},
		},
		thumbs:{swiper:sana_bl1b},
		breakpoints: {
			0:{spaceBetween:0},
			1025:{spaceBetween:30}
		},

		// loop: true,
		// centeredSlides: true,
		effect: 'fade',
		fadeEffect: {crossFade:true},
		// navigation:{nextEl:'.sana_bl1t_next',prevEl:'.sana_bl1t_prev'},
		// on:{slideChange:function(){$('.lazy_sana_img').lazy({effect:"fadeIn",effectTime:500,threshold:0})}},
		// pagination:{el:'.sana_bl1t_pag',dynamicBullets:true},
		// breakpoints: {769:{}},
   });