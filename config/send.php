<?

	// bot
	/* https://api.telegram.org/bot1082028620:AAGRXcmhEtOlK3Z29Fa7Vq6JfIK1Uwdw-P4/getUpdates */

	if(isset($_GET['mess'])) {
		$name  	= strip_tags($_POST['name']);
		$phone  	= strip_tags($_POST['phone']);
		$phone 	= substr_replace($phone, '', 0, 1);
		$phone 	= substr_replace($phone, '8', 0, 1);
		$txt = '';

	   // telegram
		$arr = array(
			// 'Сайт атауы:'	=> 'resorts-.kz',
			'Аты-жөні: '	=> $name,
			'Телефон: ' 	=> $phone
		);

		foreach($arr as $key => $value) {
			$txt .= "<b>".$key."</b> ".$value."%0A";
		};

		$token = "1082028620:AAGRXcmhEtOlK3Z29Fa7Vq6JfIK1Uwdw-P4";
		$chat_id = "-4028747332";
		$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

		if ($sendToTelegram) echo "yes";
		else echo "error";

		exit();
	}