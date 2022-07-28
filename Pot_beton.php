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
    <title>Pembayaran</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="page_plant.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  </head>

  <body>
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
              <a class="nav-link menu" id="menuCart" href="shoppingCart.php"><i class="fa fa-shopping-cart"></i></a>
            </li>
          </ul>
        </div>
      </div>
   </nav>

   <?php
      $sql = "SELECT * FROM products where id='14'";
      $result = mysqli_query($conn, $sql); 
      while($row = mysqli_fetch_assoc($result)) {
      // echo $row['id'] ." ". $row['name'] ." ". $row['image'] ." ". $row['price']."<br>";
    ?>    

      <div class="card">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="gambar" src="img/pot5.JPG" class="img-fluid rounded-start" alt="Pot Berbahan Beton">
          </div>
          <div class="col-md-8">

            <div class="card-body" style="align-items: left;">
              <h2><?php echo $row['name']?></h2>
              <h4>Rp. <?php echo $row['price']?></h4>
              <ul>
                <li>Kondisi: Baru</li>
                <li>Kategori: Pot Bunga</li>
                <li>Jenis Pot: Pot Berbahan Beton</li>
                <li>Berat: 10kg</li>
                <li>Pot berbahan beton ini terlihat sangat megah.</li>
                <li>Tampilan yang megah ini dan cantik akan memperindah teras rumah anda</li>
              </ul>
            </div>
            <div class="form-group text-center col-md-2">
            <label>Pilih Banyak Barang:</label>  
            <select class="form-control" id="quantity<?php echo $row['id']?>">
            <center>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>

            </center>
          </select>
          <input type="hidden" id="name<?php echo $row['id']?>" value='<?php echo $row['name']?>'>
          <input type="hidden" id="price<?php echo $row['id']?>" value='<?php echo $row['price']?>'>
          </div>

            <div class="tombol">
              <button type="button" class="btn btn-outline-danger add" data-id="<?php echo $row['id']?>"><i class="fa fa-shopping-cart"></i> Masukkan ke Keranjang</button>
            </div>
            <?php
              }
            ?>
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
                    alert("Barang sudah ada di keranjang")
                    $('#displayCheckout').html(data);
                    alldeleteBtn = document.querySelectorAll('.delete')
     alldeleteBtn.forEach(onebyone => {
        onebyone.addEventListener('click',deleteINsession)
     })
                  }
          })
    
    })
})
</script>
        
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 </body>
 <footer class="footer-bawah">
    <div class="footer-left" >
      <a href="#">Home|</a>
      <a href="#">Tanaman|</a>
      <a href="#">Pupuk|</a>
      <a href="#">Pot Bunga</a><br>

      <img src="img/logo/logo-removebg-preview-removebg-preview.png"  width="px"80 height="120px" style="padding-top: 10px; margin-left: 3rem;">
    </div>

    <div class="footer-center">
      <h3>Hubungi Kami</h3>
      <p ><i class="fa fa-envelope-o" style="color:red;"></i>greenfinger@gmail.com</p>
      <p style="font-size: 14px; color: black;"><i class="fa fa-whatsapp fa-lg" style="color: green;"></i>(+62)81928193183</p> 
      <p style="font-size: 14px; color: black;"><i class="fa fa-facebook-square fa-lg" style="color: #0099CC;"></i> Green Finger</p>
    </div>

    <div class="footer-right ms-auto">
      <h5>Tentang Website</h5>
      <p>
        Website ini menyediakan berbagai perlengkapan tanaman hias,<br> 
        Mulai dari tanaman hias, pupuk, hingga pot bunga. Kami mengedepankan keindahan pada produk kami<br>
        demi membuat rumah anda indah dan asri. 
      </p>
    </div>
  </footer>

</html>