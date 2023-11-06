<?php
include('../connectMySql.php');
$sql = "DELETE FROM courses WHERE course_id  = '".$_POST['course_id']."'";
if ($conn->query($sql) === TRUE) {
   echo "<script src='../dist/js/sweetalert2.all.min.js'></script>
    <body onload='save()'></body>
    <script> 
    function save(){
    Swal.fire(
         'Course deleted!',
         '',
         'success'
       )
    }</script>";
    include 'courses.php';
} else {
     echo "<script src='../dist/js/sweetalert2.all.min.js'></script>
    <body onload='error()'></body>
    <script> 
    function error(){
    Swal.fire({
                    icon: 'error',
                    title: 'Delete failed!'
              })
    }</script>";
    include 'courses.php';
}
?>