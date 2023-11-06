<?php 
require_once('../connectMySql.php');
$course = $_POST['course'];
$riasec = $_POST['riasec'];
$course_id = $_COOKIE['course_id'];
date_default_timezone_set('Asia/Manila');
$date = date('Y/m/d H:i:s');
$url= "";
$last_id = 0;


  $query = "SELECT * FROM `courses` WHERE course_id = '".$course_id."'";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc())
    {
        $last_id = $row['course_id'];
    }
    
    function compress_image($source_url, $destination_url, $quality) {
 
       $info = getimagesize($source_url);
 
           if ($info['mime'] == 'image/jpeg')
           $image = imagecreatefromjpeg($source_url);
 
           elseif ($info['mime'] == 'image/gif')
           $image = imagecreatefromgif($source_url);
 
           elseif ($info['mime'] == 'image/png')
           $image = imagecreatefrompng($source_url);
 
           imagejpeg($image, $destination_url, $quality);
           return $destination_url;
         }

             if ($_FILES["image"]["error"] > 0) {
             $error = $_FILES["image"]["error"];
         }
             else if (($_FILES["image"]["type"] == "image/gif") ||
             ($_FILES["image"]["type"] == "image/jpeg") ||
             ($_FILES["image"]["type"] == "image/png") ||
             ($_FILES["image"]["type"] == "image/pjpeg")) {
 
             $url = '../dist/img/courses/'.$last_id.'.jpg';
             $filename = compress_image($_FILES["image"]["tmp_name"], $url, 50);
        }else {
         $error = "Uploaded image should be jpg or gif or png";
        }
        $path = str_replace("../dist/img/courses/", "", $url);

$where_condition = "";
if($url != "")
{
    $where_condition = "image = '". $path ."'";
}

$sql= sprintf("UPDATE  courses 
SET 
course_name = '". $course ."',
riasec = '". $riasec ."', 
%s 
WHERE course_id = '".$course_id."' ",$where_condition);

if ($conn->query($sql) === TRUE) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <body onload='save()'></body>
    <script> 
    function save(){
    Swal.fire(
         'Record Updated!',
         '',
         'success'
       )
    }</script>";
    include 'courses.php';
}
else
{
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <body onload='error()'></body>
    <script> 
    function error(){
    Swal.fire({
                    icon: 'error',
                    title: 'Update failed!'
              })
    }</script>";
    include 'courses.php';
}

?>