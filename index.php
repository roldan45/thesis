<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Career Course Assessment</title>
  <link rel="icon" type="image/x-icon" href="dist/img/logo.jpg">
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
<style type="text/css">
  
</style>
<body style="background-image: url('dist/img/bg.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">
<center>
  <br><br><br><br><br>
<div class="login-box">
        <div class="card ">
          <div class="card-header">
            <a href="#" style="font-family: segoe ui;color:#194569;"><h1>Career Course Assessment</h1></a>
          </div>
          <div class="card-body login-card-body">
            <p class="login-box-msg" style="color:gray">Sign in</p>
                <form action="loginprocess.php" method="post">
                      <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-8">
                        </div>
                        <div class="col-4">
                        <button type="submit" id="loginbutton" name="LOGIN" class="btn btn-info btn-block">Sign In</button>
                        </div>
                    </div>
              </form>
            <p class="mb-1">
            <a href="#" class="create_account">Student Register Here</a><br>
            <!--<a href="#" class="view_message">forgot password?</a>!-->
            </p>
          </div>
    </div>
  </div>
</center>
<!--MODAL FORGOTPASSWORD-
<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-default">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fas fa-unlock-alt"></i> Change Password</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body" id="forgotpassDetail"> 
       
      </div>
   </div>
 </div> 
</div>
-MODAL-->

<!--MODAL CREATE ACCOUNT-->
<div class="modal fade" id="modal-default1" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-default">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fas fa-user-plus"></i> Register</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body" id="createAccount"> 
       
      </div>
   </div>
 </div> 
</div>
<!--MODAL-->

 <script>
  $(document).ready(function(){ 
  $(document).on('click', '.view_message', function(){
  //$('#dataModal').modal();
  var ticket_id = $(this).attr("id");
  $.ajax({
   url:"forgot_password.php",
   method:"POST",
   data:{ticket_id:ticket_id},
   success:function(data){
    $('#forgotpassDetail').html(data);
    $('#modal-default').modal('show');
   }
  })
 })
});
</script>
 <script>
  $(document).ready(function(){ 
  $(document).on('click', '.create_account', function(){
  var ticket_id = $(this).attr("id");
  $.ajax({
   url:"modalCreateUser.php",
   method:"POST",
   data:{ticket_id:ticket_id},
   success:function(data){
    $('#createAccount').html(data);
    $('#modal-default1').modal('show');
   }
  })
 })
});
</script>
<script type="text/javascript">
  $('input').bind('input', function() {
  var c = this.selectionStart,
      r = /[^a-z0-9 .]/gi,
      v = $(this).val();
  if(r.test(v)) {
    $(this).val(v.replace(r, ''));
    c--;
  }
  this.setSelectionRange(c, c);
});
</script>
</body>

</html>