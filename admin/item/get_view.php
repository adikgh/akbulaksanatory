<? include "../../config/core_a.php"; ?>

   <!--  -->
   <? if (isset($_GET['view'])): ?>
		<? $id = strip_tags($_POST['id']); ?>
		<? $lesson_d = fun::number($id); ?>

         <div class="form_c">

            <div class="form_im">
               <div class="form_span">Аты:</div>
               <i class="fal fa-warehouse-alt form_icon"></i>
               <input type="text" class="form_im_txt wb_name_ubd" placeholder="Стандарт" data-lenght="1" data-val="<?=$lesson_d['name']?>" value="<?=$lesson_d['name']?>" />
            </div>

            <div class="form_im">
               <div class="form_span">Адам саны:</div>
               <i class="fal fa-warehouse-alt form_icon"></i>
               <input type="tel" class="form_im_txt wb_number_ubd" placeholder="1" data-lenght="1" data-val="<?=$lesson_d['door']?>" value="<?=$lesson_d['door']?>" />
            </div>

            <div class="form_im">
               <div class="form_span">Бағасы:</div>
               <i class="fal fa-tenge form_icon"></i>
               <input type="tel" class="form_im_txt fr_price wb_price_ubd" placeholder="10.000 тг" data-lenght="1" data-val="<?=$lesson_d['price']?>" value="<?=$lesson_d['price']?>" />
            </div>

            <div class="form_im">
               <div class="form_span">Бөлме фотосы:</div>
               <input type="file" class="cours_img wb_img_ubd file dsp_n" accept=".png, .jpeg, .jpg">
					<div class="form_im_img cours_img_add <?=($lesson_d['img']?'form_im_img2':'')?>" <?=($lesson_d['img']?'style="background-image: url(/assets/uploads/number/'.$lesson_d['img'].')"':'')?> data-txt="Фотоны жаңарту">Құрылғыдан таңдау</div>
            </div>

            <div class="form_im form_im_bn">
               <div class="btn btn_lesson_edit" data-id="<?=$id?>">Сақтау</div>
            </div>
         </div>


		<? exit(); ?>
	<? endif ?>