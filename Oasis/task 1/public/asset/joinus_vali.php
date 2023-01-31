<?php
    $register_email=$_POST['register_email'];
    $register_pass=$_POST['register_pass'];
    
    $con = new mysqli("localhost","root","","vio");
    if($con->connect_error){
        die("Falied to connect:" .$con->connect_error);
    }else{
        $stmt=$con->prepare("select * from register where register_email= ?");
        $stmt->bind_param("s",$register_email);
        $stmt->execute();
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows>0){
            $data=$stmt_result->fetch_assoc();
            if($data['register_pass']==$register_pass){
                header('location:vidio_html.html');
            }else{
                echo "Wrong email or password";
            }
        }
    }
?>