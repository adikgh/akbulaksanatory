	</div>

	<footer class="footer">
		<div class="bl_c">
			<div class="footer_b">
				<div class="footer_bl">© <?=$site['name']?>, 2023</div>
				<div class="footer_br">
					<a href="https://gprog.kz" target="_blank" class="gprog_bl">
						<span>#gprog-та</span>
						<div class="gprog_heart"><i class="fas fa-heart"></i></div>
						<span>жасалған</span>
						<div class="gprog_ab">
							<div class="gprog_lg"><div class="lazy_img" data-src="https://gprog.kz/assets/img/logo/logo.png"></div></div>
							<div class="gprog_h">G prog</div>
							<div class="gprog_p">Шипажайға арнап сайт жасатыңыз</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</footer>

	<!-- main js -->
	<script src="/assets/js/main.js?v=<?=$ver?>"></script>
	<? foreach ($js as $i): ?> <script src="/assets/js/<?=$i?>.js?v=<?=$ver?>"></script> <? endforeach ?>

	<? if ($site['metrika'] != null): ?><noscript><div><img src='https://mc.yandex.ru/watch/<?=$site['metrika']?>' style='position:absolute; left:-9999px;'/></div></noscript><?php endif ?>
	<? if ($site['pixel'] != null): ?><noscript><img height='1' width='1' style='display:none' src='https://www.facebook.com/tr?id=<?=$site['pixel']?>&ev=PageView&noscript=1'/></noscript><?php endif ?>

</body>
</html>

	<? include 'modal.php'; ?>