<?php
session_start();
//header('location:joinus_html.html');
$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'vio');
$register_username = $_POST['register_username'];
$register_email = $_POST['register_email'];
$register_pass = $_POST['register_pass'];
$register_repass = $_POST['register_repass'];
$s=" select * from register where register_email = '$register_email' ";
$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if($num==1){
    echo "This email is already registered";
    header('location:joinus_html.html');
}
else{
    $reg = "insert into register(register_username,register_email,register_pass,register_repass) values('$register_username','$register_email','$register_pass','$register_repass') "; 
    mysqli_query($con,$reg);
    header('location:joinus_html.html');
}

?>