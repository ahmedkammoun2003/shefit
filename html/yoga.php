<?php
error_reporting(0);
  function freehandle() {
    session_start();
    if (isset($_SESSION['numc'])) {        
      require_once "../includes/db_connect.php";
      $sql = "SELECT * FROM payment_info WHERE (numc = :numc AND free = :free AND class= :class) ";
      $stmt = $pdo->prepare($sql);
      $free=1;
      $class='yoga';
      $stmt->bindParam(':numc', $_SESSION['numc']);
      $stmt->bindParam(':free', $free);
      $stmt->bindParam(':class', $class);
      if ($stmt->execute()) {
        $count = $stmt->rowCount();
        if ($count == 0) {
           echo '<a href="../includes/free.php?class=yoga" class="btn">15 Days free trial</a>';
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
      $class='yoga';
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
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="../css\yoga.css" />
    <title>SHEFIT/YOGA CLASS</title>
  </head>
  <body>
    <nav>
      <div class="nav__logo">
        <img src="../photos/logo.png" alt="logo" />
        <span>SHEFIT</span>
      </div>
      <ul class="nav__links">
        <li class="link"><a href="#home">Home</a></li>
        <li class="link"><a href="#classes">Videos</a></li>
        <li class="link"><a href="#membership">Membership</a></li>
        <li class="link"><a href="../index.php#contact">Contact</a></li>
      </ul>
    </nav>
    <header id="home">
      <div class="section__container header__container">
        <div class="header__content">
          <h1>Effective YOGA</h1>
          <h2>Do yoga today for better tomorrow</h2>
          <?php freehandle(); ?>
        </div>
        <div class="header__image">
          <img src="../photos/header.jpg" alt="header" />
        </div>
      </div>
    </header>

    <section class="section__container why__container">
      <div class="why__image">
        <img src="../photos/why.jpg" alt="why yoga" />
      </div>
      <div class="why__content">
        <h2 class="section__header">Why You Should Go To Yoga</h2>
        <p>
          Engaging in yoga offers a holistic approach to wellness, encompassing
          both physical and mental benefits. Through a series of poses,
          stretches, and muscle strength. Its meditative aspects encourage
          mindfulness, reducing stress and anxiety while promoting a sense of
          inner peace.
        </p>
        <ul>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Yoga boosts brain power
          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Yoga helps you to breathe better
          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Yoga improves your strength
          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Yoga helps you to focus
          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Yoga helps give meaning to your day
          </li>
        </ul>
      </div>
    </section>

    <section class="hero" id="hero">
      <div class="section__container hero__container">
        <div class="hero__card">
          <span><img src="../photos/icon-1.png" alt="hero" /></span>
          <h4>Healthy Lifestyle</h4>
          <p>
            Embrace a healthy lifestyle through the transformative power of yoga
            and cultivate physical vitality and inner peace.
          </p>
        </div>
        <div class="hero__card">
          <span><img src="../photos/icon-2.png" alt="hero" /></span>
          <h4>Body & Mind Balance</h4>
          <p>
            Through purposeful poses and mindful breathing, yoga cultivates a
            strong, flexible body while nurturing inner calm.
          </p>
        </div>
        <div class="hero__card">
          <span><img src="../photos/icon-3.png" alt="hero" /></span>
          <h4>Meditation Practice</h4>
          <p>
            Discover inner serenity and mindfulness as you cultivate a profound
            connection with the present moment.
          </p>
        </div>
        <div class="hero__card">
          <span><img src="../photos/icon-4.png" alt="hero" /></span>
          <h4>Self-Care</h4>
          <p>
            Discover the transformative power of self-care through yoga and
            embrace moments of tranquility and mindfulness.
          </p>
        </div>
      </div>
    </section>

    <section class="section__container classes__container" id="classes">
      <p class="section__subheader">YOGA CLASSES</p>
      <h2 class="section__header">Choose Your Level & Focus</h2>
      <div class="classes__grid">
        <div class="classes__image">
          <img src="../photos/classes-1.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(1); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/classes-2.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(2); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/classes-3.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(3); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/classes-4.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(1); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/classes-5.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(2); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/classes-6.jpg" alt="classes" />
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
            videoSource = "../videos/yoga/yoga1.mp4";
            break;
          case 2:
            videoSource = "../videos/yoga/yoga2.mp4";
            break;
          case 3:
            videoSource = "../videos/yoga/yoga3.mp4";
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
            <h2>499 DT</h2>
            <h3>For 1 Year</h3>
            <h4>ENJOY ALL THE FEATURES</h4>
            <p>Group trainer</p>
            <p>Fitness orientation</p>
            <p>Discuss fitness goals</p>
            <a class="btn membership__btn" href="pay.php?period=year&class=yoga">GET STARTED</a>
          </div>
          <div class="membership__card">
            <h4>MONTHLY CARD</h4>
            <h2>200 DT</h2>
            <h3>For 1 Month</h3>
            <h4>ENJOY ALL THE FEATURES</h4>
            <p>Discuss fitness goals</p>
            <p>Group trainer</p>
            <p>Fitness orientation</p>
            <a class="btn membership__btn" href="pay.php?period=month&class=yoga">GET STARTED</a>
          </div>
          <div class="membership__card">
            <h4>WEEKLY CARD</h4>
            <h2>85 DT</h2>
            <h3>For 1 Week</h3>
            <h4>ENJOY ALL THE FEATURES</h4>
            <p>Access to yoga area</p>
            <p>Group trainer</p>
            <p>Fitness orientation</p>
            <a class="btn membership__btn" href="pay.php?period=week&class=yoga">GET STARTED</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container stories__container" id="stories">
      <p class="section__subheader">TESTIMONY</p>
      <h2 class="section__header">Successful Stories</h2>
      <div class="stories__grid">
        <div class="stories__card">
          <div class="stories__content">
            <span><i class="ri-double-quotes-l"></i></span>
            <p>
              This yoga class has been a game-changer for me. The variety of
              classes and guided sessions have not only improved my flexibility
              but also brought a sense of calm to my hectic days.
            </p>
          </div>
          <div class="stories__author">
            <img src="../photos/stories-1.jpg" alt="author" />
            <div class="stories__author__details">
              <h4>Emily STANVARD</h4>
              <h6>Trainer</h6>
            </div>
          </div>
        </div>
        <div class="stories__card">
          <div class="stories__content">
            <span><i class="ri-double-quotes-l"></i></span>
            <p>
              The tailored sessions and expert guidance have not only eased my
              discomfort but also boosted my overall well-being. A fantastic
              resource for both beginners and experienced yogis.
            </p>
          </div>
          <div class="stories__author">
            <img src="../photos/stories-2.jpg" alt="author" />
            <div class="stories__author__details">
              <h4>Ava BIN</h4>
              <h6>Member</h6>
            </div>
          </div>
        </div>
        <div class="stories__card">
          <div class="stories__content">
            <span><i class="ri-double-quotes-l"></i></span>
            <p>
              The on-demand classes allow me to practice whenever I can, and the
              mindfulness exercises have brought a new level of clarity to my
              life.A must-visit for anyone seeking holistic wellness.
            </p>
          </div>
          <div class="stories__author">
            <img src="../photos/stories-3.jpg" alt="author" />
            <div class="stories__author__details">
              <h4>Sophia BECKIR</h4>
              <h6>Member</h6>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="banner">
      <div class="section__container banner__container">
        <div class="banner__card">
          <h4>0</h4>
          <p>Happy Customers</p>
        </div>
        <div class="banner__card">
          <h4>3</h4>
          <p>Yoga Workshops</p>
        </div>
        <div class="banner__card">
          <h4>4</h4>
          <p>Years of Experience</p>
        </div>
       
      </div>
    </section>

   

    <section class="section__container photos__container">
      <p class="section__subheader">GALLERY</p>
      <h2 class="section__header">See The Latest Photos</h2>
      <div class="photos__grid">
        <div class="photos__card">
          <img src="../photos/photos-1.jpg" alt="photo" />
        </div>
        <div class="photos__card">
          <img src="../photos/photos-2.jpg" alt="photo" />
        </div>
        <div class="photos__card">
          <img src="../photos/photos-3.jpg" alt="photo" />
        </div>
        <div class="photos__card">
          <img src="../photos/photos-4.jpg" alt="photo" />
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