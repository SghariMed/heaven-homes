<?php  session_start(); 
include "../../core/UserC.php";
include "../../core/FideliteC.php";
include "../../entities/fedilite.php";
 if (empty($_SESSION['id']))
 {
     echo "<script type='text/javascript'>";
echo "alert('Please Login First');
window.location.href='../login.html';";
echo "</script>";
     
 }
  $FideliteC=new FideliteC();
  $nombres=$FideliteC->afficherfedilite($_SESSION['id']);
$nombre=  $nombres[0];


    $UserC=new UserC();
    $result=$UserC->recupereruser($_SESSION['id']);

    foreach($result as $row){


$nom=$row->nom;
$prenom=$row->prenom;
$mail=$row->mail;
$username=$row->username;
    }

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
        <div class="about lobster-font-family">
                       <div class="container">
                <h2 class="text-center text-capitalize">About our Heaven Homes</h2>
                <img src="imgs/1.png">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <h4>A best place to enjoy your life</h4>
                        <p>Sip a fresh cocktail by the Oasis Pool Bar and witness the dazzling sun paint the sky in shades of pink, orange and purple</p>
                       
                        <button><a href="#">Read more</a></button>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="img"></div>
                    </div>
                </div>
                <h2 class="text-capitalize" id="room">Profile</h2>
                

 <form  onsubmit="return validateForm()" name="myForm" method="POST" action="ModifierUserC.php" >
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                             <div class="form-group">
                             <input class="form-control"  id="nom" name="nom" value="<?php echo $nom ?>"  type="text" placeholder="nom"   />
                      </div>
                                   <div class="form-group">
                                <input class="form-control"  id="prenom" value="<?php echo $prenom ?>" name="prenom" type="text" placeholder="prenom"   />
                  
  
                      </div>   
                             
                            
                            <div class="form-group">
                                <input class="form-control"  id="mail" value="<?php echo $mail ?>" name="mail" type="email" placeholder="mail"   />
                  
  
                      </div>   
                            <div class="form-group">
                                <input class="form-control"  id="username" value="<?php echo $username ?>" name="username" type="text" placeholder="username"   />
                  
  
                      </div> 

                           <div class="form-group">
                                <input class="form-control"  id="mdp" name="mdp" type="password" placeholder="mdp"   />
                  
  
                      </div>                  

                             
                            
                       
                        </div>
                       
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase"  type="submit">Envoi</button>
                    </div>
                </form>


                <p>points de  fidelite:<?php
if($nombre['nombre'] == "")
{
         echo "0"; 
}
else
{
           echo $nombre['nombre'];   
}


        



                 ?> </p>
                <script>

function validateForm() {
      var nom = document.forms["myForm"]["nom"].value;
 var prenom = document.forms["myForm"]["prenom"].value;
 var mail = document.forms["myForm"]["mail"].value;
 var username = document.forms["myForm"]["username"].value;
 var mdp = document.forms["myForm"]["mdp"].value;
  if (nom == "") {
    alert("nom vide");
    return false;
  }
   if (prenom == "") {
    alert("prenom vide");
    return false;
  }
    if (mail == "") {
    alert("mail vide");
    return false;
  } 
      if (username == "") {
    alert("username vide");
    return false;
  } 
      if (mdp == "") {
    alert("mdp vide");
    return false;
  } 
     alert("c bon");
 
}
</script>

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

    </body>
</html>