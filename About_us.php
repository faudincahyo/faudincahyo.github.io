<!doctype html>
<html lang="en">
  <head>
    <title>About Us</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="awal.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

                
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#6de2b5">
      <img src="img/logo/logo-removebg-preview-removebg-preview.png" style="width: 50px; height: 40px; margin-left: 1em;">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Login & Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
          </ul>
        </div>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> 
          <button class="btn btn-outline-success" type="submit"><span class="fa fa-search"></span></button>
        </form>
      </div>
    </nav>
      <Section>
    <H3>1. Product</H3>
    <p>Produk yang ada di website kami adalah produk mengenai berbagai tanaman hias.
        Anda dapat membeli ataupun menjual tanaman hias beserta dengan keperluan tanaman hias yang anda perlukan,
        mulai dari tanaman yang cocok untuk rumah anda, pupuk tanaman, pot yang cantik, hingga bibit tanaman yang dapat
        anda tanam sendiri dirumah. 
    </p>

    <h3>2. Visi</h3>
    <p>Melihat produk yang kami tawarkan dalam website kami, maka kami mengedepankan prinsip Go-Green.
       Prinsip ini banyak dipakai dalam bidang agrikultur, karena dengan prinsip ini banyak masyarakat yang akan
       menanam banyak tanaman untuk melindungi bumi kita dari pemanasan global. 
    </p>

    <h3>3. Misi</h3>
    <p>memperbanyak tanaman di pekarangan rumah sebagai promosi Go-Green bagi masyarakat.
      Banyak tanaman pada pekarangan rumah diharapkan dapat memperbaiki lingkungan kita, 
      apalagi dengan maraknya berita tentang Global Warming. Kami mengharapkan penanaman 
      banyak tumbuhan pada setiap sudut kota untuk mengurangi dampak Global Warming tersebut.
    </p>
    <h3>4. Hubungi Kami</h3>
    <p>Anda dapat memberikan saran, kritik serta masukan pada form dibawah ini.</p>
    <p>
    <?php if(!empty($statusMsg)){ ?>
        <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
    <?php } ?>
    <form action="" method="post">
    <p style="margin-right:2rem ;">
      <label>Nama :</label>
      <input type="text" name="name" style="margin-left: 3rem;" required/>
    </p>
    <p>
      <label>E-mail :</label>
      <input type="email" name="email" style="margin-left: 2.8rem;" required/>
    </p>
    <textarea placeholder="Ketikan pesan Anda" name="message" style="resize:both;width: 500px; height: 250px;" required></textarea>
  
    <button name="submit" class="btn btn-primary" style="margin-left: 24rem; width:115px; margin-top: 10px;">Kirim</button>
    </form>
    </Section>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"> </script>
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
      <p ><i class="fa fa-envelope-o" style="color:red;"></i>fingergreen6@gmail.com</p>
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

<?php
$notify = '';
$notifyClass = '';
  
if(isset($_POST['submit'])){
    // Membuat variabl untuk menerima data dari form
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];
  
    // Cek apakah ada data yang belum diisi
    if(!empty($email) && !empty($name) && !empty($message)){
  
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $notify = 'Email Anda salah. Silakan ketikan alamat email yang benar.';
            $notifyClass = 'errordiv';
        }else{
            // Pengaturan penerima email dan subjek email
            $toEmail = 'fingergreen6@gmail.com'; // Ganti dengan alamat email yang Anda inginkan
            $emailSubject = 'Pesan website dari '.$name;
            $nameEmail = '<h4>'.$name.'</h4>';
            $htmlContent = '<h2>Feedback Pengunjung</h2>
                <p>'.$message.'</p>';
  
            // Mengatur Content-Type header untuk mengirim email dalam bentuk HTML
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  
            // Header tambahan
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
  
            // Kirim email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
            echo "<script>alert('Email Berhasil');</script>";
            $notifyClass = 'succdiv';
            }else{
                $notify = 'Maaf pesan Anda gagal terkirim, silahkan ulangi lagi.';
                $notifyClass = 'errordiv';
            }
        }
    }else{
        $notify = 'Harap mengisi semua field data';
        $notifyClass = 'errordiv';
    }
}
?>