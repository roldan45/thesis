<?php
require_once('../connectMySQL.php');
require_once('../loginverification.php');
if(logged_in()){
    $session_user_id = $_SESSION['user_id'];
    $question_count = 0;
    $_SESSION['question_count'] = $question_count;
?> 
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Career Guidance</title>
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
  <script src='../dist/js/sweetalert2.all.min.js'></script>
<style>
  
.badge-info {
    color: #fff;
    background-color: #194569;
}
</style>
<body id="main_body">
<form method="post">
<h5 class="mb-2 mt-4"></h5>
<div class="col-lg-12 col-12">
    <div class="small-box badge-info">
        <div class="inner"><center>
            <h3>Exam</h3></center>
        </div>
        <div class="icon">
          <i class="fas fa-edit"></i>
        </div>
        <a href="#top" class="small-box-footer create_courses">
                <i class="fas fa-edit"></i>
         </a>
    </div>
</div>
<div class="card">
  <div class="card-body">
    <div id="questions">
      <center>
       <button class="btn btn-success" type="button" id="btn_start" name="btn_start" onclick="start_exam();">START MY EXAM</button>
      </center>
    </div>
  </div>
</div>

</form>
<?php }
else
{
  header('location:../index.php');
}?>
</body>

<script>
function start_exam(){
   $.ajax({
   url:"interest_questions.php",
   method:"POST",
   success:function(data){
    $('#main_body').html(data);
   }
  })
}  

</script>
</html>