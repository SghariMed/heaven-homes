<?php 

include '../../entities/user.php';
include '../../core/UserC.php';




if( isset($_POST['nom'])  and isset($_POST['prenom']) and isset($_POST['mail']) and isset($_POST['username']) and isset($_POST['mdp']) )
{
session_start();

$user = new user(0,$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mdp'],'role_admin',$_POST['username']);

	

		$UserC=new UserC();
	$UserC->modifieruser($user,$_SESSION['id'] );
	header('Location: AfficherUser.php');
}
else{
	echo "verifier les champs" ;
}

 ?>