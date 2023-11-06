<?php
require_once('../connectMySQL.php');
require_once('../loginverification.php');
if(logged_in()){
$session_user_id = $_SESSION['user_id'];

$query = "SELECT * FROM courses WHERE course_id = '".$_POST['course_id']."'";
$result = $conn->query($query);
while($row = $result->fetch_assoc())
{
?> 
<!DOCTYPE html>
<html>
<head>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<form method="post" action="updateCourse.php" enctype="multipart/form-data">
 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="course">Course</label>
        <input class="form-control" type="text" name="course" id="course" value="<?php echo $row['course_name'];?>" required/>
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="riasec">RIASEC</label>
        <select name="riasec" id="riasec" class="form-control">
          <option value="<?php echo $row['riasec'];?>"><?php echo $row['riasec'];?></option>
          <option value="REALISTIC">REALISTIC</option>
          <option value="INVESTIGATIVE">INVESTIGATIVE</option>
          <option value="ARTISTIC">ARTISTIC</option>
          <option value="SOCIAL">SOCIAL</option>
          <option value="ENTERPRISING">ENTERPRISING</option>
          <option value="CONVENTIONAL">CONVENTIONAL</option>
        </select>
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-lg-12 col-12"> 
      <div class="form_group">
        <label for="bread">Image</label><br>
            <b>NOTE: We Accept .jpg .png .gif Files only.</b>
            <div class="form-group">
                Upload Image<br> 
                 <input   type="file" accept="image/png, image/gif, image/jpeg"  name="image" id="image"   />
            </div>
      </div>
    </div> 
  </div> 
  
  <br>
  <div class="row">
        <div class="col-sm-6 col-6"> 
      <div class="form_group">
        <input type="hidden" class="btn btn-success form-control" name="course_id" id="btn_edit" value="<?php $_POST['course_id'];?>"  />
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
<?php
}
}
else
{
   header('location:../index.php');
}
?>