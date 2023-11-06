<?php
include '../connectMySQL.php';
$question_id = $_POST['question_id'];
$query = "select * from questionnaire where question_id = '$question_id'";
    $result = $conn->query($query);
        while($row = $result->fetch_assoc())
        {
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
<form method="post" action="insertQuestion.php" enctype="multipart/form-data">
  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
          <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
          <option value="INTEREST">INTEREST</option>
          <option value="VALUE">VALUE</option>
          <option value="SKILL">SKILL</option>
        </select>
      </div>
    </div> 
  </div> 

  <div class="row">
    <div class="col-sm-12 col-12"> 
      <div class="form_group">
        <label for="question">Question</label>
        <textarea class="form-control" type="text" row="3" name="question" id="question" required><?php echo $row['question'];?></textarea>
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
<?php
}
?>
</html>

