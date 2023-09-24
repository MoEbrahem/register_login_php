<?php require "includes/header.php"?>
<?php 
    if(isset($_SESSION['username'])){
        echo "hello ". $_SESSION['username']; 
    }else{
        echo "Hello from index.PHP Page ";
    }
    ?>
<?php require "includes/footer.php"?>