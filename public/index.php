<?php
ob_start();
define("webRoot","http://localhost:8000");
define("DB","../public/bd/ges_inscription.json");
$selectedFilter = isset($_REQUEST["Etat"])? $_REQUEST["Etat"]:"All";
$selectedFilter1 = isset($_REQUEST["Niveau"])? $_REQUEST["Niveau"]:"All";
$selectedFilter2 = isset($_REQUEST["Module"])? $_REQUEST["Module"]:"All";
require_once('../public/bd/convert.php');
require_once('../repositories/demande.repository.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?webRoot?>/CSS/style.css">
  <link rel="stylesheet" href="<?webRoot?>/CSS/conection.css">
  <link rel="stylesheet" href="<?webRoot?>/CSS/rp.css">
</head>
<body>
<?php
if(isset($_REQUEST["action"])){
    require_once('../views/nav.html.php');
    if($_REQUEST["action"]== "add"){
        require_once('../views/add.demande.html.php');
    }elseif($_REQUEST['action']== 'detail'){
        $demandeId=$_GET['demande_id'];
        $demande=getDemandeById($_SESSION["anneeEncours"]['id'],$demandeId);
        require_once('../views/detail.demande.html.php');
    }elseif($_REQUEST['action']== 'classe'){
        $idProf=$_GET["prof_id"];
        $classes=classeDispo($idProf);
        $profId=$_GET['prof_id'];
        $professeur=getProfById($profId);
        $professeursClasse=getProfClasseName($idProf);
        require_once('../views/detail.profclasse.html.php');
    }elseif($_REQUEST['action']== 'module'){
        $classes= getAllClasse();
        $profId=$_GET['prof_id'];
        $professeur=getProfById($profId);
        require_once('../views/detail.profmodule.html.php');
    }elseif($_REQUEST['action']== 'detailprof'){
        $classes= getAllClasse();
        $profId=$_GET['prof_id'];
        $professeur=getProfById($profId);
        $professeursClasse=getProfClasseName($profId);
        require_once('../views/detail.professeur.html.php');
    }elseif($_REQUEST['action']== 'liste'){
        $demandes= getDenamdeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"], $_SESSION["anneeEncours"]['id']);
        require_once('../views/liste.demande.html.php');

    }elseif($_REQUEST['action']== 'liste-ac'){
        $demandes= getAllDemande($_SESSION["anneeEncours"]['id']);
        require_once('../views/ac.liste.html.php');
    
    }elseif($_REQUEST['action']== 'liste-rp'){
        $classes= getAllClasse();
        require_once('../views/rp.liste.html.php');
    }elseif($_REQUEST['action']== 'liste-rp-prof'){
        $professeurs= getAllProfesseur();
        require_once('../views/liste.profeseur.html.php');
    }elseif($_REQUEST['action']== 'add_classe'){
        require_once('../views/add.classe.html.php');
    }elseif($_REQUEST['action']== 'add-prof'){
        $classes= getAllClasse();
        require_once('../views/add.prof.html.php');
    }elseif($_REQUEST['action']== 'logout'){
        unset($_SESSION["userConnect"]);
        unset($_SESSION["anneeEncours"]);
        session_destroy();
        header("location:".webRoot);
    }elseif ($_REQUEST["action"]== "form-filtre-demande"){
        $etat=$_REQUEST["Etat"];
        $demandes= getDenamdeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"], $_SESSION["anneeEncours"]['id'],$etat);
        require_once('../views/liste.demande.html.php');
    }elseif ($_REQUEST["action"]== "form-filtre-demande-ac"){
        $etat=$_REQUEST["Etat"];
        $demandes= fiterParEtat($_SESSION["anneeEncours"]['id'],$etat);
        require_once('../views/ac.liste.html.php');
    }elseif ($_REQUEST["action"]== "form-filtre-niveau"){
        $niveau=$_REQUEST["Niveau"];
        $classes= fiterParNiveau($niveau);
        require_once('../views/rp.liste.html.php');
    }elseif ($_REQUEST["action"]== "form-filtre-module"){
        $niveau=$_REQUEST["Module"];
        $professeurs= fiterParModule($niveau);
        require_once('../views/liste.profeseur.html.php');
    }elseif ($_REQUEST["action"]== "form-add-demande"){
        $newDemande=[
                "id"=> getDemandeId(),
                "date"=> "12/01/2022",
                "etat"=> "Encours",
                "type"=> $_REQUEST["Type"],
                "motif"=>$_REQUEST["motif"],
                "etudiant_id"=>$_SESSION["userConnect"]["id"],
                "annee_id"=>$_SESSION["anneeEncours"]['id'],
            ];
            addDemande($newDemande);
            $demandes= getDenamdeByEtudiantAndAnneeEncours($_SESSION["userConnect"]["id"], $_SESSION["anneeEncours"]['id']);
            // require_once('../views/liste.demande.html.php');
            header("location:".webRoot."?action=liste");
    }elseif ($_REQUEST["action"]== "form-add-classe"){
        $newClasse=[
                "id"=> getClasseId(),
                "libelle"=> $_REQUEST["libelle"],
                "filiere"=> $_REQUEST["filiere"],
                "niveau"=>$_REQUEST["niveau"],
            ];
            addClasse($newClasse);
            $classes= getAllClasse();
            header("location:".webRoot."?action=liste-rp");
    }
    elseif ($_REQUEST["action"]== "form-add-prof"){
        $newProf=[
                "id"=> getProfId(),
                "nom"=> $_REQUEST["nom_prof"],
                "prenom"=> $_REQUEST["prenom_prof"],
                "grade"=> $_REQUEST["grade"],
                "classe"=>getClasseIdByName($_REQUEST["classe"]),
                "module"=>$_REQUEST["module"],
            ];
            addProf($newProf);
            $professeurs= getAllProfesseur();
            header("location:".webRoot."?action=liste-rp-prof");
    }
    elseif ($_REQUEST["action"]== "form-affecter-prof"){
        $idProf=$_GET["prof_id"];
        $classeAffect=[
                "classe"=>getClasseIdByName($_REQUEST["classe-affecter"]),
            ];
        affecterNewData($idProf,"classe",$classeAffect);
            $professeurs= getAllProfesseur();
            $professeursClasse=getProfClasseName($idProf);
            header("location:".webRoot."?action=liste-rp-prof");
    }
    elseif ($_REQUEST["action"]== "form-affecter-module"){
        // $moduleAffect=[
        //         "module"=> $_REQUEST["module-affect"],
        //     ];
        $idProf=$_GET["prof_id"];
        affecterNewModule($idProf,"module",$_REQUEST["module-affect"]);
            $professeurs= getAllProfesseur();
            header("location:".webRoot."?action=liste-rp-prof");
    }   
    elseif ($_REQUEST["action"]== "form-login"){
        $login= $_POST["email"];
        $password= $_POST["password"];
        $etudiantConnect=conection($login,$password);
        if($etudiantConnect== null){
            header("location:".webRoot);
        }else{
            $_SESSION["userConnect"]=$etudiantConnect;
            $_SESSION["anneeEncours"]=getAnneeEncours();
            if($etudiantConnect["role"]=="ROLE_ETUDIANT"){
                header("location:". webRoot ."?action=liste");
                // ob_end_flush();
            }elseif($etudiantConnect["role"]=="ROLE_AC"){
                header("location:". webRoot ."?action=liste-ac");
            }elseif($etudiantConnect["role"]=="ROLE_RP"){
                header("location:". webRoot ."?action=liste-rp");
            }
        }
        
    }elseif ($_REQUEST["action"]== "return-liste-prof"){
            header("location:".webRoot."?action=liste-rp-prof");
    }elseif ($_REQUEST["action"]== "return-liste-classe"){
        header("location:".webRoot."?action=liste-rp");
}
}

    else{
        
        require_once('../views/security/login.html.php');
    }

?>
</body>
</html>