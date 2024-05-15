
<?php
    function aff() : void {
        session_start(); 
    
    if (isset($_SESSION['numc'])) {
        require_once 'includes/db_connect.php';
        $sql = "SELECT * FROM compte WHERE numc = :numc ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':numc', $_SESSION['numc']);
        if ($stmt->execute()) {
            $count = $stmt->rowCount();
            if ($count > 0) {
                $row = $stmt->fetch();
                echo '<button class="btn-header"><a href="profile/profile.php">'.$row['user'].'</a></button>';
                echo '<button class="btn-header"><a href="includes/logout.php">Logout</a></button>';
            } else {
                echo 'User not found';
            }
        } else {
            echo 'Error executing SQL query';
        }
    } else {
        echo '<button class="btn-header"><a href="html/signin.php">Log In</a></button>';
        echo '<button class="btn-header"><a href="html/signup.php">Sign Up</a></button>';
    }
    }
    
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHEFIT</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>
        <header class="header">
                <nav class="navbar">
                    <div class="navdiv">
                        <div class="logo"><a href="#home">SHEFIT</a></div>
                        <ul>
                            <li class="li"><a href="#home">HOME</a></li>
                            <li class="li"><a href="#healthy">ARTICLES</a></li>
                            <li class="li"><a href="#contact">CONTACT</a></li>
                            <li class="li"><a href="html/workout.php">CLASSES</a></li>
                            <?php aff(); ?>
                    </div>
                </nav>
        
        </header>
   

    <section id="home" class="box-home" >
        <div class="content">
            <a href="html/workout.php">
                <button class="video-btn"> 
                    <i class="fa-solid fa-play" style="color: white;font-size: 150%;"></i>
                </button>
            </a>
            <split class="text-l2">Watch Workout Videos</split><br>
            <split class="text-l1">Get Fit<br> with Us!</split><br>
            <split class="text-l3">Pilates, Yoga, Spinning, and much more.</split>
        </div>
    </section>
    

        
    <section class="healthy-section" id="healthy">
        <div class="healthy">
            <div class="health">
                <h1>HEALTHY LIVING</h1>
                <p>Live Well, Feel Well, and Look Well.<br>
                A wide selection of health and fitness content, healthy recipes, and transformation stories to help you get in shape and stay fit!</p>
            </div>
            <img src="photos\healthy.jpg" class="healthy-image">
        </div>
        <h1 class="title">Health</h1>
        <div class="health-articles">
            <div class="img1">
                <a href="./html/run.html">    
                    <img src="photos\run.avif" class="photoart">
                    <button>Free</button>
                </a>
                <h1>New to Running? </h1>
                <h2>Reading Time • 9 Min</h2>
            </div>
            <div class="img1">
                <a href="./html/pregnant.html">    
                    <img src="photos\pregnant.webp" class="photoart">
                    <button>Free</button>
                </a>
                <h1>the Pelvic Floor During Pregnancy</h1>
                <h2>Reading Time • 6 Min</h2>
            </div>
            <div class="img1">
                <a href="./html/travail.html">    
                    <img src="photos\travail.jpg" class="photoart">
                    <button>Free</button>
                </a>
                <h1>Exercises to do at Work</h1>
                <h2>Reading Time • 8 Min</h2>
            </div>
            <div class="img1">
                <a href="./html/valgus.html">    
                    <img src="photos\valgus.jpeg" class="photoart">
                    <button>Free</button>
                </a>
                <h1>Exercises for Knock Knees</h1>
                <h2>Reading Time • 9 Min</h2>
            </div>
        </div>
        <h1 class="title">Nutrition</h1>
        <div class="health-articles">
            <div class="img1">
                <a href="./html/happy.html">    
                    <img src="photos\Food-and-Mood.jpg" class="photoart">
                    <button>Free</button>
                </a>
                <h1>Food and Mood</h1>
                <h2>Reading Time • 15 Min</h2>
            </div>
            <div class="img1">
                <a href="./html/family.html">
                    <img src="photos\family.jpg" class="photoart">
                    <button>Free</button>
                </a>
                <h1>Family Meals Together</h1>
                <h2>Reading Time • 9 Min</h2>
            </div>
            <div class="img1">
                <a href="./html/eating.html">
                    <img src="photos\what-are-eating-disorders.jpg" class="photoart">
                    <button>Free</button>
                </a>
                <h1>Understanding Eating Disorders</h1>
                <h2>Reading Time • 11 Min</h2>
            </div>
            <div class="img1">
                <a href="./html/addiction.html">    
                    <img src="photos\sugar.jpeg" class="photoart">
                    <button>Free</button>
                </a>
                <h1>Understanding Sugar Addiction </h1>
                <h2>Reading Time • 8 Min</h2>
            </div>
        </div>
        <h1 class="title">Healthy Recipes</h1>
        <div class="health-articles">
            <div class="img1">
                <a href="./html/garlicky.html">    
                    <img src="photos\garlicky.jpg" class="photoart">
                    <button>Free</button>
                </a>
                <h1>Garlicky Kale Sauté</h1>
                <h2>Healthy Recipes</h2>
            </div>
            <div class="img1">
                <a href="./html/crispy.html">
                    <img src="photos\crispy.jpg" class="photoart">
                    <button>Free</button>
                </a>
                <h1>Crispy Cheese Toasties </h1>
                <h2>Healthy Recipes</h2>
            </div>
            <div class="img1">
                <a href="./html/pepper.html">
                    <img src="photos\pepper.jpg" class="photoart">
                    <button>Free</button>
                </a>
                <h1>Stuffed Pepper</h1>
                <h2>Healthy Recipes</h2>
            </div>
            <div class="img1">
                <a href="./html/turkey.html">
                    <img src="photos\dejeuner.avif" class="photoart">
                    <button>Free</button>
                </a>  
                <h1>Homemade Turkey Sausage </h1>
                <h2>Healthy Recipes</h2>
            </div>
        </div>
    </section>
    <section class="container1" id="contact">
            <div class="box">
                <h2 class="contact">CONTACT</h2>
                <div class="row">   
                    <div class="column">
                        <div class="box1">
                            <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="text">                        
                                <h3>Address</h3>
                                <p>John Smith 123 Main StreetUnited States</p>
                            </div>
                        </div>
                        <div class="box1">
                            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="text">      
                                <h3>Phone</h3>
                                <p>+216 24 616 111</p>
                            </div>
                        </div>
                        <div class="box1">
                            <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                            <div class="text">
                                <h3>Email</h3>
                                <p>shefit@gmail.com@</p>
                            </div>    
                        </div>           
                    </div> 
    
                    <form action="includes/contact.php" method="POST" class="column">                  
                        <div class="input-box">
                            <span>Username :</span>
                            <input class="input" type="text" name="username" placeholder="username">
                        </div>
                        <div class="input-box">
                            <span>E-mail :</span>
                            <input class="input" type="email" name="email" placeholder="example@gmail.com">
                        </div>
                        <div class="input-box">
                            <span>type your message...</span>
                            <textarea class="input" name="message"></textarea>
                        </div>    
                        <div><button type="submit" class="btn">Send</button></div>          
                    </form>
                </div>
                </div>
            </div>
        
    </section>
    
    <footer class="footer">
        <div class="container2">
            <div class="row">
                <div class="footer-col">
                    <h4>WORKOUT</h4>
                    <ul>
                        <li><a href="html/workout.php" >workout videos </a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>CLASSES</h4>
                    <ul>
                        <li><a href="../html/yoga.php" >YOGA</a></li>
                        <li><a href="../html/pilates.php" >PILATES</a></li>
                        <li><a href="../html/meditation.php" >MEDITATION</a></li>
                        <li><a href="../html/gymnastique.php" >GYMNASTIC</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>ARTICLES</h4>
                    <ul>
                        <li><a href="../index.php#healthy" >Healthy recepies</a></li>
                        <li><a href="../index.php#healthy" >Nutrition</a></li>
                        <li><a href="../index.php#healthy" >Wellness</a></li>
                        
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Membership</h4>
                    <ul>
                        <li><a href="../html/pilates.php#membership" >Pilates</a></li>
                        <li><a href="../html/yoga.php#membership" >Yoga</a></li>
                        <li><a href="../html/meditation.php#membership" >Meditation</a></li>
                        <li><a href="../html/gymnastique.php#membership" >Gymnastique</a></li>
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
</body>
</html>
