<?php
error_reporting(0);
  function freehandle() {
    session_start();
    if (isset($_SESSION['numc'])) {        
      require_once "../includes/db_connect.php";
      $sql = "SELECT * FROM payment_info WHERE (numc = :numc AND free = :free AND class=:class) ";
      $stmt = $pdo->prepare($sql);
      $free=1;
      $class='meditation';
      $stmt->bindParam(':numc', $_SESSION['numc']);
      $stmt->bindParam(':free', $free);
      $stmt->bindParam(':class', $class);
      if ($stmt->execute()) {
        $count = $stmt->rowCount();
        if ($count == 0) {
           echo '<a href="../includes/free.php?class=meditation" class="btn">15 Days free trial</a>';
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
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css\yoga.css" />
    <title>SHEFIT/MEDITATION CLASS</title>
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
          <h1>Effective MEDITATION</h1>
          <h2>Do Meditation today for better tomorrow</h2>
          <?php freehandle(); ?>
        </div>
        <div class="header__image">
          <img src="../photos/meditationhome.jpg" alt="header" />
        </div>
      </div>
    </header>

    <section class="section__container why__container">
      <div class="why__image">
        <img src="../photos/meditation1.jpg" alt="why yoga" />
      </div>
      <div class="why__content">
        <h2 class="section__header">Why You Should Go To Meditation</h2>
        <p>
        
Engaging in meditation provides a comprehensive path to well-being, addressing both the physical and mental aspects of health.
 By incorporating mindful breathing techniques, focused attention, and relaxation exercises, meditation cultivates 
 a deeper awareness of the present moment.
 This practice helps alleviate stress and anxiety, enhances emotional resilience, and fosters a profound sense of inner tranquility.
        </p>
        <ul>
            <li>
                <span><i class="ri-checkbox-circle-fill"></i></span>
                Meditation enhances cognitive function
            </li>
            <li>
                <span><i class="ri-checkbox-circle-fill"></i></span>
                Meditation promotes deeper breathing
            </li>
            <li>
                <span><i class="ri-checkbox-circle-fill"></i></span>
                Meditation increases physical and mental resilience
            </li>
            <li>
                <span><i class="ri-checkbox-circle-fill"></i></span>
                Meditation improves focus and concentration
            </li>
            <li>
                <span><i class="ri-checkbox-circle-fill"></i></span>
                Meditation infuses purpose into daily life
            </li>
            <li>
            <audio id="myAudio" src="../videos/Respiration-Sensations - 34min.mp3" preload="auto"></audio>
            <button onclick="toggleAudio()" class="btn">LISTEN</button>

            </li>
        </ul>
      </div>
      <script>
    var audio = document.getElementById("myAudio");
  
    function toggleAudio() {
        if (audio.paused) {
            audio.play();
        } else {
            audio.pause();
        }
     
    }
  
</script>
    </section>

    <section class="hero" id="hero">
        <div class="section__container hero__container">
          <div class="hero__card">
            <span><img src="../photos/icon-1.png" alt="hero" /></span>
            <h4>Enhanced Well-Being</h4>
            <p>Experience heightened well-being through the nurturing practice of meditation, fostering physical health and emotional balance.</p>
          </div>
          <div class="hero__card">
            <span><img src="../photos/icon-2.png" alt="hero" /></span>
            <h4>Mental Clarity</h4>
            <p>Attain mental clarity and focus with the transformative power of meditation, cultivating a clear mind and calm spirit.</p>
          </div>
          <div class="hero__card">
            <span><img src="../photos/icon-3.png" alt="hero" /></span>
            <h4>Emotional Resilience</h4>
            <p>Build emotional resilience and inner strength through regular meditation practice, fostering greater adaptability and peace of mind.</p>
          </div>
          <div class="hero__card">
            <span><img src="../photos/icon-4.png" alt="hero" /></span>
            <h4>Stress Reduction</h4>
            <p>Reduce stress and anxiety levels with the calming influence of meditation, promoting a sense of tranquility and balance in daily life.</p>
          </div>
        </div>
      </section>

      <section class="section__container classes__container" id="classes">
        <p class="section__subheader">MEDITATION CLASSES</p>
        <h2 class="section__header">Choose Your Level & Focus</h2>
        <div class="classes__grid">
          <div class="classes__image">
            <img src="../photos/meditationlevel1.jpg" alt="classes" />
            <div class="classes__content">
              <?php membership(1); ?>
            </div>
          </div>
          <div class="classes__image">
            <img src="../photos/meditationlevel2.jpg" alt="classes" />
            <div class="classes__content">
              <?php membership(2); ?>
            </div>
          </div>
          <div class="classes__image">
            <img src="../photos/meditationlevel3.jpg" alt="classes" />
            <div class="classes__content">
              <?php membership(3); ?>
            </div>
          </div>
          <div class="classes__image">
            <img src="../photos/meditationlevel11.jpg" alt="classes" />
            <div class="classes__content">
              <?php membership(1); ?>
            </div>
          </div>
          <div class="classes__image">
            <img src="../photos/meditationlevel22.jpg" alt="classes" />
            <div class="classes__content">
              <?php membership(2); ?>
            </div>
          </div>
          <div class="classes__image">
            <img src="../photos/meditationlevel33.jpg" alt="classes" />
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
              videoSource = "../videos/meditation/meditation1.mp4";
              break;
            case 2:
              videoSource = "../videos/meditation/meditation2.mp4";
              break;
            case 3:
              videoSource = "../videos/meditation/meditation3.mp4";
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
            <a class="btn membership__btn" href="pay.php?period=year&class=meditation">GET STARTED</a>
          
          </div>
          <div class="membership__card">
            <h4>MONTHLY CARD</h4>
            <h2>200 DT</h2>
            <h3>For 1 Month</h3>
            <h4>ENJOY ALL THE FEATURES</h4>
            <p>Discuss fitness goals</p>
            <p>Group trainer</p>
            <p>Fitness orientation</p>
            <a class="btn membership__btn" href="pay.php?period=month&class=meditation">GET STARTED</a>
          </div>
          <div class="membership__card">
            <h4>WEEKLY CARD</h4>
            <h2>85 DT</h2>
            <h3>For 1 Week</h3>
            <h4>ENJOY ALL THE FEATURES</h4>
            <p>Access to yoga area</p>
            <p>Group trainer</p>
            <p>Fitness orientation</p>
            <a class="btn membership__btn" href="pay.php?period=week&class=meditation">GET STARTED</a>
          </div>
        </div>
      </div>

    </section>

    <section class="section__container stories__container" id="stories">
        <p class="section__subheader">TESTIMONY</p>
        <h2 class="section__header">Inspiring Testimonials</h2>
        <div class="stories__grid">
          <div class="stories__card">
            <div class="stories__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <p>Engaging in meditation has been truly transformative for me. The guided sessions and mindfulness practices have not only enhanced my mental clarity but also brought a profound sense of peace to my daily life.</p>
            </div>
            <div class="stories__author">
              <img src="../photos/woman1meditation.jpg" alt="author" />
              <div class="stories__author__details">
                <h4>SAMIA STANVARD</h4>
                <h6>Meditation Enthusiast</h6>
              </div>
            </div>
          </div>
          <div class="stories__card">
            <div class="stories__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <p>Meditation has become an integral part of my wellness routine. The calming techniques and mindfulness exercises have helped me manage stress and cultivate a deeper sense of inner peace. Highly recommended for anyone seeking tranquility.</p>
            </div>
            <div class="stories__author">
              <img src="../photos/woman2meditation.jpg" alt="author" />
              <div class="stories__author__details">
                <h4>STAN BIN</h4>
                <h6>Meditation Advocate</h6>
              </div>
            </div>
          </div>
          <div class="stories__card">
            <div class="stories__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <p>The practice of meditation has brought clarity and serenity into my life. Through regular meditation sessions, I have discovered a profound connection with the present moment, enabling me to navigate life's challenges with greater resilience.</p>
            </div>
            <div class="stories__author">
              <img src="../photos/woman3meditation.jpg" alt="author" />
              <div class="stories__author__details">
                <h4>EMILY BECKIR</h4>
                <h6>Meditation Practitioner</h6>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="banner">
        <div class="section__container banner__container">
          <div class="banner__card">
            <h4>0</h4>
            <p>Happy Meditators</p>
          </div>
          <div class="banner__card">
            <h4>3</h4>
            <p>Meditation Workshops</p>
          </div>
          <div class="banner__card">
            <h4>4</h4>
            <p>Years of Meditation</p>
          </div>
        </div>
      </section>
      <section class="section__container photos__container">
        <p class="section__subheader">GALLERY</p>
        <h2 class="section__header">Explore Our Gallery</h2>
        <div class="photos__grid">
          <div class="photos__card">
            <img src="../photos/meditationmoment1.jpg" alt="photo" />
          </div>
          <div class="photos__card">
            <img src="../photos/meditationmoment2.jpg" alt="photo" />
          </div>
          <div class="photos__card">
            <img src="../photos/meditationmoment3.jpg" alt="photo" />
          </div>
          <div class="photos__card">
            <img src="../photos/meditationmoment4.jpg" alt="photo" />
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