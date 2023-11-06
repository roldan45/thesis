<?php
include('connectMySql.php');
$username = $_POST['username'];
$password = $_POST['password'];
$hashedPassword = md5($password); // Hash the password using MD5
$first_name =  strtoupper($_POST['first_name']); 
$middle_name = strtoupper($_POST['middle_name']);
$last_name = strtoupper($_POST['last_name']);
$email_address = $_POST['email_address'];
$contact_number =$_POST['contact_number'];
$account_type = "3";
$url = "";
$last_id = "";

// Check if email or contact number already exists
$checkQuery = "SELECT * FROM users WHERE email_address = '$email_address' OR contact_number = '$contact_number'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    
    // Email address or contact number already exists
    echo "<script src='dist/js/sweetalert2.all.min.js'></script>
    <body onload='error()'></body>
    <script> 
    function error(){
    Swal.fire({
        icon: 'error',
        title: 'Register failed!',
        text: 'Email address or contact number already exists.'
    })
    }</script>";
    include 'index.php';
} else {

    // Insert the new user
    $sql = "INSERT INTO users (username, password, account_type, first_name, middle_name, last_name, email_address, contact_number)
        VALUES ('$username', '$hashedPassword', $account_type, '$first_name', '$middle_name', '$last_name', '$email_address', '$contact_number')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script src='dist/js/sweetalert2.all.min.js'></script>
        <body onload='save()'></body>
        <script> 
        function save(){
        Swal.fire(
            'Registered!',
            '',
            'success'
        )
        }</script>";
        include 'index.php';
    } else {
        echo "<script src='dist/js/sweetalert2.all.min.js'></script>
        <body onload='error()'></body>
        <script> 
        function error(){
        Swal.fire({
            icon: 'error',
            title: 'Register failed!'
        })
        }</script>";
        include 'index.php';
    }
}

?>
