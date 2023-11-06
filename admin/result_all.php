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
    <script src='../dist/js/sweetalert2.all.min.js'></script>
    <style>
        .badge-info {
            color: #fff;
            background-color: #194569;
        }
        .btn-primary {
            background-color: #194569;
            border-color: #194569;
        }
        @media print {
            .no-print {
                display: none !important;
            }
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
                        <h3>RESULT OF ALL STUDENT</h3>
                        <img src="logoss.png" alt="Logo" style="display:block; margin:auto; width:200px; height:auto;">
                    </center>
                </div>
                <div class="icon">
                    <i class="fas fa-check"></i>
                </div>

            </div>
        </div>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-12">
                        <h1 class="m-0" id="concernInfo">List </h1>
                        <div class="mt-4 print">
                            <input type="date" id="filterDate" class="form-control" placeholder="Select date">
                            <button type="button" class="btn btn-primary" onclick="applyDateFilter()">Filter</button>
                        </div>

                     

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-12">
                        <h1 class="m-0" id="concernInfo">List </h1>
                        <div class="mt-4 no-print">
                            <button type="button" class="btn btn-primary" onclick="printTable()">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="content">
            <div class="card">
                <div class="card-header border-1">

                    <div class="d-flex flex-row justify-content-end">
                        <?php

                        $query = "SELECT * FROM exam_header a
                        LEFT JOIN users b ON b.user_id = a.user_id";
                        $result = $conn->query($query);

                        echo "<div id='successz' class = 'col-lg-12'>
                        <table class='table table-bordered table-striped dataTable dtr-inline ' id='table'>
                        <thead>
                        
                            <tr>
                                <th nowrap>Name</th>
                                <th nowrap>Recommended Course</th>
                                <th nowrap>Date of Exam</th>
                                <th nowrap>Feedback</th>
                            </tr>
                        </thead>
                        <tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr role='row'>";
                            echo "<td>" . $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] . "</td>";
                            echo "<td>" . $row['course_name'] . "</td>";
                            
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['feedback'] . "</td>";
                        }

                        echo "</tbody></table>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
} else {
    header('location:../index.php');
}
?>
</body>

<!--MODAL-->
<div class="modal fade" id="modal-default1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-graduation-cap"></i> VIEW RESULT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="resultDetails">

            </div>
        </div>
    </div>
</div>
<!--MODAL-->

<script>
    $(function () {
  var table = $("#table").DataTable({
    "responsive": true,
    "autoWidth": false,
    "destroy": true,
    "order": [[3, "asc"]],
    "initComplete": function () {
      $(".sortable").on("click", function () {
        var column = $(this).data("sort");
        var order = $(this).hasClass("asc") ? "desc" : "asc";
        $(".sortable").removeClass("asc desc");
        $(this).addClass(order);
        $(".sort-icon").html("");
        $(this).find(".sort-icon").html(order === "asc" ? "&uarr;" : "&darr;");
        table.order([column, order]).draw();
      });
    }
  });

  $('#filterDate').on('change', function () {
    var filterDate = $(this).val();
    table.columns(2).search(filterDate).draw();
  });

  $('#searchInput').on('input', function () {
    var searchValue = $(this).val();
    table.search(searchValue).draw();
  });

  $('#searchForm').on('submit', function (event) {
    event.preventDefault();
  });

  $('#searchInput').on('change', function () {
    if ($(this).val() === '') {
      table.search('').draw();
    }
  });
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

    function printTable() {
        var name = "RESULT OF ALL STUDENT ";
        var printContents = '<h2 style="text-align:center">' + name + '</h2>';
        printContents += '<img src="logoss.png" alt="Logo" style="display:block; margin:auto; width:200px; height:auto;">';
        printContents += document.getElementById("table").outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

    function applyDateFilter() {
        var filterDate = document.getElementById("filterDate").value;
        var table = $("#table").DataTable();

        table.columns(3).search(filterDate).draw();
    }
    
    $(document).ready(function () {
        $(document).on('click', '.view_result', function () {
            var exam_id = $(this).attr("id");
            document.cookie = "exam_id=" + exam_id;
            $.ajax({
                url: "result.php",
                success: function (data) {
                    $('#resultDetails').html(data);
                    $('#modal-default1').modal('show');
                }
            });
        });
    });
</script>
</html>
