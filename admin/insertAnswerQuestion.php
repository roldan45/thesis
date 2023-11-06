<?php
include '../connectMySQL.php';
include '../loginverification.php';
if(logged_in()){
    $session_user_id = $_SESSION['user_id'];
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
<form method="post" action="insertAnswerQuestion.php">
<h5 class="mb-2 mt-4"></h5>
<div class="col-lg-12 col-12">
    <div class="small-box badge-info">
        <div class="inner"><center>
            <h3>Interest</h3></center>
        </div>
    </div>
</div>
<div class="card">
  <div class="card-body">
    <div id="questions">
      <center>
     <?php
        $query = "SELECT * FROM questionnaire where category = 'INTEREST' ORDER BY RAND() limit 1";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc())
        {

          echo '<div class="row">
                  <div class="col-sm-12 col-12"> 
                    <div class="form_group">
                      <h4>'.$row['question'].'</h4><br>
                      <div >
                        <label class="btn btn-secondary">
                        <input type="radio" name="'.$row['question_id'].'options" id="'.$row['question_id'].'a1" autocomplete="off" required> Strongly Agree
                        </label>
                        <label class="btn btn-secondary">
                        <input type="radio" name="'.$row['question_id'].'options" id="'.$row['question_id'].'option_a2" autocomplete="off" required> Agree
                        </label>
                        <label class="btn btn-secondary">
                        <input type="radio" name="'.$row['question_id'].'options" id="'.$row['question_id'].'option_a3" autocomplete="off" required> Disagree
                        </label>
                        <label class="btn btn-secondary">
                        <input type="radio" name="'.$row['question_id'].'options" id="'.$row['question_id'].'option_a3" autocomplete="off" required> Strongly Disagree
                        </label>
                      </div>
                    </div>
                  </div> 
                </div> ';
        }
     ?>
        <button type="submit" class="btn btn-success" >NEXT <i class="fas fa-arrow-right"></i></button>
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
   url:"question.php",
   method:"POST",
   success:function(data){
    $('#main_body').html(data);
   }
  })
}  

</script>
</html>