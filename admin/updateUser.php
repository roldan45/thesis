<?php 
include('../connectMySql.php');
$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email_address'];
$contact_number = $_POST['contact_number'];
$account_type = $_POST['account_type'];
$status = $_POST['status'];
$url= "";
$last_id = "";

$sql= sprintf("UPDATE users
SET 
username = '". $username ."',
password  = '". $password ."',
account_type  = ". $account_type .",
first_name  = '". $first_name ."', 
middle_name  = '". $middle_name ."',
last_name  = '". $last_name ."',
email_address = '". $email_address ."',
contact_number = '". $contact_number ."',
status = '".$status."' 
WHERE user_id = '". $user_id ."'");

if ($conn->query($sql) === TRUE) {
    echo "<script src='../dist/js/sweetalert2.all.min.js'></script>
    <body onload='save()'></body>
    <script> 
    function save(){
    Swal.fire(
         'Record Updated!',
         '',
         'success'
       )
    }</script>";
    include 'user.php';
}
else
{
    echo "<script src='../dist/js/sweetalert2.all.min.js'></script>
    <body onload='error()'></body>
    <script> 
    function error(){
    Swal.fire({
                    icon: 'error',
                    title: 'Register failed!'
              })
    }</script>";
    include 'user.php';
}

?>