<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = new mysqli("localhost","root","","register");
    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);
    }else{
        $stmt = $con->prepare("select * from regis where username = ?");
        $stmt->bind_param("s",$username );
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if( $data['password'] == $password){
                header("Location: ../Layout_home.html");
                exit; 
            }else{
                echo "<script>alert('Username atau Password yang Anda Masukkan Salah'; window.location='loginregis.html')</script>";
                
            }
        }else{
            echo "<script>alert('Username atau Password yang Anda Masukkan Salah'; window.location='loginregis.html';)</script>";
        }
    }
?>
