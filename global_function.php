<?php 
	error_reporting(0);
	session_start();
	$temp_url  = 'http://'.$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF']).'/';
	$temp_curr = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$temp_img  = 'http://'.$_SERVER['HTTP_HOST'].get_dirname($_SERVER['PHP_SELF']).'/admin/static/thimthumb.php?src=/';

   define('BASE_URL', $temp_url);
   define('CURR_URL', $temp_curr);
   define('IMG_URL', $temp_img);

   function get_dirname($path){
      $current_dir = dirname($path);
      
      if($current_dir == "/" || $current_dir == "\\"){
         $current_dir = '';
      }
      
      return $current_dir;
   }
   function view_page($total_page, $page){
      
      if($total_page == 0){
         $total_page = $page;
      }
      
      for($i=1;$i<=$total_page;$i++){
         echo "<option value=\"".$i."\"";
        if($i == $page){
           echo 'selected="selected"';
        }
        echo ">".$i."</option> \n";
      }

   }

   function fetchData($type, $sql){
	  if($type === 'single'){
	     $query	= mysql_query($sql);
		 $row = mysql_fetch_object($query);
	  }else if($type === 'multiple'){
         $query	= mysql_query($sql);
         $row	= array();
         while($result = mysql_fetch_object($query)){
	        array_push($row, $result);
		 }
	  }
	  return $row;
	  
   }
   function print_post(){
   	echo "<pre>";
   	print_r($_POST);
   	echo "</pre>";
   }
   function insert_data($sql=''){
   	mysql_query($sql);
   }

   function safe_redirect($url, $exit=true){
      if(substr($url, 0, 5) == 'https'){
         $url = $url;
      }else if($url == 'self'){
         $url = CURR_URL;
      }else{
         $url = BASE_URL.$url;
      }
      
      if(!headers_sent()){
         header('HTTP/1.1 301 Moved Permanently');
   	  header('Location: '.$url);
   	  header("Connection: close");
      }
      
      print '<html>';
      print '<head>';
      print '<meta http-equiv="Refresh" content="0;url='.$url.'" />';
      print '</head>';
      print '<body onload="location.replace(\''.$url.'\')">';
      print '</body>';
      print '</html>';
      
      if ($exit) exit;
   }
   function set_alert($type, $msg){
	   if(session_id() == ''){
	      session_start();
	   }
	   
	   $_SESSION['alert']['type'] = $type;
	   $_SESSION['alert']['msg']  = $msg;
		   
	}
	function show_alert($type, $msg){
	   
	   if(session_id() == ''){
	      session_start();
	   }
	   
	   if($type != '' && $msg != ''){
	      echo '<div class="alert alert-'.$type.' animated slideInDown">';
	      echo '<div class="container">';
		  echo '<button type="button" class="close" id="id-btn-dissmiss-alert" aria-label="Close"></button>';
	      echo $msg;
	      echo '</div>';
	      echo '</div>';
	   }
	   
	}

   $sql_category = "SELECT * FROM product_category WHERE 1 AND category_visibility='1' ORDER BY name_category";

   // var_dump($sql_category);
   // die;
   $list_category_product = fetchData('multiple',$sql_category);

   $sql_product = "SELECT * FROM product WHERE 1 AND product_visibility='1' ";
   
   if (isset($_GET['product_category'])) {

      $sql_product .= " AND id_category = '".$_GET['product_category']."'";
   }

   $sql_city = "SELECT * FROM tbl_City";
   $list_city = fetchData('multiple',$sql_city);
   
   $list_product = fetchData('multiple',$sql_product);   
   // var_dump($list_product);
   // die;
?>