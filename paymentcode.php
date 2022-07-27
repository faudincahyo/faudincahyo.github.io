<?php
session_start();
  
$servername = "localhost";
$username = "u574292999_barang";
$password = "Pelupa7520?";
$dbname = "u574292999_data_barang";

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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="paymentForm.css">


  </head>
  <?php
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql); 
        while($row = mysqli_fetch_assoc($result)) {
        // echo $row['id'] ." ". $row['name'] ." ". $row['image'] ." ". $row['price']."<br>";
      ?>
      <?php
        }
      ?>
  <body>
    
    <style>
      .desc{
        margin-left: rem;
        
      }
      .total{
        margin-top: 2rem;
        margin-bottom: 1rem;
        margin-left: 15.3rem;
        background-color: gray;
      }
      .total b{
        margin-bottom: 2rem;
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
    
<div id="invoice">
    <div class="codeBox">
      <h3>Kode Pembayaran</h3>
      <div class="code">
    <?php
  
    $a = rand (10000,40000);
    $b = rand(500,10000);
    
    echo "$a" . "$b";
    ?>
    </div>
    <p>Silahkan Melakukan Pembayaran Menggunakan Kode di Atas</p>
    </div>
    <div class="descPay">
      <h4>Rincian Harga</h4>
      <div class="descBarang">

        <div class="col-md-4 text-center desc">
        <div id="displayCheckout">
        <?php 
                if(!empty($_SESSION['cart'])){
                    $outputTable = '';
                    $total = 0;
                    $outputTable .="<table class='table border='1px solid black''><thead><tr><td width='200px'>Nama_Barang</td><td width='200px'>Jumlah_barang</td><td width='200px'>Harga</td></tr></thead>";
                    foreach($_SESSION['cart'] as $key => $value){
                        $outputTable .= "<tr style='margin='auto''><td width='200px'>".$value['p_name']." </td><td width='200px'>".$value['p_quantity']."</td><td width='200px'>".($value['p_price'] * $value['p_quantity']) ."</tr>";  
                        $total = $total + ($value['p_price'] * $value['p_quantity']);
                    }
                    $outputTable .= "</table>";
                    $outputTable .= "<div class='text-center total'><b>Total " .$total."</b></div>";
                    echo $outputTable;
                }
            ?>
            </div> 
            </div>
        </div>  
     </div>
      </div>
    </div>

    <div class="keterangan">
    <h5 style="margin: auto;">Cara Melakukan Pembayaran di Minimarket</h5>
      <div class="desc">
      1. Pembayaran lewat minimarket <br>
      2. Pergi ke minimarket terdekat <br>
      3. Berikan kode pembayaran kepada kasir <br>
      <br>
      </div>

    <h5>Cara Melakukan Pembayaran Melalui ATM</h5>
      <div class="desc">
      1. masukkan Pin ATM anda <br>
      2. Pilih menu Transaksi <br>
      3. masukkan kode 002 <br>
      4. Lakukan transaksi pembayaran <br>
      </div>
    </div>
<button onclick="window.print()" type="button" id="cetak" class="btn btn-success" style="width: 100px; float:right; margin-top: 10px; margin-right: 28.3rem;" target="_blank"><i class="fa fa-print" ></i>Print</button>
</div>

</body>
</html>