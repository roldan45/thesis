<?php
require_once('../connectMySQL.php');
$sql= sprintf("UPDATE exam_header 
SET 
feedback = '". $_POST['feedback'] ."'
WHERE exam_id = '".$_COOKIE['exam_id']."'");
if ($conn->query($sql) === TRUE) {
    echo "<script src='../dist/js/sweetalert2.all.min.js'></script>
    <body onload='save()'></body>
    <script> 
    function save(){
    Swal.fire(
         'Feedback sent!',
         '',
         'success'
       )
    }</script>";
    include 'review.php';
}
else
{
    echo "<script src='../dist/js/sweetalert2.all.min.js'></script>
    <body onload='error()'></body>
    <script> 
    function error(){
    Swal.fire({
                    icon: 'error',
                    title: 'Sending failed!'
              })
    }</script>";
    include 'review.php';
}
?>