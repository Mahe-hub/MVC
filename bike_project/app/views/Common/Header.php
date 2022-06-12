<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    
    <title><?php echo SITE_NAME ?></title>
</head>
<body>
  <header>
  <nav>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/bike_project/Home" style="color:red;">home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/bike_project/About" style="color:red;">about</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/bike_project/Products" style="color:red;">Products</a>
  </li>

   <!-- show the login ,logout,register based on if global vairable -->
   <nav>  
   <ul class="nav nav-tabs nav justify-content-end">
     <?php
       // define instance from userValidation class to check the golbal vairable
       $userValid = new userValidation;
       if($userValid-> verfication())
       {

          echo '<li class="nav-item"><a style="color:red" class="nav-link active" aria-current="page" href="/bike_project/Logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>';
       } 
       else
       {
          echo '<li>
                <a  style ="color:Red" class="nav-link active" aria-current="page" href="/bike_project/Login"><i class="fa-solid fa-right-to-bracket"></i>Login
                </a></i>';
          echo '<li>
                <a  style ="color:Red" class="nav-link active" aria-current="page" href="/bike_project/Register"><i class="fa-solid fa-user-plus"></i>Register
                </a>
                </li>';
       }
   ?>
      </ul>
  </ul>
</nav>
</header>
    

 


    
