<?php
include '../connectMySQL.php';
include '../loginverification.php';
if(logged_in()){
    $session_user_id = $_SESSION['user_id'];
    $session_username = $_SESSION['username'];
    $session_password = $_SESSION['password'];
    $session_first_name = $_SESSION['first_name'];
    $session_middle_name = $_SESSION['middle_name'];
    $session_last_name = $_SESSION['last_name'];
    $session_email_address = $_SESSION['email_address'];
    $session_contact_number = $_SESSION['contact_number'];
    $session_account_type = $_SESSION['account_type'];
    $message_panel="";

    if($session_account_type == '3')
    {
      $message_panel = "convo.php";
    }
    else
    {
      $message_panel = "message.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Career Course Assessment</title>
  <link rel="icon" type="image/x-icon" href="../dist/img/logo.jpg">
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

  <style>
  .brand-link {
  display: flex;
  align-items: center;
}

.brand-link img {
  width: 250px;
  height: 60px; 
}

</style>

</head>
<style>
  [class*=sidebar-dark-] {
    background-color: #194569;
}

</style>
<body id="main_body" class="hold-transition sidebar-mini ">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- brand logo -->
  <a href="https://www.facebook.com/ACLCCollegeStaMaria/" onclick="load_newsfeed()" class="brand-link">
  <img src="logoss.png" alt="Career Course Assessment Logo">
</a>
    <a href="#" onclick="load_profile()" class="brand-link">
      <span class="brand-text font-weight-light"><?php echo $session_first_name.' '.$session_last_name;?></span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if($session_account_type == '1')
        {
          echo '
          <li class="nav-item">
            <a href="#" onclick="load_user()" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>';
        }
        ?>
         
       

        <?php if($session_account_type == '1')
        {
          echo '
          <li class="nav-item">
            <a href="#" onclick="load_question()" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Questions
              </p>
            </a>
          </li>';
        }
          ?>


        <?php if($session_account_type == '1')
        {
          echo '
          <li class="nav-item">
            <a href="#" onclick="load_courses()" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Courses
              </p>
            </a>
          </li>';

        }?>

        <?php if($session_account_type == '1'||$session_account_type == '2')
        {
          echo '
           <li class="nav-item">
            <a href="#" onclick="load_result()" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                List of Examinee
              </p>
            </a>
          </li>';
        }
          ?>

        <?php if($session_account_type == '3') 
        {
          $query = "SELECT * FROM exam_header where user_id = '".$session_user_id."'";
          $result = $conn->query($query);
          if ($result->num_rows > 0) 
          {
            while($row = $result->fetch_assoc())
            {
              setcookie('exam_id', $row['exam_id']);
            }
            echo '<li class="nav-item">
              <a href="#" onclick="load_exam_result()" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  EXAM RESULT
                </p>
              </a>
            </li>';
          }
          else
          {
             echo '<li class="nav-item">
              <a href="#"  id="start_exam" onclick="load_exam()" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  EXAM
                </p>
              </a>
            </li>';
          }
        }
          ?>

          <li class="nav-item">
            <a href="../logout.php" class="nav-link">
              <i class="far fas fa-power-off nav-icon"></i>
              <p>Log-out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <script>
       function load_user() {
                  document.getElementById("pgm1").innerHTML='<object type="text/html" data="user.php" width="100%" height="100%"></object>';
                  }
       function load_question() {
                  document.getElementById("pgm1").innerHTML='<object type="text/html" data="question.php" width="100%" height="100%"></object>';
                  }
      function load_courses() {
                  document.getElementById("pgm1").innerHTML='<object type="text/html" data="courses.php" width="100%" height="100%"></object>';
                  }
      function load_exam() {
                  document.getElementById('start_exam').hidden = true;
                  document.getElementById("pgm1").innerHTML='<object type="text/html" data="exam.php" width="100%" height="100%"></object>';
                  }
                  
     function load_exam_result() {
                  document.getElementById("pgm1").innerHTML='<object type="text/html" data="result.php" width="100%" height="100%"></object>';
                  }
    function load_result() {
                  document.getElementById("pgm1").innerHTML='<object type="text/html" data="result_all.php" width="100%" height="100%"></object>';
                  }
      </script>
      <style>
                    .container-outer { width: 100%;
                                       height: 800px;
                                      margin: auto;
                                      
                                    }
                    
      </style>
      <div class="container-outer"  id="pgm1">
      <img src="aclcpic.png" alt="image" style="width: 100%"; height:100%; object-fit:cover;>
      </div>
    </section>
    
  </div>
</div>
</body>

<!--MODAL-->
<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-default">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fas fa-envelope"></i> Message</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body"> 
       <form method="post" id="messageDetail">

       </form>
     </div>
   </div>
 </div> 




<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "bDestroy": true,
    });
    $('#example2').DataTable({
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
  $(document).on('click', '.view_message', function(){
  //$('#dataModal').modal();
  var ticket_id = $(this).attr("id");
  $.ajax({
   url:"../tickets/messages.php",
   method:"POST",
   data:{ticket_id:ticket_id},
   success:function(data){
    $('#messageDetail').html(data);
    $('#modal-default').modal('show');
   }
  })
 })
});
</script>

<?php
}
else{
  header('location:../index.php');
}
?>
</html>
