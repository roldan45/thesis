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
<form method="post">
<h5 class="mb-2 mt-4"></h5>
<div class="col-lg-12 col-12">
    <div class="small-box badge-info">
        <div class="inner"><center>
            <h3>Courses</h3></center>
        </div>
        <div class="icon">
          <i class="fas fa-user-plus"></i>
        </div>
        <a href="#top" class="small-box-footer create_courses">
                Add Courses <i class="fas fa-plus-square"></i>
         </a>
    </div>
</div>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-12">
                <h1 class="m-0" id="concernInfo">List </h1>
            </div>
        </div>
    </div>
</div>


<div class="content">
            <div class="card">
              <div class="card-header border-1">
              
                <div class="d-flex flex-row justify-content-end">
                      <?php
              
                  $query = "SELECT * FROM courses";
                  $result = $conn->query($query);

                  echo "<div id='successz' class = 'col-lg-12'>
                  <table class='table table-bordered table-striped dataTable dtr-inline ' id='table'>
                  <thead><tr>
                  <th nowrap>Course</th>
                  <th nowrap>RIASEC</th>
                  <th nowrap>IMAGE FILENAME</th>
                  <th nowrap>Action</th>
                  </tr></thead><tbody>";

                  while($row = $result->fetch_assoc())
                  {
                  echo "<tr role='row'>";
                  echo "<td>" . $row['course_name'] . "</td>";
                  echo "<td>" . $row['riasec'] . "</td>";
                  echo "<td>" . $row['image'] . "</td>";
                  echo ' 
                  <td>
                  <a name="view"  id="'.$row["course_id"].'" class="btn btn-info update_courses" style="color:white;"><i class="fas fa-edit" style="color:white;"></i></a> 

                  <a name="view"  id="'.$row["course_id"].'" class="btn btn-danger course_delete" style="color:white;"><i class="fas  fa-trash" style="color:white;"></i></a>
                  </td>';
                  }
                  ?>
</form>
<?php }
else
{
  header('location:../index.php');
}?>
</body>

<!--MODAL CREATE ACCOUNT-->
<div class="modal fade" id="modal-default1" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-default">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fas fa-graduation-cap"></i> Add Course</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body" id="coursesDetails"> 
       
     	</div>
   </div>
 </div> 
</div>

<!--MODAL UPDATE ACCOUNT-->
<div class="modal fade" id="modal-default2" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-default">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fas fa-question-circle"></i> Update Course</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body" id="updateQuestion"> 
       
     	</div>
   </div>
 </div> 
</div>
<!--MODAL-->
<script>
  $(function () {
    $("#table").DataTable({
      "responsive": true,
      "autoWidth": false,
      "bDestroy": true,
    });
    $('#table1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
 $(document).ready(function(){ 
  $(document).on('click', '.create_courses', function(){
  var course_id = $(this).attr("id");
  $.ajax({
   url:"modalCreateCourses.php",
   method:"POST",
   data:{course_id:course_id},
   success:function(data){
    $('#coursesDetails').html(data);
    $('#modal-default1').modal('show');
   }
  })
 })
});

  $(document).ready(function(){ 
  $(document).on('click', '.update_courses', function(){
  var course_id = $(this).attr("id");
  document.cookie = "course_id="+course_id;
  $.ajax({
   url:"modalGetCourses.php",
   method:"POST",
   data:{course_id:course_id},
   success:function(data){
    $('#coursesDetails').html(data);
    $('#modal-default1').modal('show');
   }
  })
 })
});

$(document).ready(function() {
  $(document).on('click', '.course_delete', function() {
    var course_id = $(this).attr("id");
    
    Swal.fire({
      title: 'Do you want to delete this course?',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      cancelButtonText: 'Cancel',
      confirmButtonColor: '#dc3545',
      cancelButtonColor: '#6c757d',
      icon: 'warning'
    }).then((result) => {
      if (result.isConfirmed) {
        // Send an AJAX request to delete the course
        $.ajax({
          url: "delete_course.php",
          method: "POST",
          data: { course_id: course_id },
          success: function(data) {
            // Reload the table after successful deletion
            $('#table').DataTable().ajax.reload();
            Swal.fire('Course deleted!', '', 'success');
          },
          error: function(xhr, status, error) {
            Swal.fire('Error', 'An error occurred while deleting the course.', 'error');
          }
        });
      }
    });
  });
});

</script>
</html>