<?php
require_once('../connectMySQL.php');
require_once('../loginverification.php');
if(logged_in()){
$session_user_id = $_SESSION['user_id'];
$result_exam = "";



$query = "SELECT riasec,result FROM (SELECT riasec,SUM(score) as result FROM exam_child WHERE exam_id = '".$_COOKIE['exam_id']."' GROUP BY riasec) a
WHERE result = (SELECT MAX(result) FROM (SELECT riasec,SUM(score) as result FROM exam_child WHERE exam_id = '".$_COOKIE['exam_id']."' GROUP BY riasec) a)";
$result1 = $conn->query($query);
while($row = $result1->fetch_assoc())
{
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
  label {
  pointer-events: none;
}
.badge-info {
    color: #fff;
    background-color: #194569;
}
/* '.$row['riasec'].'<br> ito yung sa recommended course sa taas ginawa kung comment */
</style>
<body id="main_body">
<form method="post">  
<?php  echo '
<h5 class="mb-2 mt-4"></h5>
<div class="col-lg-12 col-12">
    <div class="small-box badge-info">
        <div class="inner"><center>
            <h3> Recommended Course</h3></center>
        </div>
        <div class="icon">
          <i class="fas fa-edit"></i>
        </div>
       <center>Base on your answer for taking this exam, this course is recommended for you.</center><br>
        <a href="#top" class="small-box-footer add_feedback">
                <i class="fas fa-edit"></i> Feedback
         </a>
    </div>
</div>
<div class="card">
<div class="card-body">
<div class="card card-success">
<div class="card-body">
<div class="row">';
$result_exam = $result_exam.''.$row['riasec'].',';
$query1 = "SELECT * FROM courses WHERE riasec = '".$row['riasec']."'";
$query2 = "SELECT course_name FROM exam_child WHERE exam_id = '" . $_COOKIE['exam_id'] . "'";

$result2 = $conn->query($query1);
while($row2 = $result2->fetch_assoc())
{
    echo ' 
<div class="col-md-12 col-lg-6 col-xl-4">
<div class="card mb-2 bg-gradient-red">
<center><img class="card-img-top" src="../dist/img/courses/'.$row2['image'].'" alt="Dist Photo 1"><center>
<div class="card-img d-flex flex-column justify-content-end">
<h5 class="card-title text-primary text-white">'.$row2['course_name'].'</h5>
 
</div>
</div>
</div>
 ';
 $courseName = $row2['course_name'];
    $updateQuery = "UPDATE exam_header SET course_name = '$courseName' WHERE exam_id = '" . $_COOKIE['exam_id'] . "'";
    $conn->query($updateQuery);
   
}
  echo '
</div>
</div>
</div>
</div>
</div>';
?>


<h5 class="mb-2 mt-4"></h5>
      <div class="col-lg-12 col-12">
          <div class="small-box badge-info">
              <div class="inner"><center>
                  <h3>ANSWERS : INTEREST</h3></center>
              </div>
          </div>
      </div>
          <div class="card">
            <div class="card-body">
              <div id="questions">
                <center>
                 <?php
              
                  $query3 = "SELECT a.*,b.category,b.question FROM exam_child a
                  LEFT JOIN questionnaire b ON b.question_id = a.question_id
                  where a.exam_id = '".$_COOKIE['exam_id']."' and category ='INTEREST' ";
                  $result_interest= $conn->query($query3);
                  while($row_interest = $result_interest->fetch_assoc())
                  {

                    $checker4 = "";
                    $checker3 = "";
                    $checker2 = "";
                    $checker1 = "";
                    if($row_interest['score'] == 4)
                    {
                        $checker4 = "checked";
                    }
                    elseif($row_interest['score'] == 3)
                    {
                        $checker3 = "checked";
                    }
                    elseif($row_interest['score'] == 2)
                    {
                        $checker2 = "checked";
                    }
                    elseif($row_interest['score'] == 1)
                    {
                        $checker1 = "checked";
                    }
                     echo '<div class="row">
                        <div class="col-sm-12 col-12"> 
                          <div class="form_group">
                            <h4>'.$row_interest['question'].'</h4><br>
                            <div >
                              <label class="btn btn-primary">
                              <input type="radio" value="4" name="'.$row_interest['question_id'].'options" id="option_a1" autocomplete="off" '.$checker4.'> Strongly Agree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="3" name="'.$row_interest['question_id'].'options" id="option_a2" autocomplete="off" '.$checker3.'> Agree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="2" name="'.$row_interest['question_id'].'options" id="option_a3" autocomplete="off" '.$checker2.'> Disagree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="1" name="'.$row_interest['question_id'].'options" id="option_a3" autocomplete="off" '.$checker1.'> Strongly Disagree
                              </label>
                            </div>
                          </div>
                        </div> 
                      </div>';

                  }

                  ?>
                </center>
              </div>
            </div>
          </div>

<h5 class="mb-2 mt-4"></h5>
      <div class="col-lg-12 col-12">
          <div class="small-box badge-info">
              <div class="inner"><center>
                  <h3>ANSWERS : SKILL</h3></center>
              </div>
          </div>
      </div>
          <div class="card">
            <div class="card-body">
              <div id="questions">
                <center>
                 <?php
              
                  $query4 = "SELECT a.*,b.category,b.question FROM exam_child a
                  LEFT JOIN questionnaire b ON b.question_id = a.question_id
                  where a.exam_id = '".$_COOKIE['exam_id']."' and category ='SKILL' ";
                  $result_skill= $conn->query($query4);
                  while($row_skill = $result_skill->fetch_assoc())
                  {

                    $checker4 = "";
                    $checker3 = "";
                    $checker2 = "";
                    $checker1 = "";
                    if($row_skill['score'] == 4)
                    {
                        $checker4 = "checked";
                    }
                    elseif($row_skill['score'] == 3)
                    {
                        $checker3 = "checked";
                    }
                    elseif($row_skill['score'] == 2)
                    {
                        $checker2 = "checked";
                    }
                    elseif($row_skill['score'] == 1)
                    {
                        $checker1 = "checked";
                    }
                     echo '<div class="row">
                        <div class="col-sm-12 col-12"> 
                          <div class="form_group">
                            <h4>'.$row_skill['question'].'</h4><br>
                            <div >
                              <label class="btn btn-primary">
                              <input type="radio" value="4" name="'.$row_skill['question_id'].'options" id="option_a1" autocomplete="off" '.$checker4.'> Strongly Agree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="3" name="'.$row_skill['question_id'].'options" id="option_a2" autocomplete="off" '.$checker3.'> Agree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="2" name="'.$row_skill['question_id'].'options" id="option_a3" autocomplete="off" '.$checker2.'> Disagree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="1" name="'.$row_skill['question_id'].'options" id="option_a3" autocomplete="off" '.$checker1.'> Strongly Disagree
                              </label>
                            </div>
                          </div>
                        </div> 
                      </div>';

                  }

                  ?>
                </center>
              </div>
            </div>
          </div>

<h5 class="mb-2 mt-4"></h5>
      <div class="col-lg-12 col-12">
          <div class="small-box badge-info">
              <div class="inner"><center>
                  <h3>ANSWERS : OBSERVATION</h3></center>
              </div>
          </div>
      </div>
          <div class="card">
            <div class="card-body">
              <div id="questions">
                <center>
                 <?php
              
                  $query5 = "SELECT a.*,b.category,b.question FROM exam_child a
                  LEFT JOIN questionnaire b ON b.question_id = a.question_id
                  where a.exam_id = '".$_COOKIE['exam_id']."' and category ='OBSERVATION' ";
                  $result_observation= $conn->query($query5);
                  while($row_observation = $result_observation->fetch_assoc())
                  {

                    $checker4 = "";
                    $checker3 = "";
                    $checker2 = "";
                    $checker1 = "";
                    if($row_observation['score'] == 4)
                    {
                        $checker4 = "checked";
                    }
                    elseif($row_observation['score'] == 3)
                    {
                        $checker3 = "checked";
                    }
                    elseif($row_observation['score'] == 2)
                    {
                        $checker2 = "checked";
                    }
                    elseif($row_observation['score'] == 1)
                    {
                        $checker1 = "checked";
                    }
                     echo '<div class="row">
                        <div class="col-sm-12 col-12"> 
                          <div class="form_group">
                            <h4>'.$row_observation['question'].'</h4><br>
                            <div >
                              <label class="btn btn-primary">
                              <input type="radio" value="4" name="'.$row_observation['question_id'].'options" id="option_a1" autocomplete="off" '.$checker4.'> Strongly Agree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="3" name="'.$row_observation['question_id'].'options" id="option_a2" autocomplete="off" '.$checker3.'> Agree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="2" name="'.$row_observation['question_id'].'options" id="option_a3" autocomplete="off" '.$checker2.'> Disagree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="1" name="'.$row_observation['question_id'].'options" id="option_a3" autocomplete="off" '.$checker1.'> Strongly Disagree
                              </label>
                            </div>
                          </div>
                        </div> 
                      </div>';

                  }

                  ?>
                  
                </center>

      
              </div>
            </div>
          </div>
               




</form>

    <!--MODAL-->
<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-default">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fas fa-edit"></i> Feedback</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body" id="feedbackDetail"> 
       
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div> 
</div>



<?php 

$sql= sprintf("UPDATE exam_header 
SET 
result = '". $result_exam ."'
WHERE exam_id = '".$_COOKIE['exam_id']."'");
$result = mysqli_query($conn,$sql);
}

?>

<?php
}
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
<script>
$(document).ready(function(){ 
$(document).on('click', '.add_feedback', function(){
//$('#dataModal').modal();
$.ajax({
 url:"modalFeedback.php",
 success:function(data){
  $('#feedbackDetail').html(data);
  $('#modal-default').modal('show');
 }
})
})
});
</script>