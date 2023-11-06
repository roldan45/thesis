<?php
require_once('../connectMySQL.php');
require_once('../loginverification.php');
if(logged_in()){
$session_user_id = $_SESSION['user_id'];
$question_count = $_SESSION['question_count'];
$exam_id = 0;
date_default_timezone_set('Asia/Manila');
$date = date('Y/m/d H:i:s');

if(isset($_POST['btn_submit4']))
{
    //TRANSFER DATA exam_id
    $query = "SELECT * FROM exam_header where user_id = '".$session_user_id."'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) 
    {
      while($row = $result->fetch_assoc())
      {
        $exam_id = $row['exam_id'];
      }
      //INSERT CHILD EXAM
      $sql = "INSERT INTO exam_child (question_id,exam_id,riasec,score) VALUES ('". $_POST['question_id'] ."','". $exam_id ."','". $_POST['riasec'] ."','". $_POST['options'] ."')";
      $result1 = mysqli_query($conn,$sql);
    }
    else
    {
      //INSERT EXAM HEADER
      $sql = "INSERT INTO exam_header (user_id,date) VALUES ('". $session_user_id ."','". $date ."')";
      $result1 = mysqli_query($conn,$sql);

      //TRANSFER DATA exam_id
      $query = "SELECT * FROM exam_header where user_id = '".$session_user_id."'";
      $result2 = $conn->query($query);
      while($row = $result2->fetch_assoc())
      {
         $exam_id = $row['exam_id'];
      }
      //INSERT CHILD EXAM
      $sql = "INSERT INTO exam_child (question_id,exam_id,riasec,score) VALUES ('". $_POST['question_id'] ."','". $exam_id ."','". $_POST['riasec'] ."','". $_POST['options'] ."')";
      $result1 = mysqli_query($conn,$sql);
    }
    setcookie('exam_id', $exam_id);


    $query1 = "SELECT count(answer_id)as count FROM exam_child WHERE exam_id = '".$exam_id."'";
    $result1 = $conn->query($query1);
    while($row1 = $result1->fetch_assoc())
    {
      $_SESSION['question_count'] = $question_count + 1;
    }
}
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
  <script src='dist/js/sweetalert2.all.min.js'></script>
<style>
.badge-info {
    color: #fff;
    background-color: #194569;
}
</style>
<body id="main_body">
 <?php



        $query = "SELECT * FROM questionnaire 
        where category = 'OBSERVATION' and question_id not in (SELECT question_id FROM exam_child WHERE exam_id = '".$exam_id."')
        ORDER BY RAND() limit 1";
        $result = $conn->query($query);
        if ($_SESSION['question_count'] > 39) 
        {
          include 'result.php';
        }
        else
        {
          while($row = $result->fetch_assoc())
          {
            echo '
<form method="post" action="observation_questions.php">
      <h5 class="mb-2 mt-4"></h5>
      <div class="col-lg-12 col-12">
          <div class="small-box badge-info">
              <div class="inner"><center>
                  <h3>OBSERVATION</h3>Question '.$_SESSION['question_count'].'</center>
              </div>
          </div>
      </div>
          <div class="card">
            <div class="card-body">
              <div id="questions">
                <center>
                  <div class="row">
                    <div class="col-sm-12 col-12"> 
                      <div class="form_group">
                        <h4>'.$row['question'].'</h4><br>
                        <div >
                          <label class="btn btn-primary">
                          <input type="radio" value="4" name="options" id="option_a1" autocomplete="off" required> Strongly Agree
                          </label>
                          <label class="btn btn-primary">
                          <input type="radio" value="3" name="options" id="option_a2" autocomplete="off" required> Agree
                          </label>
                          <label class="btn btn-primary">
                          <input type="radio" value="2" name="options" id="option_a3" autocomplete="off" required> Disagree
                          </label>
                          <label class="btn btn-primary">
                          <input type="radio" value="1" name="options" id="option_a3" autocomplete="off" required> Strongly Disagree
                          </label>
                        </div>
                      </div>
                    </div> 
                  </div>
                 <input type="hidden" value="'.$row['question_id'].'" name="question_id"/> 
                 <input type="hidden" value="'.$row['riasec'].'" name="riasec"/> 
                 <input type="hidden" value="'.$exam_id.'" name="exam_id"/> 
                 <input type="hidden" value="value" name="category"/> 
                <button type="submit" name="btn_submit4" class="btn btn-success" >NEXT <i class="fas fa-arrow-right"></i></button>
             </center>
          </div>
        </div>
      </div>
</form>';
          }
        }
}
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