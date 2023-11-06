<?php
include('../connectMySql.php');
$sql = "DELETE FROM questionnaire WHERE question_id  = '".$_POST['question_id']."'";
if ($conn->query($sql) === TRUE) {
   echo "<script src='../dist/js/sweetalert2.all.min.js'></script>
    <body onload='save()'></body>
    <script> 
    function save(){
    Swal.fire(
         'Question deleted!',
         '',
         'success'
       )
    }</script>";
    include 'question.php';
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
    include 'question.php';
}
?>