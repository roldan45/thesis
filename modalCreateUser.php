<!DOCTYPE html>
<html>
<head>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GIS</title>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.js"></script>
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>  
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> 
  <link rel="stylesheet" href="designs.css">
</head>
<body>
<!--INFO-->
<form method="post" action="insertUser.php" enctype="multipart/form-data" >
  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="username" id="username" value="" oninput="member_checker()" maxlength="50"  required/ >
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" value="" maxlength="50"  required/ >
      </div>
    </div> 
  </div> 

  <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" />
              </div>

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="first_name">First Name</label>
        <input class="form-control" type="text" name="first_name" id="first_name" value="" maxlength="50"  required/ >
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="middle_name">Middle Name</label>
        <input class="form-control" type="text" name="middle_name" id="middle_name" value="" maxlength="50"  required/ >
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="last_name">Last Name</label>
        <input class="form-control" type="text" name="last_name" id="last_name" value="" maxlength="50"  required/ >
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="email_address">Email address</label>
        <input class="form-control" type="email" name="email_address" placeholder="" id="email_address" oninput="member_checker()" value="" maxlength="250"  required/ >
      </div>
    </div> 
  </div> 

<div class="row">
  <div class="col-sm-12 col-12"> 
    <div class="form_group">
      <label for="contact_number">Contact Number</label>
      <input type="tel" class="form-control" placeholder="" required id="contact_number" name="contact_number"  value=""  maxlength="11" minlength="11" required />
    </div>
  </div> 
</div> 

  <br>
  <div class="row">
        <div class="col-sm-6 col-6"> 
      <div class="form_group">
        <div id="formField"></div>
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
      $(document).ready(function() {
        $('form').submit(function(event) {
          var password = $('#password').val();
          var confirmPassword = $('#confirmPassword').val();
          if (password !== confirmPassword) {
            event.preventDefault();
            alert('Passwords do not match. Please try again.');
          }
        });
      });
    </script>
    
    <script>
  document.getElementById('contact_number').addEventListener('input', function(event) {
    var input = event.target.value;
    var numbersOnly = input.replace(/[^0-9]/g, '');
    event.target.value = numbersOnly;
  });
</script>