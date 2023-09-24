<?php require "includes/header.php"; ?>
<?php require "config.php" ?>
<?php
    if(isset($_SESSION['username'])){
      header("location: index.php");
    }
    if(isset($_POST['submit']))
    {
        if($_POST['email']== '' OR $_POST['username']== '' OR $_POST['password']= '' )
        {
          echo '<script type ="text/JavaScript">';  

          echo 'alert("some inputs are empty")';
          
          echo '</script>';
        }else{
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
            $login->execute();

            $data = $login->fetch(PDO::FETCH_ASSOC);
            $emailcheck=$data['email'];
            if($emailcheck==$email){
              echo '<script type ="text/JavaScript">';  

              echo 'alert("this email used before")';

              echo '</script>';
            }else{
              $insert = $conn ->prepare("INSERT INTO users (email, username, mypassword) 
              VALUES (:email,:username,:mypassword )");
  
              $insert->execute([
                  ":email" => $email,
                  ":username" => $username,
                  ":mypassword" => password_hash($password,PASSWORD_DEFAULT),
              ]);
              $_SESSION['username']= $username;
              
            }

            
          }
    }

?>
<head>
  <link rel="stylesheet" href="register.css">
</head>

<main class="form-signin w-50 m-auto">
      <form method="post" >
        <h1 class="h3 mt-5 fw-normal text-center">
          Please Register 

        </h1>

          <div class="form-floating">
            <label for="floatingInput">Email address</label>
            <input name="email" type="email" class="form-control" id="floatingInput" placeholders= "name@example.com " >
            
            <label for= "floatingInput">Username</label>
            <input name="username" type="text" class="form-control" id= "floatingInput" placeholder= "user.name">
            
            <label for="floatingpassword">Password</label>
            <input name="password" type="password" class="form-control" id="floatingpassword" placeholder="password">
          </div>
          <button name="submit" class="w-100 btnebtn-1g btn-primary" type="submit">sign in</button>
          <h3 class= "mt-3">Aleardy have an account?<a href="login.php">Login </a></h3>
      </form>
</main>
<?php require "includes/footer.php"; ?>