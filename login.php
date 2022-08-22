<?php

include('db_conn.php');

session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>e-KUARTERS</title>
  </head>
  <body>
  

  <main class="form-signin">
  <form method="POST" action="">
    <img class="mb-4" src="img/TUDM_login.png" alt="" width="300" height="75">
    <h1 class="h3 mb-3 fw-normal">Sila Log Masuk</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name="no_tentera" id="floatingInput" placeholder="123456">
      <label >No. Tentera</label>
    </div>
    <div class="form-floating">
      <input type="psd" name="psd" class="form-control" id="floatingpsd" placeholder="******">
      <label >Kata Laluan</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Ingat saya
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Log Masuk</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020–2022</p>
  </form>
</main>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <?php
if (isset($_POST['login'])){
	
  $no_tentera = $_POST['no_tentera'];
  $psd= $_POST['psd'];
  $query = "SELECT * FROM user WHERE BINARY no_tentera= BINARY '$no_tentera' and BINARY psd= BINARY '$psd'";
  $results = mysqli_query($conn , $query);





  if (mysqli_num_rows($results) == 1) 
{ 
        $query=mysqli_query($conn,"SELECT * from user WHERE BINARY  no_tentera=  BINARY '$no_tentera' and BINARY psd= BINARY '$psd'");
        $ret=mysqli_fetch_array($query);

              if($ret>0 && $ret['type_user']=='poweruser'){

                      $_SESSION['aid']=$ret['id'];		
              
                      header('location: poweruser/index.php');

              } else if($ret>0 && $ret['type_user']=='user') {

                  $_SESSION['aid']=$ret['id'];	
              
                  header('location: user/index.php');
                  
              }


              }
else{
      echo "<script> alert ('Salah No. Tentera/Kata Laluan!');window.location='login.php' </script>";
  }
   

}
    ?>

  </body>
</html>

