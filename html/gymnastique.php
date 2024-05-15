<?php
  error_reporting(0);
  function freehandle() {
    session_start();
    if (isset($_SESSION['numc'])) {        
      require_once "../includes/db_connect.php";
      $sql = "SELECT * FROM payment_info WHERE (numc = :numc AND free = :free AND class=:class) ";
      $stmt = $pdo->prepare($sql);
      $free=1;
      $class='gymnastic';
      $stmt->bindParam(':numc', $_SESSION['numc']);
      $stmt->bindParam(':free', $free);
      $stmt->bindParam(':class', $class);
      if ($stmt->execute()) {
        $count = $stmt->rowCount();
        if ($count == 0) {
           echo '<a href="../includes/free.php?class=gymnastic" class="btn">15 Days free trial</a>';
        }else {
          echo '<a href="#membership" class="btn">buy a membership</a>';
        }
      } else{
        header('location: ../index.php');
      }   
    } else {
      header('location: signin.php');
    }
  }
?>
<?php
  function membership($x){
    session_start();
    if (isset($_SESSION['numc'])) {        
      require "../includes/db_connect.php";
      $sql = "SELECT * FROM payment_info WHERE numc = :numc AND payment_period > CURDATE() AND class=:class";
      $stmt = $pdo->prepare($sql);
      $class='gymnastic';
      $stmt->bindParam(':numc', $_SESSION['numc']);
      $stmt->bindParam(':class', $class);
      if ($stmt->execute()) {
        $count = $stmt->rowCount();
        if ($count != 0) {
           echo '<button class="btn classes__btn" onclick="afficherVideo('.$x.')">Level '.$x.'</button>';
        }else{
          echo '<a href="#membership" class="btn">buy a membership</a>';
        }
      } else{
        header('location: ../index.php');
      }   
    } else {
      header('location: signin.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css\yoga.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>SHEFIT/GYMNASTICS CLASS</title>
  </head>
  <body>
    <nav>
      <div class="nav__logo">
        <img src="../photos/logo.png" alt="logo" />
        <span>SHEFIT</span>
      </div>
      <ul class="nav__links">
        <li class="link"><a href="#home">Home</a></li>
        <li class="link"><a href="#classes">Classes</a></li>
        <li class="link"><a href="#membership">Membership</a></li>
        <li class="link"><a href="../index.php#contact">Contact</a></li>
      </ul>
    </nav>
    <header id="home">
      <div class="section__container header__container">
        <div class="header__content">
          <h1>Effective GYMNASTICS</h1>
          <h2>Do GYMNASTICS today for better tomorrow</h2>
          <?php freehandle(); ?>
        </div>
        <div class="header__image">
          <img src="../photos\homegymnastics.jpg" alt="header" />
        </div>
      </div>
    </header>

    <section class="section__container why__container">
      <div class="why__image">
        <img src="../photos\gymnastics1.jpg" alt="why yoga" />
      </div>
      <div class="why__content">
        <h2 class="section__header">Why You Should Go To Gymnastics</h2>
        <p>
         
          Embarking on a journey with gymnastics unveils a pathway to holistic well-being,
           intertwining the domains of physical agility and mental equilibrium. Within the fluidity of every movement,
            extension, and muscular exertion lies a symphony of wellness awaiting exploration. Gymnastics transcends mere physical exercise;
             it serves as a sanctuary for both the body and mind.
        </p>
        <ul>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
Gymnastics improves Physical Strength and Flexibility.       </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Gymnastics improves cardiovascular fitness and endurance. 
          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
          Gymnastics fosters concentration, focus, and determination.
          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Gymnastics  involves training and competing in a team environment.
          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Gymnastics proper posture and body alignment.
          </li>
        </ul>
      </div>
    </section>

    <section class="hero" id="hero">
      <div class="section__container hero__container">
        <div class="hero__card">
          <span><img src="../photos/icon-1.png" alt="hero" /></span>
          <h4>Healthy Nutrition</h4>
          <p>
            Embrace a healthy nutrition plan tailored for gymnasts to fuel your body with the nutrients it needs for optimal performance and recovery.
          </p>
        </div>
        <div class="hero__card">
          <span><img src="../photos/icon-2.png" alt="hero" /></span>
          <h4>Strength & Flexibility Training</h4>
          <p>
            Engage in strength and flexibility training exercises designed specifically for gymnastics, enabling you to develop a strong, agile body capable of executing complex maneuvers with precision.
          </p>
        </div>
        <div class="hero__card">
          <span><img src="../photos/icon-3.png" alt="hero" /></span>
          <h4>Mental Focus and Visualization Techniques</h4>
          <p>
            Incorporate mental focus and visualization techniques into your gymnastics training regimen to enhance concentration, confidence, and performance under pressure.
          </p>
        </div>
        <div class="hero__card">
          <span><img src="../photos/icon-4.png" alt="hero" /></span>
          <h4>Injury Prevention and Recovery</h4>
          <p>
            Implement injury prevention strategies and recovery protocols tailored for gymnasts to maintain peak physical condition, minimize the risk of injuries, and support efficient recovery between training sessions.
          </p>
        </div>
        
      </div>
    </section>

    <section class="section__container classes__container" id="classes">
      <p class="section__subheader">GYMNASTICS CLASSES</p>
      <h2 class="section__header">Choose Your Level & Focus</h2>
      <div class="classes__grid">
        <div class="classes__image">
          <img src="../photos/level1gymnastics.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(1); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/level2gymnastics.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(2); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/level3gymnastics.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(3); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/level11gymnastics.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(1); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/level22gymnastics.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(2); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/level33gymnastics.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(3); ?>
          </div>
        </div>
      </div>
    </section>
    
    <div id="video-container" style="display: none;">
    </div>
    
    <script>
      function afficherVideo(niveau) {
        var videoContainer = document.getElementById("video-container");
        videoContainer.style.display = "block"; 
        
        var videoSource = "";
        switch (niveau) {
          case 1:
            videoSource = "../videos/gymnastics/gymnastics1.mp4";
            break;
          case 2:
            videoSource = "../videos/gymnastics/gymnastics2.mp4";
            break;
          case 3:
            videoSource = "../videos/gymnastics/gymnastics3.mp4";
            break;
          default:
            videoSource = ""; 
        }
        
        videoContainer.innerHTML = "<video controls><source src='" + videoSource + "' type='video/mp4'></video>";
      }
    </script>
    

    <section class="membership" id="membership">
      <div class="section__container membership__container">
        <p class="section__subheader">PRICING TABLE</p>
        <h2 class="section__header">Membership Cards</h2>
        <div class="membership__grid">
          <div class="membership__card">
            <h4>YEAR CARD</h4>
            <h2>399 DT</h2>
            <h3>For 1 Year</h3>
            <h4>ENJOY ALL THE FEATURES</h4>
            <p>Group trainer</p>
            <p>Fitness orientation</p>
            <p>Discuss fitness goals</p>
            <a class="btn membership__btn" href="pay.php?period=year&class=gymnastic">GET STARTED</a>
          </div>    
          <div class="membership__card">
            <h4>MONTHLY CARD</h4>
            <h2>299 DT</h2>
            <h3>For 1 Month</h3>
            <h4>ENJOY ALL THE FEATURES</h4>
            <p>Discuss fitness goals</p>
            <p>Group trainer</p>
            <p>Fitness orientation</p>
            <a class="btn membership__btn" href="pay.php?period=month&class=gymnastic">GET STARTED</a>
          </div>
          <div class="membership__card">
            <h4>WEEKLY CARD</h4>
            <h2>79 DT</h2>
            <h3>For 1 Week</h3>
            <h4>ENJOY ALL THE FEATURES</h4>
            <p>Access to Gymnastics area</p>
            <p>Group trainer</p>
            <p>Fitness orientation</p>
            <a class="btn membership__btn" href="pay.php?period=week&class=gymnastic">GET STARTED</a>
          </div>
        </div>
      </div>
    </section>
    

    <section class="section__container stories__container" id="stories">
      <p class="section__subheader">INSPIRING STORIES</p>
      <h2 class="section__header">Unforgettable Gymnastics Journeys</h2>
      <div class="stories__grid">
        <div class="stories__card">
          <div class="stories__content">
            <span><i class="ri-double-quotes-l"></i></span>
            <p>
              This transformative gymnastics program has profoundly impacted my life. The diverse array of training sessions and expert coaching have not only refined my skills but also brought a sense of peace and balance to my otherwise hectic schedule.            </p>
          </div>
          <div class="stories__author">
            <img src="../photos/woman1gymnastics.jpg" alt="author" />
            <div class="stories__author__details">
              <h4>Amelia Taylor</h4>
              <h6>Gymnastics Enthusiast</h6>
            </div>
          </div>
        </div>
        <div class="stories__card">
          <div class="stories__content">
            <span><i class="ri-double-quotes-l"></i></span>
            <p>
              The personalized training sessions and individualized guidance have not only helped me overcome challenges but also enhanced my overall performance. A remarkable journey for both newcomers and experienced gymnasts.
            </p>
          </div>
          <div class="stories__author">
            <img src="../photos/woman2gymnastics.jpg" alt="author" />
            <div class="stories__author__details">
              <h4>Ethan Parker</h4>
              <h6>Gymnastics Advocate</h6>
            </div>
          </div>
        </div>
        <div class="stories__card">
          <div class="stories__content">
            <span><i class="ri-double-quotes-l"></i></span>
            <p>
              The flexibility of on-demand training sessions allows me to practice at my convenience, and the mental exercises have brought clarity and focus to my gymnastics journey. A must-experience for anyone pursuing holistic fitness.
            </p>
          </div>
          <div class="stories__author">
            <img src="../photos/woman3gymnastics.jpg" alt="author" />
            <div class="stories__author__details">
              <h4>Olivia Bennett</h4>
              <h6>Gymnastics Enthusiast</h6>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  
      <section class="banner">
        <div class="section__container banner__container">
          <div class="banner__card">
            <h4>0</h4>
            <p>Happy Clients</p>
          </div>
          <div class="banner__card">
            <h4>6</h4>
            <p>Gymnastics Workshops</p>
          </div>
          <div class="banner__card">
            <h4>10</h4>
            <p>Years of Gymnastics Expertise</p>
          </div>
         
        </div>
      </section>
  
     
  
      <section class="section__container photos__container">
        <p class="section__subheader">GALLERY</p>
        <h2 class="section__header">Explore Our Latest Moments</h2>
        <div class="photos__grid">
          <div class="photos__card">
            <img src="../photos\moment1gymnastics.jpg" alt="photo" />
          </div>
          <div class="photos__card">
            <img src="../photos\moment2gymnastics.jpg" alt="photo" />
          </div>
          <div class="photos__card">
            <img src="../photos\moment3gymnastics.jpg" alt="photo" />
          </div>
          <div class="photos__card">
            <img src="../photos\moment4gymnastics.jpg" alt="photo" />
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
    <script src="../js\yoga.js"></script>
  </body>
</html>