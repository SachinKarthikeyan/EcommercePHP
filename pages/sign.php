<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" >
		<title>CLOTHY</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="i/favicon.png" type="image/x-icon">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Rubik:100,200,300,400,600,500,700,800,900|Karla:100,200,300,400,500,600,700,800,900&amp;subset=latin" rel="stylesheet">
		<!-- Bootstrap 4.3.1 CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!-- Slick 1.8.1 jQuery plugin CSS (Sliders) -->
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<!-- Fancybox 3 jQuery plugin CSS (Open images and video in popup) -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
		<!-- AOS 2.3.1 jQuery plugin CSS (Animations) -->
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		<!-- FontAwesome CSS -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<!-- Startup 3 CSS (Styles for all blocks) -->
		<link href="css/style.css" rel="stylesheet" />
		<!-- Custom CSS non template -->
		 <link rel="stylesheet" href="css/custom.css">
		<!-- jQuery 3.3.1 -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<!-- Fontawesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>
<body>
   <section class="feature_2 bg-light pt-50 text-center">
            <div class="container px-xl-0">
               <div class="row justify-content-center">
                  <div class="col-xl-8 col-sm-10">
                     <h2 class="large custom-font-a mb-50" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">Create Account</h2>
                     <form action="" method="post">
                     <?php
                        if(isset($error)){
                           foreach($error as $error){
                              echo '<span class="error-msg">'.$error.'</span>';
                           };
                        };
                        ?>
                        <div class="mb-3 mt-50   ">
                           <input type="text" name="name"   placeholder="Name">
                        </div>
                        <div class="mb-3 mt-50 ">
                           <input type="email" name="email" aria-describedby="emailHelp" placeholder="Email address">
                        </div>
                        <div class="mb-3 mt-50 ">
                           <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="mb-3 mt-50  ">
                           <input type="password" name="cpassword" placeholder="Confirm password">
                        </div>
                        <div class="mt-50">
                        <select name="user_type" id="users" class="user-type-select">
                           <option value="User">Customer</option>
                           <option value="Admin">Professional</option>
                        </select>
                        </div>
                     </form>
                     <input type="submit" class="btn action-white-bg md mr-20 link color-main f-16 mt-100 "></button>
                     <div class="mt-40">
                        <p class="custom-font-d1">already have a account ?  <a href="login_form.php" class="custom-font-d4">LOGIN NOW </a></p>
                     </div>
                  </div>
               </div>
            </div>
		</section>

      <!-- Bootstrap 4.3.1 JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
		<!-- Fancybox 3 jQuery plugin JS (Open images and video in popup) -->
		<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
		<!-- Google maps JS API -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDP6Ex5S03nvKZJZSvGXsEAi3X_tFkua4U"></script>
		<!-- Slick 1.8.1 jQuery plugin JS (Sliders) -->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<!-- AOS 2.3.1 jQuery plugin JS (Animations) -->
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<!-- Maskedinput jQuery plugin JS (Masks for input fields) -->
		<script src="js/jquery.maskedinput.min.js"></script>
		<!-- Startup 3 JS (Custom js for all blocks) -->
		<script src="js/script.js"></script>
</body>
</html>