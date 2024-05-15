<?php
error_reporting(0);
  function freehandle() {
    session_start();
    if (isset($_SESSION['numc'])) {        
      require "../includes/db_connect.php";
      $sql = "SELECT * FROM payment_info WHERE (numc = :numc AND free = :free AND class=:class) ";
      $stmt = $pdo->prepare($sql);
      $free=1;
      $class='pilates';
      $stmt->bindParam(':numc', $_SESSION['numc']);
      $stmt->bindParam(':free', $free);
      $stmt->bindParam(':class', $class);
      if ($stmt->execute()) {
        $count = $stmt->rowCount();
        if ($count == 0) {
           echo '<a href="../includes/free.php?class=pilates" class="btn">15 Days free trial</a>';
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
      $class='pilates';
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
    <title>SHEFIT/PILATES CLASS</title>
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
          <h1>Effective PILATES</h1>
          <h2>Do pilates today for better tomorrow</h2>
          <?php freehandle(); ?>
        </div>
        <div class="header__image">
          <img src="../photos\pilates6.jpg" alt="header" />
        </div>
      </div>
    </header>

    <section class="section__container why__container">
      <div class="why__image">
        <img src="../photos\photos-4.jpg" alt="why yoga" />
      </div>
      <div class="why__content">
        <h2 class="section__header">Why You Should Go To Pilates</h2>
        <p>
         
Embarking on a journey with Pilates unveils a pathway to holistic well-being, 
weaving together the realms of physical vitality and mental harmony. Within the embrace of each movement,
 stretch, and muscle engagement, lies a symphony of wellness awaiting discovery. Pilates isn't merely a workout;
  it's a sanctuary for the body and mind.
        </p>
        <ul>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
Pilates improves Core Strength          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Pilates increases flexibility
          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
          Pilates enhances muscle tone
          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Pilates improves balance and coordination
          </li>
          <li>
            <span><i class="ri-checkbox-circle-fill"></i></span>
            Pilates increases energy and vitality
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
          <h4>Stress Relief and Mindfulness</h4>
          <p>
            Pilates incorporates elements of mindfulness, such as focused breathing and concentration on movement.
          </p>
        </div>
        <div class="hero__card">
          <span><img src="../photos/icon-4.png" alt="hero" /></span>
          <h4>Overall Well-Being</h4>
          <p>
            Pilates is not just a physical workout but also a holistic practice that nurtures the mind-body connection. By promoting physical fitness, mental clarity, and emotional balance, Pilates contributes to overall well-being and quality of life.
          </p>
        </div>
      </div>
    </section>

    <section class="section__container classes__container" id="classes">
      <p class="section__subheader">PILATES CLASSES</p>
      <h2 class="section__header">Choose Your Level & Focus</h2>
      <div class="classes__grid">
        <div class="classes__image">
          <img src="../photos/pilates1.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(1); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/pilates3.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(2); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/pilates4.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(3); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/pilates5.jpg" alt="classes" />
          <div class="classes__content">
              <?php membership(1); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/pilatesgroupejpg.jpg" alt="classes" />
          <div class="classes__content">
            <?php membership(2); ?>
          </div>
        </div>
        <div class="classes__image">
          <img src="../photos/pilates6.jpg" alt="classes" />
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
            videoSource = "../videos/pilates/pilates1.mp4";
            break;
          case 2:
            videoSource = "../videos/pilates/pilates2.mp4";
            break;
          case 3:
            videoSource = "../videos/pilates/pilates3.mp4";
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
            <p>Onetime access to all club</p>
            <p>Group trainer</p>
            <p>Book a group class</p>
            <p>Fitness orientation</p>
            <a class="btn membership__btn" href="pay.php?period=year&class=pilates">GET STARTED</a>
          </div>
          <div class="membership__card">
            <h4>MONTHLY CARD</h4>
            <h2>200 DT</h2>
            <h3>For 1 Month</h3>
            <h4>ENJOY ALL THE FEATURES</h4>
            <p>Group classes</p>
            <p>Discuss fitness goals</p>
            <p>Group trainer</p>
            <p>Fitness orientation</p>
            <a class="btn membership__btn" href="pay.php?period=month&class=pilates">GET STARTED</a>
          </div>
          <div class="membership__card">
            <h4>WEEKLY CARD</h4>
            <h2>85 DT</h2>
            <h3>For 1 Week</h3>
            <h4>ENJOY ALL THE FEATURES</h4>
            <p>Access to yoga area</p>
            <p>Group trainer</p>
            <p>Group classes</p>
            <p>Fitness orientation</p>
            <a class="btn membership__btn" href="pay.php?period=week&class=pilates">GET STARTED</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container stories__container" id="stories">
        <p class="section__subheader">SUCCESS STORIES</p>
        <h2 class="section__header">Inspiring Pilates Journeys</h2>
        <div class="stories__grid">
          <div class="stories__card">
            <div class="stories__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <p>
                This Pilates class has been a game-changer for me. The diverse range of classes and expert guidance have not only enhanced my flexibility but also brought tranquility to my busy life.
              </p>
            </div>
            <div class="stories__author">
              <img src="../photos/storiespilates.jpg" alt="author" />
              <div class="stories__author__details">
                <h4>Isadora Montgomery</h4>
                <h6>Pilates Enthusiast</h6>
              </div>
            </div>
          </div>
          <div class="stories__card">
            <div class="stories__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <p>
                The personalized sessions and tailored guidance have not only alleviated my discomfort but also uplifted my overall well-being. A remarkable resource for both novices and seasoned Pilates practitioners.
              </p>
            </div>
            <div class="stories__author">
              <img src="../photos/storiespilates2.jpg" alt="author" />
              <div class="stories__author__details">
                <h4>Seraphina Blackwood</h4>
                <h6>Pilates Advocate</h6>
              </div>
            </div>
          </div>
          <div class="stories__card">
            <div class="stories__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <p>
                The on-demand classes empower me to practice at my convenience, and the mindfulness exercises have brought a newfound clarity to my life. A must-visit for anyone embracing holistic wellness.
              </p>
            </div>
            <div class="stories__author">
              <img src="../photos/storypilates3.jpg" alt="author" />
              <div class="stories__author__details">
                <h4>Genevieve Hartley</h4>
                <h6>Pilates Enthusiast</h6>
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
            <p>Pilates Workshops</p>
          </div>
          <div class="banner__card">
            <h4>10</h4>
            <p>Years of Pilates Expertise</p>
          </div>
         
        </div>
      </section>
  
     
  
      <section class="section__container photos__container">
        <p class="section__subheader">GALLERY</p>
        <h2 class="section__header">Explore Our Latest Moments</h2>
        <div class="photos__grid">
          <div class="photos__card">
            <img src="../photos\pilatesmoment1.jpg" alt="photo" />
          </div>
          <div class="photos__card">
            <img src="../photos\pilatesmoment2.jpg" alt="photo" />
          </div>
          <div class="photos__card">
            <img src="../photos\pilatesmoment3.jpg" alt="photo" />
          </div>
          <div class="photos__card">
            <img src="../photos\pilatesmoment4.jpg" alt="photo" />
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