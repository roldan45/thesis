<?php
include 'connectMySQL.php';

if (isset($_POST['LOGIN'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<script src='dist/js/sweetalert2.all.min.js'></script>
           <body onload='error()'></body>
           <script> 
           function error(){
           Swal.fire({
                icon: 'error',
                title: 'Login failed!'
           })
           }</script>";
        include 'index.php';
    } else {
        // Hash the entered password
        $hashedPassword = md5($password);

        $query = "SELECT * FROM users WHERE username = '$username' AND status = 'ACTIVE'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Compare the hashed passwords
                if ($row['password'] === $hashedPassword) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $first_name = $row['first_name'];
                    $middle_name = $row['middle_name'];
                    $last_name = $row['last_name'];
                    $email_address = $row['email_address'];
                    $contact_number = $row['contact_number'];
                    $account_type = $row['account_type'];


                    session_start();
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['middle_name'] = $middle_name;
                    $_SESSION['last_name'] = $last_name;
                    $_SESSION['email_address'] = $email_address;
                    $_SESSION['contact_number'] = $contact_number;
                    $_SESSION['account_type'] = $account_type;
            

                    date_default_timezone_set('Asia/Manila');
                    $log = date("Y-m-d h:i:sa");

                    if ($account_type == 1 || $account_type == 2 || $account_type == 3) {
                        header('location:admin/admin.php');
                    } else {
                        echo "<script src='dist/js/sweetalert2.all.min.js'></script>
                           <body onload='error()'></body>
                           <script> 
                           function error(){
                           Swal.fire({
                                icon: 'error',
                                title: 'Login failed!'
                          })
                           }</script>";
                        include 'index.php';
                    }
                } else {
                    echo "<script src='dist/js/sweetalert2.all.min.js'></script>
                       <body onload='error()'></body>
                       <script> 
                       function error(){
                       Swal.fire({
                            icon: 'error',
                            title: 'Login failed!'
                       })
                       }</script>";
                    include 'index.php';
                }
            }
        } else {
            echo "<script src='dist/js/sweetalert2.all.min.js'></script>
           <body onload='error()'></body>
           <script> 
           function error(){
           Swal.fire({
                icon: 'error',
                title: 'Login failed!'
           })
           }</script>";
            include 'index.php';
        }
    }
}
?>
