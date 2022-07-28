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
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart</title>
	<link rel="stylesheet" href="assets/plugin/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>

<body>

<style>
  body{
    align-items: center;
    justify-content: center;
    text-align: center;
    background: aliceblue;
    }

  .total{
    border: black solid 1px;
    width: 190px;
    float: right;
    margin-right: 5rem;
  }
.checkout{
    margin-top: 1rem;
    margin-bottom: 5px;
}
h3{
  text-align: center;
  margin-right: 3rem;
}

</style>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6de2b5;">
    <img src="img/logo/logo-removebg-preview-removebg-preview.png" style="width: 50px; height: 40px; margin-left: 1em;">
    <div class= "container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Layout_home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Tanaman.html">Tanaman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pupuk.html">Pupuk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Pot_bunga.html">Pot Bunga</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu active" id="menuCart" href="cart.html"><i class="fa fa-shopping-cart"></i></a>
          </li>
        </ul>
      </div>
    </div>
 </nav>
 <?php

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql); 
while($row = mysqli_fetch_assoc($result)) {
// echo $row['id'] ." ". $row['name'] ." ". $row['image'] ." ". $row['price']."<br>";
?>
<?php
  }
?>    

      <div class="">
      <h3>List Cart</h3>
        <div id="displayCheckout">
        <?php 
                if(!empty($_SESSION['cart'])){
                    $outputTable = '';
                    $total = 0;
                    $outputTable .= "<table class='table table-bordered'><thead class='head'><tr><td style='width:'''>Nama Barang</td><td>Harga Barang</td><td>Jumlah Barang</td><td>Hapus</td> </tr></thead>";
                    foreach($_SESSION['cart'] as $key => $value){
                        $outputTable .= "<tr><td width='340px'>".$value['p_name']."</td><td width= '350px'>".($value['p_price'] * $value['p_quantity']) ."</td><td width='350px'>".$value['p_quantity']."</td><td><button id=".$value['p_id']." class='btn btn-danger delete'>Delete</button></td></tr>";  
                        $total = $total + ($value['p_price'] * $value['p_quantity']);
                    }
                    $outputTable .= "</table>";
                    $outputTable .= "<div class='text-center total'><b>Total: Rp  ".$total."</b>
                    <a href='checkout.php'><button class='btn btn-primary checkout'>Checkout</button></a>
                    </div>";
                    echo $outputTable;
                }
                  ?>
        </div> 
      </div>


    <script>
    $(document).ready(function() {
         alldeleteBtn = document.querySelectorAll('.delete')
         alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click',deleteINsession)
         })

function deleteINsession(){
    removable_id = this.id;
    $.ajax({
                url:'cart.php',
                method:'POST',
                dataType:'json',
                data:{ 
                      id_to_remove:removable_id,
                      action:'remove' 
                },
                success:function(data){
                        $('#displayCheckout').html(data);
           alldeleteBtn = document.querySelectorAll('.delete')
         alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click',deleteINsession)
         })
                      }
              }).fail( function(xhr, textStatus, errorThrown) {
        alert(xhr.responseText);
    });

}


        $('.add').click(function() { 
            id = $(this).data('id');
            name = $('#name' + id).val();
            price = $('#price' + id).val();
            quantity = $('#quantity' + id).val();
              $.ajax({
                url:'cart.php',
                method:'POST',
                dataType:'json',
                data:{
                      cart_id : id,
                      cart_name : name,
                      cart_price : price,
                      cart_quantity : quantity,
                      action:'add' 
                },
                success:function(data){
                        $('#displayCheckout').html(data);
                        alldeleteBtn = document.querySelectorAll('.delete')
         alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click',deleteINsession)
         })
                      }
              }).fail( function(xhr, textStatus, errorThrown) {
        alert(xhr.responseText);
    });
        
        })
    })
    </script>
</body>
</html>

<?php
mysqli_close($conn);
?>