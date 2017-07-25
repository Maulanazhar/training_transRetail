<?php
include 'connect.php';
?>

<html>
  <head>   
    <title> Login Form Training </title>   
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="assets/login.css" media="screen" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="javascript/login.js"></script>
  </head>


<body>

<div class="container">
  <br>
  <br> 
  <br>
  <br>
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="loginproses.php" role="login">
          <img src="img/logo.png" class="img-responsive" alt="" />
          <input type="email" name="email" id="email" placeholder="Email" required class="form-control input-lg" />
          
          <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password" />
          
          
          <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Login</button>
           
        </form>
        
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>   
  
  
</div>

</body>

</html>
