<?php
session_start();
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoping_cart";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Checkout</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="my.css">

  </head>

  <body> 
    <style>
       .total{
        margin-top: 2rem;
        margin-bottom: 1rem;
       }
       
       @media print{
        .btn{
          display: none;
        } 
        .codeBox{
          background: aquamarine !important; 
        }
      }
       
    </style>
    <div class="box-checkout">   

      <h4>Masukan Alamat</h4>
      <p></p>
      <label>Nama</label>
      <input  calss="form-check-input" type="text" placeholder="Masukkan nama lengkap" style="margin-left: 5.5rem;" required ="required">
      </p>
      <p>
      <label>Alamat</label>
      <input type="text"style="margin-left: 5rem;" required/>
      </p>
      <p>
        <label>Kota</label>
        <input type="text" style="margin-left: 6rem; " required/>
      </p>
      <p>
        <label>Provinsi</label>
        <input type="text" style="margin-left: 4.5rem;" required/>
      </p>
      <p>
        <label> Kode Pos</label> 
        <input type="number" style="margin-left: 4rem;" required/>
      </p>

    </div>

    <div class="box-produk">
      <h4 style="padding-left: 1rem;">Pesanan</h4>
    <div class="gambar-produk" style="margin-left: 3rem;">
      <?php
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql); 
        while($row = mysqli_fetch_assoc($result)) {
        // echo $row['id'] ." ". $row['name'] ." ". $row['image'] ." ". $row['price']."<br>";
      ?>
      <?php
        }
      ?>
      
      <div class="col-md-1">

            </div>
            <div class="col-md-4">
            <div id="displayCheckout">
            <?php 
                if(!empty($_SESSION['cart'])){
                    $outputTable = '';
                    $total = 0;
                    $outputTable .=   "<table class='table'><thead><tr><td  width='200px'>Name</td><td  width='200px'>Quantity</td><td  width='200px'>Price</td></tr></thead>";
                    foreach($_SESSION['cart'] as $key => $value){
                        $outputTable .= "<tr style='margin='auto''><td width='200px'>".$value['p_name']." </td><td width='200px'>".$value['p_quantity']."</td><td width='200px'>".($value['p_price'] * $value['p_quantity']) ."</tr>";  
                        $total = $total + ($value['p_price'] * $value['p_quantity']);
                    }
                    $outputTable .= "</table>";
                    $outputTable .= "<div class=' text-center total'><b>Total:Rp " .$total."</b></div>";
                    echo $outputTable;
                }
            ?>
            </div> 
      </div>


    <div class="metode">
      <h4>Metode Pembayaran</h4>
      <div class="metopem">
        <input type="checkbox" id="alfa">
        <img src="icon/alfamart.png" alt="alfamart" style="width: 100px;">
        <input type="checkbox" id="indo">
        <img src="icon/indomaret.png" alt="indomaret" style="width:100px; margin-bottom: 5px;">
        <input type="checkbox" id="bank_br">
        <img src="icon/bri.png" alt="BRI" style="width: 100px; height: 55px;">
        <input type="checkbox" id="bank_bn">
        <img src="icon/bni.png" alt="BNI" style="width: 100px; height: 55px;">
    </div>


    <div class="tombol-checkout">
      <h4>Total Pembayaran</h4>
      <?php echo "<div class='total' style='margin-left='1rem''><h4>Rp " .$total."</h4></div>"
      ?>
      <div class="info-button">

        <a href="paymentcode.php"><button class="btn btn-danger" style="border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Pesanan</button></a>
      </div>
    </div>
    
  

    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>