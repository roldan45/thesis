<?php
include '../connectMySQL.php';

$user_id = $_POST['user_id'];
$username ="";
$password ="";
$first_name ="";
$middle_name ="";
$last_name ="";
$email_address ="";
$contact_number ="";
$account_type ="";
$type ="";
$profile_picture ="";
$status="";

$query = "select *,CASE
WHEN account_type = 1  THEN 'ADMIN'
WHEN account_type = 2 THEN 'FACILITATOR'
ELSE 'USER'
END as type from users where user_id = '$user_id'";
    $result = $conn->query($query);
        while($row = $result->fetch_assoc())
        {
            $username = $row['username'];
            $password = $row['password'];
            $first_name = $row['first_name'];
            $middle_name = $row['middle_name'];
            $last_name = $row['last_name'];
            $email_address = $row['email_address'];
            $contact_number = $row['contact_number'];
            $account_type = $row['account_type'];
            $type = $row['type'];
            $status = $row['status'];
            }
?>
<!DOCTYPE html>
<html>
<head>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GIS</title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css?v=3.2.0">
  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../dist/js/adminlte.js"></script>
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>  
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> 
  <link rel="stylesheet" href="../designs.css">
</head>
<body>
<!--INFO-->
<form method="post" action="updateUser.php" enctype="multipart/form-data">

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="account_type">Account Type</label>
        <select name="account_type" id="account_type" class="form-control col-lg-12" required>
          <option value="<?php echo $account_type;?>"><?php echo $type;?></option>
          <option value="1">ADMIN</option>
          <option value="2">FACILITATOR</option>
          <option value="3">EXAMINEE</option>
         </select>
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="username" id="username" value="<?php echo $username;?>" maxlength="50"  required/ >
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" value="<?php echo $password;?>" maxlength="50"  required/ >
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="first_name">First Name</label>
        <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo $first_name;?>" maxlength="50"  required/ >
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="middle_name">Middle Name</label>
        <input class="form-control" type="text" name="middle_name" id="middle_name" value="<?php echo $middle_name;?>" maxlength="50"  required/ >
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="last_name">Last Name</label>
        <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo $last_name;?>" maxlength="50"  required/ >
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="email_address">Email address</label>
        <input class="form-control" type="email" name="email_address" id="email_address" value="<?php echo $email_address;?>" maxlength="250"  required />
      </div>
    </div> 
  </div> 

  <div class="row">
  <div class="col-sm-12 col-12"> 
    <div class="form_group">
      <label for="contact_number">Contact Number</label>
      <input type="tel" class="form-control" placeholder="09XXXXXXXXX" required id="contact_number" name="contact_number"  value="<?php echo $contact_number;?>"  maxlength="11" minlength="11" required />
      <input class="form-control" type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" required/ >
    </div>
  </div> 
</div> 


  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control col-lg-12" required>
          <option value="<?php echo $status;?>"><?php echo $status;?></option>
          <option value="ACTIVE">ACTIVE</option>
          <option value="INACTIVE">INACTIVE</option>
         </select>
      </div>
    </div> 
  </div> 
 
  <br>
  <div class="row">
        <div class="col-sm-6 col-6"> 
      <div class="form_group">
        <input type="submit" class="btn btn-success form-control" name="btn_edit" id="btn_edit" value="SAVE"  />
      </div>
    </div> 
    <div class="col-sm-6 col-6"> 
      <div class="form_group">
        <input type="button" class="btn btn-danger form-control" name="btn_cancel" id="btn_cancel" data-dismiss="modal" value="CANCEL" />
      </div>
    </div> 
  </div>
</form>
</body>
</html>

<script>
  function  member_checker(){
        var email = document.getElementById('email_address').value;
        var contact_number = document.getElementById('contact_number').value;
        var username = document.getElementById('username').value;
         $.ajax({
         url:"email_checker.php",
         method:"POST",
         data:{email:email,contact_number:contact_number,username:username},
         success:function(data){
          $('#formField').html(data);
         }
        })
     }
</script>

<script>
  document.getElementById('contact_number').addEventListener('input', function(event) {
    var input = event.target.value;
    var numbersOnly = input.replace(/[^0-9]/g, '');
    event.target.value = numbersOnly;
  });
</script>
   