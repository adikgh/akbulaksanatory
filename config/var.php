<? 

   // lang
   $lang = 'ru';
   if (isset($_GET['lang'])) if ($_GET['lang'] == 'kz' || $_GET['lang'] == 'ru') $_SESSION['lang'] = $_GET['lang'];
   if (isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
   
   // 
   $ver = 2.23;
   $site_set = [
      'header' => true,
      'menu' => true,
      'utopu' => true,
      'utop_bk' => false,
      
      'footer' => true,
      'footer_c' => true,
      
      'plyr' => true,
      'swiper' => true,
      'autosize' => true,
   ];
   $css = [];
   $js = [];

   // date - time
   $date = date("Y-m-d", time());
   $time = date("H:m:s", time());
   $datetime = date('Y-m-d H:i:s', time());

   // url
	$url = $url_full = $_SERVER['REQUEST_URI'];
	$url = explode('?', $url);
	$url = $url[0];