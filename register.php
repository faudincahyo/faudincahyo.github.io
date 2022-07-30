<?php 
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli ('localhost','root','','register');
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }else{
        if($stmt = $conn->prepare("insert into regis (username,password)
        value(?,?)")){
        $stmt->bind_param("ss",$username,$password);
        $stmt->execute();
            echo "<script>alert('User berhasil ditambahkan'); window.location='index.html'</script>";
            
        exit;
        }
        
    }
?>