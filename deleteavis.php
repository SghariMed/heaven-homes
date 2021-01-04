
<?PHP
include "../../config.php";
include "../../core/avisC.php";
$avisC=new avisC();
if (isset($_GET["idc"])){
	$avisC->supprimeravis($_GET["idc"]);
    header('Location:forum.php');
}

?>