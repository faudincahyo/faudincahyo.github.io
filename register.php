<?php 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli ('localhost','u574292999_root','1vZuS^=9w=P','u574292999_register');
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }else{
        if($stmt = $conn->prepare("insert into regis (username,email,password)
        value(?,?,?)")){
        $stmt->bind_param("sss",$username,$email,$password);
        $stmt->execute();
            echo "<script>alert('User berhasil ditambahkan'); window.location='index.html'</script>";
            
        exit;
        }
        
    }
?>