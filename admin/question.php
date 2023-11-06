<?php
include '../connectMySQL.php';
include '../loginverification.php';
if (logged_in()) {
    $session_user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .badge-info {
      color: #fff;
      background-color: #194569;
    }
  </style>
</head>

<body id="main_body">
  <form method="post">
    <h5 class="mb-2 mt-4"></h5>
    <div class="col-lg-12 col-12">
      <div class="small-box badge-info">
        <div class="inner">
          <center>
            <h3>Question</h3>
          </center>
        </div>
        <div class="icon">
          <i class="fas fa-user-plus"></i>
        </div>
        <a href="#top" class="small-box-footer create_question">
          Add Question <i class="fas fa-plus-square"></i>
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
            $query = "SELECT * FROM questionnaire";
            $result = $conn->query($query);

            echo "<div id='successz' class='col-lg-12'>
                  <table class='table table-bordered table-striped dataTable dtr-inline' id='table'>
                  <thead><tr>
                  <th nowrap>Category</th>
                  <th nowrap>Question</th>
                  <th nowrap>RIASEC</th>
                  <th nowrap>Action</th>
                  </tr></thead><tbody>";

            while ($row = $result->fetch_assoc()) {
              echo "<tr role='row'>";
              echo "<td>" . $row['category'] . "</td>";
              echo "<td>" . $row['question'] . "</td>";
              echo "<td>" . $row['riasec'] . "</td>";
              echo ' <td>
                  <a name="view"  id="' . $row["question_id"] . '" class="btn btn-danger question_delete" style="color:white;"><i class="fas  fa-trash" style="color:white;"></i></a>
                  </td>';
            }
            ?>
        </div>
      </div>
  </form>
  <?php
} else {
  header('location:../index.php');
}
?>
</body>

<!--MODAL CREATE ACCOUNT-->
<div class="modal fade" id="modal-default1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-default">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fas fa-question-circle"></i> Add Question</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="createQuestion">

      </div>
    </div>
  </div>
</div>
<!--MODAL-->

<!--MODAL UPDATE ACCOUNT-->
<div class="modal fade" id="modal-default2" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-default">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fas fa-question-circle"></i> Update Question</h4>
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
  $(function() {
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

  $(document).ready(function() {
    $(document).on('click', '.create_question', function() {
      var user_id = $(this).attr("id");
      $.ajax({
        url: "modalCreateQuestions.php",
        method: "POST",
        data: {
          user_id: user_id
        },
        success: function(data) {
          $('#createQuestion').html(data);
          $('#modal-default1').modal('show');
        }
      })
    });

    $(document).on('click', '.question_delete', function() {
      var question_id = $(this).attr("id");

      Swal.fire({
        title: 'Do you want to delete this question?',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        icon: 'warning'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "delete_question.php",
            method: "POST",
            data: {
              question_id: question_id
            },
            success: function(data) {
              location.reload();
            },
            error: function() {
              Swal.fire('Error', 'An error occurred while deleting the question.', 'error');
            }
          });
        }
      });
    });
  });
</script>

</html>
