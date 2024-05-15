<?php
    function aff() : void {
        session_start(); 
    if (isset($_SESSION['numc'])) {
        require_once '../includes/db_connect.php';
        $sql = "SELECT * FROM compte WHERE numc = :numc ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':numc', $_SESSION['numc']);
        if ($stmt->execute()) {
            $count = $stmt->rowCount();
            if ($count > 0) {
                $row = $stmt->fetch();
                echo '<button class="btn-header"><a href="#">'.$row['user'].'</a></button>';
                echo '<button class="btn-header"><a href="../includes/logout.php">Logout</a></button>';
            } else {
                echo 'User not found';
            }
        } else {
            echo 'Error executing SQL query';
        }
    } else {
        echo '<button class="btn-header"><a href="signin.php">Log In</a></button>';
        echo '<button class="btn-header"><a href="signup.php">Sign Up</a></button>';
    }
    }
    
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fitforge</title>
    <link rel="stylesheet" href="..\css/workout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


</head>
<body>
    <header class="header">
        <nav class="navbar" id="navbar">
            <div class="navdiv">
                <div class="logo"><a href="../index.php#home">SHEFIT</a></div>
                <ul>
                    <li class="li"><a href="../index.php#home">HOME</a></li>
                    <li class="li"><a href="../index.php#healthy">ARTICLES</a></li>
                    <li class="li"><a href="../index.php#contact">CONTACT</a></li>
                    <li class="li"><a href="#navbar">CLASSES</a></li>
                    <?php aff(); ?>
                </ul>
            </div>
        </nav>

</header>

    <section >
        <div id="video-background">
            <video autoplay loop muted>
                <source src="https://alomoves.s3.amazonaws.com/manual_uploads/shared/home/hero/mobile.mp4" type="video/mp4">
            </video>
            <div id="text-overlay1">
                <h1 >BIENVENUE DANS VOTRE ÈRE BIEN-ÊTRE
                    <br></h1>
                <h2 >Donnez la priorité à vos objectifs de bien-être avec des cours primés de fitness, de méditation, de nutrition et de soins personnels sur FITFORGE.</h2>
            </div>      
          </div>
    </section>
    <section class="class">
        <h1 class="title">CHOISISSEZ VOTRE CLASSE PREFERE </h1>
        <div class="classes">
           <a href="yoga.php"><div id="yoga" class="img1">
                <div class="text-container">
                    <span class="text-overlay"></span>
                </div>
            </div>
        </a> 
        <a href="pilates.php"><div id="pilates" class="img3">
            <div class="text-container">
                <span class="text-overlay"></span>
            </div>
        </div>
    </a>
    <a href="meditation.php"> 
        <div id="meditation" class="img4">
            <div class="text-container">
                <span class="text-overlay"></span>
            </div>
        </div>
    </a>
         <a href="gymnastique.php">
            <div id="gymnastique" class="img5">
                <div class="text-container">
                    <span class="text-overlay"></span>
                </div>
            </div>
         </a>   
            
            
           
        </div>
    </section>
    <a href="mailto:chayma.chouikh@ensi-uma.tn" class="email-button">Envoyer un mail</a>
    <footer class="footer">
        <div class="container2">
            <div class="row">
                <div class="footer-col">
                    <h4>WORKOUT</h4>
                    <ul>
                        <li><a href="html/workout.html" >workout videos </a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>CLASSES</h4>
                    <ul>
                        <li><a href="../html/yoga.html" >YOGA</a></li>
                        <li><a href="../html/pilates.html" >PILATES</a></li>
                        <li><a href="../html/meditation.html" >MEDITATION</a></li>
                        <li><a href="../html/gymnastique.html" >GYMNASTIC</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>ARTICLES</h4>
                    <ul>
                        <li><a href="../index.html#healthy" >Healthy recepies</a></li>
                        <li><a href="../index.html#healthy" >Nutrition</a></li>
                        <li><a href="../index.html#healthy" >Wellness</a></li>
                        
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Membership</h4>
                    <ul>
                        <li><a href="../html/pilates.html#membership" >Pilates</a></li>
                        <li><a href="../html/yoga.html#membership" >Yoga</a></li>
                        <li><a href="../html/meditation.html#membership" >Meditation</a></li>
                        <li><a href="../html/gymnastique.html#membership" >Gymnastique</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <p>
                Copyright © 2024 FITNESS CENTER. All rights reserved.
                <a href="#">Terms of Use</a>
                <a href="#">Privacy Policy</a>
            </p>
           
        </div>
        
    </footer>
    
<script src="../js/workout.js"></script>
        
</body>
</html>