<?php 
include('../connectMySql.php');
$question = $_POST['question'];
$category = $_POST['category'];
$riasec = $_POST['riasec'];
date_default_timezone_set('Asia/Manila');
$date = date('Y/m/d H:i:s');
$url= "";
$last_id = 0;

$sql = "INSERT INTO questionnaire (category,question,riasec)
 VALUES ('". $category ."','". $question ."','". $riasec ."')";
$result = mysqli_query($conn,$sql);
if($result)
{
    echo "<script src='../dist/js/sweetalert2.all.min.js'></script>
    <body onload='save()'></body>
    <script> 
    function save(){
    Swal.fire(
         'Question added!',
         '',
         'success'
       )
    }</script>";
    include 'question.php';
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
    include 'question.php';
}
?>