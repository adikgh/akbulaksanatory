<? if ($site_set['header'] == true): ?>
	<div class="header ">
		<div class="header_c">
			<div class="header_l">
				<a class="logo" href="/admin/">
					<div class="logo_r"><?=$site['name']?></div>
				</a>
			</div>
			<div class="header_r">
				<? if ($user_id): ?>
					<div class="cmenu">
						<a class="cmenu_i <?=($menu_name=='cours'?'cmenu_i_act':'')?>" href="/admin/item/">Номера</a>
					</div>
					<div class="menu">
						<div class="menu_m menu_bars_clc">
							<div class="menu_mn"><?=$user['name']?> <?=($user['surname']?substr($user['surname'],0,1).'.':'')?></div>
							<div class="menu_bars">
								<div class="menu_bars_c lazy_img" data-src="/assets/uploads/users/<?=$user['logo']?>">
									<?=($user['logo']?'':'<i class="fal fa-user"></i>')?>
								</div>
							</div>
						</div>
						<div class="menu_c">
							<div class="menu_ci user_edit_pop">
								<div class="menu_cin"><i class="fal fa-user"></i></div>
								<div class="menu_cih">Менің аккаунтым</div>
							</div>
							<div class="menu_ci user_ph_pop">
								<div class="menu_cin"><i class="fal fa-mobile"></i></div>
								<div class="menu_cih">Телефон номерім</div>
							</div>
							<div class="menu_ci company_edit_pop">
								<div class="menu_cin"><i class="fal fa-cog"></i></div>
								<div class="menu_cih">Бағдарлама баптауы</div>
							</div>
							<a class="menu_ci" href="/admin/exit.php">
								<div class="menu_cin"><i class="fal fa-sign-out"></i></div>
								<div class="menu_cih">Шығу</div>
							</a>
						</div>
					</div>
				<? endif ?>
			</div>
		</div>
		<div class="utop">
			<? if ($site_set['utop_bk']): ?>
				<div class="utop_l">
					<a class="utop_ic" href="/admin/<?=$site_set['utop_bk']?>"><i class="fal fa-long-arrow-left"></i></a>
				</div>
			<? endif ?>
			<div class="utop_r">
				<? if ($site_set['utop']): ?>
					<div class="utop_nm"><?=$site_set['utop']?></div>
				<? else: ?>
					<a class="utop_nm utop_nm2 logo" href="/admin/catalog/">
						<div class="logo_l lazy_img" data-src="/assets/img/logo/logo_bl.png"></div>
						<div class="logo_r"><?=$site['name']?></div>
					</a>
				<? endif ?>
				<? if ($site_set['utopu'] != false): ?>
					<a class="menu" href="/admin/acc/">
						<div class="menu_bars">
							<div class="menu_bars_c lazy_img" data-src="/assets/uploads/users/<?=$user['logo']?>">
								<?=($user['logo']?'':'<i class="fal fa-user"></i>')?>
							</div>
						</div>
					</a>
				<? endif ?>
			</div>
		</div>
	</div>
<? endif ?>

<!-- body start -->
<div class="app">
	<div class="ub1">