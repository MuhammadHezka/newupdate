<?php
session_start();

if (isset($_SESSION["signIn"])) {
  header("Location: ../../DashboardAdmin/dashboardAdmin.php");
  exit;
}

require "../../loginSystem/connect.php";

if (isset($_POST["signIn"])) {

  $nama = strtolower($_POST["nama_admin"]);
  $password = $_POST["password"];

  $result = mysqli_query($connect, "SELECT * FROM admin WHERE nama_admin = '$nama' AND password = '$password' ");
  $data = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) === 1) {
    if ($data['role'] == 'admin') {
      //SET SESSION 
      $_SESSION["signIn"] = true;
      $_SESSION['role'] = $data['role'];
      $_SESSION["admin"]["nama_admin"] = $nama;
      header("Location: ../../DashboardAdmin/dashboardAdmin.php");
      exit;
    } else {
      $error = true;
    }
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Sign In || Admin</title>
    </head>
  <body>
  

<body>
    <style>
        body{
            background-image: url('../../assets/6714.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            height: 100vh;
          }
            .container {
             display: flex;
             flex-wrap: wrap; /* Memastikan elemen dapat bergerak ke baris baru jika lebar layar terlalu kecil */
          }
       
        .card-transperent{
            background: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 10px;
            width: 30rem;
            justify-content: center;
            margin-top: 50px;
            

        }
        .button-login{
            background-color:lightskyblue;
            padding: 8px;
            width: 180x;
            border-radius: 10px;
            border: none;
            position: relative;
            left: 280px;

        }
        .button-out{
          background-color: green;
          padding: 8px; 
          width: 180;
          border: none;
          color: inherit;
          cursor:pointer;
          text-decoration: none;
          position: relative;
          border-radius: 10px;
          left: 280px;
        }
    </style>
    
    <div class="justify-content-center" >
       <div class="card-transperent" >
        <div class="card-header">
         <div class="text-center text-secondary" >
            <h4 class="text-green">Login <span class="text-success">Admin</span></h4>
         </div>
         <div class="card-body" >
         <p class="text-center mt-3" >Anda Harus login Terlebih dahulu</p>
         <?php if(isset($error)) : ?>
    <div class="alert alert-danger mt-2" role="alert">Nama atau Password Salah!</div>
      <?php endif; ?>
     </div>
         <div class="row">
         <form action="" method="post" class="row g-80 p-4 needs-validation" novalidate>
            <div class="col-md-8 mx-auto mt-2">
                <label for="">Username</label>
               <input type="text"class="form-control" name="nama_admin" id="ValidationCustom01" placeholder="masukan Username....">
               <div class="invalid-feedback">
                Masukkan nama anda!
               </div>
            </div>
            
            <div class="col-md-8 mx-auto mt-2">
                <label for="">Password</label>
               <input type="password"class="form-control" name="password" placeholder="masukan password">
               <div class="invalid-feedback">
                Masukkan password anda!
               </div>
            </div>
         <div class=" mt-5" >
         <a href="../link_login.html" type="button" class="button-out" >kembali</a>
         <button type="submit" class="button-login" name="signIn">Masuk</button>
         
        </div>
         </form>
        </div>
    </div>
 
       </div>
      
  

    
      
    
     
  

  
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>