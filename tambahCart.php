<?php
$nama_barang = $_GET['nama_barang'];
$harga_barang = $_GET['harga_barang'];
$jml = $_POST['jml'];

$conn = new mysqli ('localhost','root','','shoping_cart');
if($conn->connect_error){
    die('Connection failed : '.$conn->connect_error);
}else{
    if($stmt = $conn->prepare("insert into prduct (nama_barang,harga_barang,jml)
    value(?,?,?)")){
    $stmt->bind_param("ssi",$nama_barang,$harga_barang,$jml);
    $stmt->execute();    
    echo "<script>alert('User berhasil ditambahkan'); window.location='loginregis.html'</script>";
    exit;    
    }
}

?>
