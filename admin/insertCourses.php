<?php 
include('../connectMySql.php');
$course = $_POST['course'];
$riasec = $_POST['riasec'];
date_default_timezone_set('Asia/Manila');
$date = date('Y/m/d H:i:s');
$url= "";
$last_id = 0;



$query = "SELECT * FROM `courses`ORDER BY course_id DESC LIMIT 1";
$result = $conn->query($query);
while($row = $result->fetch_assoc())
{
$last_id = $row['course_id'];
}
$last_id = $last_id + 1;

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
$sql = "INSERT INTO courses (course_name,riasec,image)
 VALUES ('". $course ."','". $riasec ."','". $path ."')";
$result = mysqli_query($conn,$sql);
if($result)
{
    echo "<script src='../dist/js/sweetalert2.all.min.js'></script>
    <body onload='save()'></body>
    <script> 
    function save(){
    Swal.fire(
         'Course added!',
         '',
         'success'
       )
    }</script>";
    include 'courses.php';
}
else
{
    echo "<script src='../dist/js/sweetalert2.all.min.js'></script>
    <body onload='error()'></body>
    <script> 
    function error(){
    Swal.fire({
                    icon: 'error',
                    title: 'Failed!'
              })
    }</script>";
    include 'courses.php';
}
?>