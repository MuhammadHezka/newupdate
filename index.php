<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Perpustakaan Ujung Planet</title>
    <link rel="icon" href="assets/library Book Sale.png" type="image/png">
  </head>
  <body>
   <style>
    body{
      background-image: url('assets/imgbg.jpg');
     
    }
   </style>
    <!--Navbar-->
    
   
    
  
<br>
<div class="container" >
<div class="d-grid justify-content-end" >
<a class=" btn btn-success mt-1" href="sign/link_login.html"><i class="fa fa-user"> </i> Masuk akun</a>
</div>
</div>



   
 <br/>
 <div class="container">
<img src="assets/you!.jpg" class="card-img-top rounded" height="300" width="400" alt="" srcset="">
<form action="" method="post" class="mt-2">
       <div class="input-group d-flex justify-content-end mb-5">
         <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="cari judul atau kategori...">
         <button class="border border-start-3 bg-outline-primary rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
       
      </form>

</div>
 
    <section id="homeSection" class="p-5">
      <div class="d-flex flex-wrap justify-content-center">
        <div class="col mt-5">
        
          <?php 
          
          require "config/config.php";
          // query read semua buku
          $buku = queryReadData("SELECT * FROM buku ORDER BY id_buku desc");
          //search buku
          if(isset($_POST["search"]) ) {
            $buku = search($_POST["keyword"]);
          }
          //read buku informatika
          if(isset($_POST["informatika"]) ) {
          $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'informatika'");
          }
          //read buku bisnis
          if(isset($_POST["bisnis"]) ) {
          $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'bisnis'");
          }
          //read buku filsafat
          if(isset($_POST["filsafat"]) ) {
          $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'filsafat'");
          }
          //read buku novel
          if(isset($_POST["novel"]) ) {
          $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'novel'");
          }
          //read buku sains
          if(isset($_POST["sains"]) ) {
          $buku = queryReadData("SELECT * FROM buku WHERE kategori = 'sains'");
          }
          ?>
<style>
    .layout-card-custom {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1.5rem;
    }
  </style>
  

  <!--Btn filter data kategori buku-->
  
       <div class="p-3 mb-2 border bg-info text-center mb-5 ">Selamat Membaca Buku</div>
    
      
      <!--Card buku-->
      
    <div class="layout-card-custom">
      
       <?php foreach ($buku as $item) : ?>
       <div class="card" style="width: 10rem;">
         <a href="sign/member/sign_in.php"><img src="imgDB/<?= $item["cover"]; ?>" class="card-img-top" alt="coverBuku" height="200px"></a>
         <div class="card-body">
           <h6 class="card-title"><?= $item["judul"]; ?></h6>
          </div>

          <div class="card-footer bg-info text-center">
          <?= $item["kategori"]; ?>
          </div>
        </div>
        
       <?php endforeach; ?>
      </div>
   
      
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <footer id="footer" class="bg-dark">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center mt-2">
                    <p class="text-light"><i>Copyright © By Muhammad Hezka   </i></p>
                </div>
            </div>
        </footer>
  
  </body>
</html>