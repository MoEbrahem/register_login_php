<?php require "includes/header.php";?>
<?php require "config.php";?>
<?php 

    //check submit 
    //take the Data and do query 
    //excute query 
    //fetch data

    if(isset($_SESSION['username'])){
      header("location: index.php");
    }

    if(isset($_POST["submit"]))
    {
      if($_POST["email"]=='' or $_POST["password"]==''){
        echo '<scribt type= "text/JavaScribt" >';
        echo "alert('some inputs are empty')";
        echo '</scribt>';        

      }else{
        $email=$_POST['email'];
        $password=$_POST['password'];

        $login =$conn->query("SELECT * FROM users WHERE email = '$email'");

        $login->execute();

        $data = $login->fetch(PDO::FETCH_ASSOC);

        //rowCount()=0 if email value doesnot exist
        
        if($login->rowCount() > 0){
          if(!password_verify($password,$data['mypassword'])){
            $_SESSION['username']= $data['username'];
            $_SESSION['email']= $data['email'];

            header("location: index.php");


          }else{
            echo '<scribt type= "text/JavaScribt" >';
            echo "alert('Login Denied')";
            echo '</scribt>';
           
          }  
      }

    }
  }
?>
<head>
  <link rel="stylesheet" href="login.css" >
</head>
<main class="form-signin w-50 m-auto">
    <form method="post">
        <h1 class="h3 mt-5 fw-normal text-center">Please Login in</h1>
        <div class="form-floating">
          <label for="floatingInput">Email address </label>
          <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@email.com">

          <label for="floatingPassword">Password </label>
          <input name="password" type="password" placeholder="Password">

        </div>
        <button name="submit" class="w-100 btn btn-1g btn-primary" type="submit">Login in</button>
        <h3 class="mt-3"> Don't have an account ? <a href="register.php">Create you email</a></h3>
    </form>
</main>
<?php require "includes/footer.php"; ?>