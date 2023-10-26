<? include "../../config/core_a.php";

	// 
	if(isset($_GET['add_item_photo'])) {
		$path = '../../assets/uploads/number/';
		$allow = array();
		$deny = array(
			'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
			'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
			'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
		);
		$error = $success = '';
		$datetime = date('Ymd-His', time());

		if (!isset($_FILES['file'])) $error = 'Файлды жүктей алмады';
		else {
			$file = $_FILES['file'];
			if (!empty($file['error']) || empty($file['tmp_name'])) $error = 'Файлды жүктей алмады';
			elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) $error = 'Файлды жүктей алмады';
			else {
				$pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
				$name = mb_eregi_replace($pattern, '-', $file['name']);
				$name = mb_ereg_replace('[-]+', '-', $name);
				$parts = pathinfo($name);
				$name = $datetime.'-'.$name;

				if (empty($name) || empty($parts['extension'])) $error = 'Файлды жүктей алмады';
				elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) $error = 'Файлды жүктей алмады';
				elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) $error = 'Файлды жүктей алмады';
				else {
					if (move_uploaded_file($file['tmp_name'], $path . $name)) $success = '<p style="color: green">Файл «' . $name . '» успешно загружен.</p>';
					else $error = 'Файлды жүктей алмады';
				}
			}
		}
		
		if (!empty($error)) $error = '<p style="color:red">'.$error.'</p>';  
		
		$data = array(
			'error'   => $error,
			'success' => $success,
			'file' => $name,
		);
		
		header('Content-Type: application/json');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);

		exit();
	}


	// 
	if(isset($_GET['lesson_add'])) {
		$wb_name = @strip_tags($_POST['wb_name']);
		$wb_number = @strip_tags($_POST['wb_number']);
		$wb_price = @strip_tags($_POST['wb_price']);
		$img = @strip_tags($_POST['img']);
		
		// $cours = fun::cours($cours_id);
		
		$id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `bibi_number`")))['max(id)'] + 1;
		// $number = fun::lesson_next_number($block_id);
		$ins = db::query("INSERT INTO `bibi_number`(`name`, `door`) VALUES ('$wb_name', '$wb_number')");

		if ($wb_price) $ubd_li = db::query("UPDATE `bibi_number` SET `price` = '$wb_price' WHERE id = '$id'");
		if ($img) $ubd_li = db::query("UPDATE `bibi_number` SET `img` = '$img' WHERE id = '$id'");
		
		if ($ins) echo 'yes';
		exit();
	}

	// 
	if(isset($_GET['lesson_edit'])) {
		$id = @strip_tags($_POST['id']);
		$wb_name = @strip_tags($_POST['wb_name']);
		$wb_number = @strip_tags($_POST['wb_number']);
		$wb_price = @strip_tags($_POST['wb_price']);
		$img = @strip_tags($_POST['img']);

		if ($wb_name) $ins_li = db::query("UPDATE `bibi_number` SET `name` = '$wb_name' WHERE id = '$id'");
		if ($wb_number) $ins_li = db::query("UPDATE `bibi_number` SET `door` = '$wb_number' WHERE id = '$id'");
		if ($wb_price) $ins_li = db::query("UPDATE `bibi_number` SET `price` = '$wb_price' WHERE id = '$id'");
		if ($img) $ins_li = db::query("UPDATE `bibi_number` SET `img` = '$img' WHERE id = '$id'");

		echo 'yes';
		exit();
	}

	// 
	if(isset($_GET['lesson_del'])) {
		$id = strip_tags($_POST['id']);
		$del = db::query("DELETE FROM `bibi_number` WHERE `id` = '$id'");
		if ($del) echo 'yes';
		exit();
	}










	// 
	if(isset($_GET['add_item_photo2'])) {
		$id = $_SESSION['project_id'];
		$input_name = 'file';
		$path = '../../assets/uploads/number/';
		$allow = array();
		$deny = array(
			'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
			'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
			'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
		);
		$data = array();
		$datetime = date('Y-m-d-H-i-s', time());
		$filem = array();

		if (!isset($_FILES[$input_name])) { $error = 'Файлы не загружены.'; }
		else {
			$files = array();
			$diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
			if ($diff == 0) $files = array($_FILES[$input_name]);
			else {
				foreach($_FILES[$input_name] as $k => $l) {
					foreach($l as $i => $v) {
						$files[$i][$k] = $v;
					}
				}
			}

			foreach ($files as $key=>$file) {
				$error = $success = '';
				if (!empty($file['error']) || empty($file['tmp_name'])) {
					$error = 'Не удалось загрузить файл.';
				} elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
					$error = 'Не удалось загрузить файл.';
				} else {
					$pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
					$name = mb_eregi_replace($pattern, '-', $file['name']);
					$name = mb_ereg_replace('[-]+', '-', $name);
					$parts = pathinfo($name);
					$name = $datetime.'-'.$name;
					array_push($filem, $name);
					
					if (empty($name) || empty($parts['extension'])) {
						$error = 'Недопустимый тип файла';
					} elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
						$error = 'Недопустимый тип файла';
					} elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
						$error = 'Недопустимый тип файла';
					} else {
						if (move_uploaded_file($file['tmp_name'], $path . $name)) {
							// $sql = db::query("INSERT INTO `sanatorium_img`(`sanatorium_id`, `number`, `name`, `ins_dt`) VALUES ('$id', '$key', '$name', '$datetime')");
							$sql = db::query("INSERT INTO `sanatorium_img`(`sanatorium_id`, `img`) VALUES ('$id', '$name')");
							$success = 'Файл «' . $name . '» успешно загружен.';
						} else $error = 'Не удалось загрузить файл.';
					}
				}
			}

			if (!empty($success)) $data[] = '<p style="color: green">' . $success . '</p>';  
			if (!empty($error)) $data[] = '<p style="color: red">' . $error . '</p>';  
		}
				
		$data = array(
			'error'   => $error,
			'success' => $success,
			'file' => $filem,
		);
		
		header('Content-Type: application/json');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);

		exit();				
	}
	
	// 
	if(isset($_GET['sn_img_del'])) {
		$id = strip_tags($_POST['id']);
		$del = db::query("DELETE FROM `sanatorium_img` WHERE `id` = '$id'");
		if ($del) echo 'yes';
		exit();
	}