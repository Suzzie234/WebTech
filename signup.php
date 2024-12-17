<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>Escape Room</title>

        <link rel="stylesheet" href="assets/css/style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.cdnfonts.com/css/arcade-classic" rel="stylesheet">

        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Adding a favicon-->
         <link rel ="icon" type= "image/png" href="https://cdn-icons-png.flaticon.com/128/3483/3483089.png">

         <!--bootstrap-->
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
       
        <!--JS library for validation-->
        <!--<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
        <script src="/assets/js/validation.js" defer></script>-->
    </head>
    
    <body>
        <div class="wrapper">
            <form action="actions/signup_process.php" method="post" id="signup">
                <h1>Sign Up</h1>
                <div class="input-box">
                    <input type="text" placeholder="First Name" required id="fname" name="fname">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Last Name" required id="lname" name="lname">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="Email" id="email" name="email" required>
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Username" id="username" name="username"required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" id="password" name="password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Confrim Password" id="cpassword" name="cpassword" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                <input type="text" placeholder="role i.e regular,admin" id="roles" name="roles"required>
                <i class='bx bxs-user'></i>
               </div>
                <button type="submit" class="btn">Register</button>
                <div class="register-link">
                    <p>Already have an account?<a href="login.php"> Login</a></p>
                </div>
            </form>
        </div>

        
      
    </body>
</html>
