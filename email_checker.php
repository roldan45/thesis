<?php
include 'connectMySql.php';
$verify=0;
$query = "SELECT * FROM users where email_address = '".$_POST['email']."' or username = '".$_POST['username']."' or contact_number = '".$_POST['contact_number']."' ";
$result = $conn->query($query);
while($row = $result->fetch_assoc())
{
$verify=1;
}

if($verify!=1)
{
    echo '<input type="submit" class="btn btn-success form-control" name="btn_edit" id="btn_edit" value="SAVE" />';
}
else
{
     echo '<span style="color:red;">Input Already Used.</span>';
}
?>