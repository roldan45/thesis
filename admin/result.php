<?php
require_once('../connectMySQL.php');
require_once('../loginverification.php');
if(logged_in()){
$session_user_id = $_SESSION['user_id'];
$result_exam = "";

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
    background-color: #0047d8;
}

</style>

<?php 
$sql= sprintf("UPDATE exam_header 
SET 
result = '". $result_exam ."'
WHERE exam_id = '".$_COOKIE['exam_id']."'");
$result = mysqli_query($conn,$sql);
}
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
              
                  $query2 = "SELECT a.*,b.category,b.question FROM exam_child a
                  LEFT JOIN questionnaire b ON b.question_id = a.question_id
                  where a.exam_id = '".$_COOKIE['exam_id']."' and category ='INTEREST' ";
                  $result_interest = $conn->query($query2);
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
                  <h3>ANSWERS : VALUE</h3></center>
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
                  where a.exam_id = '".$_COOKIE['exam_id']."' and category ='VALUE' ";
                  $result_value= $conn->query($query3);
                  while($row_value = $result_value->fetch_assoc())
                  {

                    $checker4 = "";
                    $checker3 = "";
                    $checker2 = "";
                    $checker1 = "";
                    if($row_value['score'] == 4)
                    {
                        $checker4 = "checked";
                    }
                    elseif($row_value['score'] == 3)
                    {
                        $checker3 = "checked";
                    }
                    elseif($row_value['score'] == 2)
                    {
                        $checker2 = "checked";
                    }
                    elseif($row_value['score'] == 1)
                    {
                        $checker1 = "checked";
                    }
                     echo '<div class="row">
                        <div class="col-sm-12 col-12"> 
                          <div class="form_group">
                            <h4>'.$row_value['question'].'</h4><br>
                            <div >
                              <label class="btn btn-primary">
                              <input type="radio" value="4" name="'.$row_value['question_id'].'options" id="option_a1" autocomplete="off" '.$checker4.'> Strongly Agree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="3" name="'.$row_value['question_id'].'options" id="option_a2" autocomplete="off" '.$checker3.'> Agree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="2" name="'.$row_value['question_id'].'options" id="option_a3" autocomplete="off" '.$checker2.'> Disagree
                              </label>
                              <label class="btn btn-primary">
                              <input type="radio" value="1" name="'.$row_value['question_id'].'options" id="option_a3" autocomplete="off" '.$checker1.'> Strongly Disagree
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
                  
                </center><br>
                <center>
               <button  class="btn btn-success" onclick="location.href='review.php';">Submit</button>
      </center>
      
              </div>
            </div>
          </div>
</html>