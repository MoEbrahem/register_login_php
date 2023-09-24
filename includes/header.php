<?php   
    session_start();
    
?>

<html lang="en">
  <head>
        <!-- Navbar -->
        <link rel="stylesheet" href="header.css">

        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <div class="container-fluid">
                    <!-- <button
                        class="navbar-toggler"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#navbarExample01"
                        aria-controls="navbarExample01"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <i class="fas fa-bars"></i>
                    </button> -->
                    <div class="collapse navbar-collapse" id="navbarExample01">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" aria-current="page" href="#">Home</a>
                            </li>
                            <?php if(!isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                            <?php else : ?>
                            <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="collapse">
                                        <?php echo $_SESSION['username'] ; ?>
                                    </a> 
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="logout.php">logout</a>
                                        </li>
                                    </ul>
                                    <?php endif; ?>
                            </li> 
                        </ul>
                    </div>
            </div>
        </nav>
   
  </head>

</html>