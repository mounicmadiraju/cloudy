<?php
/*Cloudinary Configuration*/
/* Require Cloudinary.php, Uploader.php && Api.php*/ 
require 'src/Cloudinary.php';
require 'src/cloudinary/Uploader.php';
require 'src/cloudinary/Api.php';

// CLOUDINARY CONFIGURATION
\Cloudinary::config(array( 
  "cloud_name" => "cloud_name", 
  "api_key" => "api_key", 
  "api_secret" => "api_secret" 
));

function upload($file, $option = array(
  "public_id" => "printway_cloudinary",
  "use_filename" => TRUE)
  ){}

if(isset($_FILES['fileUpload'])){
  $file = $_FILES['fileUpload']["tmp_name"];
  $cond = array("use_filename"=>TRUE);
  $url = \Cloudinary\Uploader::upload($file, $cond);
  print_r(json_encode($url["secure_url"]));
}

?>