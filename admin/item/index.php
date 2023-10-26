<? include "../../config/core_a.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /admin/');


	
	// Сайттың баптаулары
	$menu_name = 'item';
	$site_set['utop_bk'] = 'catalog';
	$site_set['utop'] = '';
	$site_set['autosize'] = true;
	$css = ['admin/user', 'admin/cours', 'admin/item'];
	$js = ['admin/user'];
?>
<? include "../block/header.php"; ?>

	<div class="uitem">

		<div class="">
			<div class="head_c">
				<h4>Бөлмелер</h4>
			</div>
			<div class="uc_d">
				<div class="uc_di bq3_ci_rg add_lesson_b">
					<i class="fal fa-plus"></i>
					<span>Қосу</span>
				</div>
					
				<? $cblock = db::query("select * from bibi_number"); ?>
				<? while($cblock_d = mysqli_fetch_assoc($cblock)): ?>
					<div class="uc_di clc_lesson_b" data-id="<?=$cblock_d['id']?>">
						<div class="uc_dit">
							<div class="bq_ci_info">
								<div class="bq_cih"><?=$cblock_d['name']?></div>
							</div>
							<div class="bq_ci_img">
								<div class="lazy_img" data-src="/assets/uploads/number/<?=$cblock_d['img']?>"></div>
							</div>
						</div>
						<div class="uc_dib">
							<div class="uc_dib_ckb">
								<div class=""><?=$cblock_d['door']?>-дық бөлме</div>
								<div class="fr_price"><?=$cblock_d['price']?></div>
							</div>
							<div class="bq_ci_btn">
								<div class="btn btn_gr btn_dd">
									<i class="fal fa-long-arrow-right"></i>
								</div>
							</div>
						</div>
					</div>
				<? endwhile ?>

			</div>
		</div>


	</div>

<? include "../block/footer.php"; ?>


	<!-- lesson add -->
	<div class="pop_bl pop_bl2 lesson_add">
		<div class="pop_bl_a lesson_add_back"></div>
		<div class="pop_bl_c">
			<div class="head_c txt_c">
				<h5>Бөлме қосу</h5>
				<div class="btn btn_dd2 lesson_add_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl">
				<div class="form_c">

					<div class="form_im">
						<div class="form_span">Аты:</div>
						<i class="fal fa-warehouse-alt form_icon"></i>
						<input type="text" class="form_im_txt wb_name" placeholder="Стандарт" data-lenght="1" />
					</div>

					<div class="form_im">
						<div class="form_span">Адам саны:</div>
						<i class="fal fa-warehouse-alt form_icon"></i>
						<input type="tel" class="form_im_txt wb_number" placeholder="1" data-lenght="1" />
					</div>

					<div class="form_im">
						<div class="form_span">Бағасы:</div>
						<i class="fal fa-tenge form_icon"></i>
						<input type="tel" class="form_im_txt fr_price wb_price" placeholder="10.000 тг" data-lenght="1" />
					</div>

					<div class="form_im">
						<div class="form_span">Бөлме фотосы:</div>
						<input type="file" class="cours_img wb_img file dsp_n" accept=".png, .jpeg, .jpg">
						<div class="form_im_img lazy_img cours_img_add" data-txt="Фотоны жаңарту">Құрылғыдан таңдау</div>
					</div>

					<div class="form_im form_im_bn">
						<div class="btn btn_lesson_add">Қосу</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--  -->
	<div class="pop_bl pop_bl2 lesson_edit">
		<div class="pop_bl_a lesson_edit_back"></div>
		<div class="pop_bl_c">
			<div class="head_c txt_c">
				<h5>Бөлмені өңдеу</h5>
				<div class="btn btn_dd2 lesson_edit_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl">
				<div class="lesson_edit_89">
					<div class="menu_c lesson_clc_menu" data-id="">
						<div class="menu_ci del_lesson_b">
							<div class="menu_cin"><i class="fal fa-trash"></i></div>
							<div class="menu_cih">Жою</div>
						</div>
					</div>
				</div>
				<div class="lesson_edit_99"></div>
			</div>
		</div>
	</div>