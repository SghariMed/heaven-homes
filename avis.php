<?php  session_start(); 



// On récupère nos variables de session
if (empty($_SESSION['id']))
{
    echo "<script type='text/javascript'>";
echo "alert('Please Login First');
window.location.href='../../login.html';";
echo "</script>";
    
}
?>

<?php
include "../../config.php";
include "../../core/avisC.php";
include "../../entities/avis.php";
$avisC = new avisC();

include "../../core/reponseC.php";
include "../../entities/reponse.php";
$reponseC = new reponseC();

include "../../core/avisratingC.php";
include "../../entities/avisrating.php";
$avisratingC = new avisratingC();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heaven homes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two|Noto+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light text-capitalize main-font-family">
            <div class="container">
                  <a class="navbar-brand" href="index.html"><img src="imgs/logo.png" alt="#" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" >
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" >Home <span class="sr-only">(current)</span></a>
                        </li>
                          <li class="nav-item ">
                            <a class="nav-link" href="ModifierUser.php">profile</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="AfficherMaison.php">Maisons</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="forum.php">forum</a>
                        </li>
                        
                     
                        <li class="nav-item book d-flex align-items-center">
                            <a class="nav-link" href="../Logout.php">Logout</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
 

<header id="home">
    <div class="small-container">
        <form class="main-font-family text-center">
            <input type="search">
            <i class="fas fa-search"></i>
            <input type="submit" value="Search">
        </form>
        <div class="row">
            <div class="col-lg-4 col-12 lobster-font-family text-center ">
                <h2 class="text-right">dreaming of weekend getaway? or a enchating end-of-year escape! take advantage of extraordinary savings and indulgent extras with our unmissable staycation offer</h2>
                <button><a href="#">About Heaven Homes</a></button>
            </div>
        </div>
        <div class="h-slider roboto-font-family welcome d-flex align-items-center justify-content-center">
            <h1 class="text-capitalize">Welcome to<br> Heaven Homes</h1>
            <div id="headerslider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item carousel-three active"></div>
                    <div class="carousel-item carousel-two"></div>
                    <div class="carousel-item carousel-one"></div>
                </div>
                <a class="carousel-control-prev" href="#headerslider" role="button" data-slide="prev">
                    <i class="fas fa-angle-double-left"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#headerslider" role="button" data-slide="next">
                    <i class="fas fa-angle-double-right"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="st-rec"></div>
    <div class="rd-rec"></div>
</header>

<div class="about lobster-font-family">
    <div class="container">
        <h2 class="text-center text-capitalize">forum</h2>
        <section class="ftco-section contact-section ftco-no-pt">
        <div class="container">
            <?php
            $aviss = $avisC->rechercherListeaviss($_GET['idc']);
            foreach ($aviss as $row) {
                $name = $avisC->getname($row['id_client']);
                $avisrated = $avisratingC->checkvoted($_SESSION['id'], $row["idc"]);
                $vote = -1;
                $idar = -1;
                $replays1=$reponseC->calculerreplay($row["idc"]);
                foreach ($avisrated as $row2) {
                    $vote = $row2['rating'];
                    $idar = $row2['idar'];
                }
                $countup = $avisratingC->calculeRating1($row['idc']);
                $countdown = $avisratingC->calculeRating0($row['idc']);
            ?>
                <div class="row block-9">
                    <div class="col-md-12 order-md-last d-flex">
                        <div class="col-md-12 ftco-animate">
                            <div class="project-wrap hotel">
                                <div class="text p-4">
                                <p class="mb-2"><span class="star"> avis </span>
                                            <?php
                                            $i = 0;
                                            for ($i = 0; $i < $row['stars']; $i++) {
                                            ?>
                                                <span class="fa fa-star star" style="color: yellow;"></span>
                                            <?php
                                            }

                                            for ($i = 0; $i < 5 - $row['stars']; $i++) {
                                            ?>
                                                <span class="fa fa-star"></span>
                                            <?php
                                            }
                                            ?>
                                        </p>
                                    <span class="days"><?php echo $name;
                                                            if ($name == $_SESSION['nom']) {
                                                                echo '(Vous)';
                                                            } ?></span>
                                    <h3><a href="avis.php?idc=<?php echo $row["idc"]; ?>"><?php echo $row["cmt"]; ?></a></h3>
                                    <ul>
                                    <form method="POST">
                                                <input name="vote" value="<?php echo $vote; ?>" hidden>
                                                <input name="idar" value="<?php echo $idar; ?>" hidden>
                                                <input name="idc" value="<?php echo $row["idc"]; ?>" hidden>
                                                <button name="up" class="fa fa-thumbs-up" <?php if ($vote == 1) { ?> style="color: green; border: none;background: none;" <?php } else { ?> style="color: grey; border: none;background: none;" <?php } ?>></button><?php echo  $countup ?>
                                                <button name="down" class="fa fa-thumbs-down" <?php if ($vote == 0) { ?> style="color: red; border: none;background: none;" <?php } else { ?> style="color: grey; border: none;background: none;" <?php } ?>></button><?php echo $countdown ?>
                                                <span class="fa fa-reply "></span><?php echo $replays1; ?>
                                            </form>
                                    </ul>
                                    <?php
                                    $replays = $reponseC->afficherreponses($row["idc"]);
                                    foreach ($replays as $row2) {
                                        $name2 = $avisC->getname($row2['id_client']);
                                    ?>
                                    
                                        <div style="margin-left:100px; color:black; background-color:#f0f2f5;">
                                            <span class="days"><?php echo $name2;
                                                            if ($name2 == $_SESSION['nom']) {
                                                                echo '(Vous)';
                                                            } ?></span>
                                            <p><?php echo $row2["rep"]; ?></p>
                                            <ul>
                                            
                                            </ul>
                                        </div>
                                        <br>
                                    <?php
                                    }
                                    ?>
                                    <form method="POST">
                                        <div style="margin-left:100px; color:black; background-color:#f0f2f5;">
                                            <textarea name="replay" style="resize: none; width: 400px; background-color:#f0f2f5;">entrer votre commentaire ici ....</textarea>
                                            <button name="ajouter" class="btn btn-primary">Publier</button>
                                            <input type="text" name="idc" value="<?php echo $row["idc"]; ?>" hidden>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            <?php
            }
            ?>

            <a href="forum.php"><button class="btn btn-primary py-3 px-5">forum</button></a>
        </div>

    </section>
        <section class="ftco-intro ftco-section ftco-no-pt">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <div class="img" style="background-image: url(images/bg_5.jpg);">
                            <div class="overlay"></div>
                            <h2>SEIN SAIN CENTRE .. SEIN SAIN TOUJOURS </h2>
                            <p>ON EST LA POUR VOUS , N'HESITEZ PLUS !</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ajouter avis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">

                <div class="modal-body">
                    <div style="color: black;"> Donner votre avis
                        <select name="stars" id="stars">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <textarea name="comment" style="resize: none; width: 400px;">entrer votre commentaire ici ....</textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button name="ajouter" class="btn btn-primary">Publier</button>
                </div>
            </form>
        </div>
    </div>
</div>



<footer class="noto-font-family">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <h3>Useful links</h3>
                    <ul class="text-capitalize">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Rooms</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <h3>Find us</h3>
                    <p>Sidi Bou Said, Street Beji Kaeid Sebsi ,  Tunisia<br>
                        (+216) 90 371 355<br>
                        (+216) 55 690 357<br>
                        heavenhomes@gmail.com
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 col-12 form">
                    <h3>News letter</h3>
                    <form>
                        <input type="email" placeholder="Email">
                        <input type="submit">
                    </form>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright noto-font-family">
    <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/">Free Html Templates</a></p>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(function () {

        'use strict';

        var winH = $(window).height();

        $('header').height(winH);

        $('.navbar ul.navbar-nav li a').on('click', function (e) {

            var getAttr = $(this).attr('href');

            e.preventDefault();
            $('html').animate({scrollTop: $(getAttr).offset().top}, 1000);
        });
    });
</script>
</body>
</html>
    <?php
    if (isset($_POST['ajouter'])) {

        $avis = new avis($_SESSION['id'], $_POST["comment"], $_POST["stars"]);

        $avisC->ajouteravis($avis);

    ?>
        <script>
            window.location.replace("forum.php");
        </script>
    <?php
    }
    ?>

    <?php
    if (isset($_POST['up'])) {


        if ($_POST['vote'] == -1) {
            $avisrating = new avisrating($_SESSION['id'], $_POST['idc'], 1);


            $avisratingC->ajouterrating($avisrating);
        }
        if (($_POST['vote'] == 0)) {
            $avisratingC->modifierratingto1($_POST['idar']);
        }


    ?>
        <script>
            window.location.replace("forum.php");
        </script>
    <?php
    }
    ?>


    <?php
    if (isset($_POST['down'])) {

        if ($_POST['vote'] == -1) {
            $avisrating = new avisrating($_SESSION['id'], $_POST['idc'], 0);

            $avisratingC->ajouterrating($avisrating);
        }
        if (($_POST['vote'] == 1)) {
            $avisratingC->modifierratingto0($_POST['idar']);
        }


    ?>
        <script>
            window.location.replace("forum.php");
        </script>
    <?php
    }
    ?>

<?php


//définir la session une session est un tableau temporaire
//1 er point c quoi une session
//
?>
