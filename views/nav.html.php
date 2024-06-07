<? if($_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT"):?>
    <div class="a">
    <a href="<?webRoot?>/?action=liste"><img src="<?webRoot?>/img/profil.png"class="a1" alt=""></a>
    <P ><SPan class="a2"> <?=$_SESSION["userConnect"]["nom"]." ".$_SESSION["userConnect"]["prenom"]?> </SPan> <span class="a4"> <i class="fa-solid fa-calendar-days" style="color: #1c588a;"></i> Année: <?=$_SESSION["anneeEncours"]["nom"]?></span> <span Class="a3"> <i class="fa-solid fa-school" style="color: #1c588a;"></i> Classe: <?=$_SESSION["userConnect"]["libelle"]?></span> <button class="logout"><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i>  <a href="<?webRoot?>/?action=logout" class="m" >DECONECTION</a></span></button> </P>
    </div>
<?php endif ?>

<? if($_SESSION["userConnect"]["role"]=="ROLE_AC"):?>
    <div class="a">
    <a href="<?webRoot?>/?action=liste-ac"><img src="<?webRoot?>/img/profil.png"class="a1" alt=""></a>
    <P ><SPan class="a2"> <?=$_SESSION["userConnect"]["nom"]." ".$_SESSION["userConnect"]["prenom"]?> </SPan> <span class="a4"> <i class="fa-solid fa-calendar-days" style="color: #1c588a;"></i> Année: <?=$_SESSION["anneeEncours"]["nom"]?></span>  <button class="logout"><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i>  <a href="<?webRoot?>/?action=logout" class="m" >DECONECTION</a></span></button> </P>
    </div>
<?php endif ?>

<? if($_SESSION["userConnect"]["role"]=="ROLE_RP"):?>
    <div class="a">
    <a href="<?webRoot?>/?action=liste-rp"><img src="<?webRoot?>/img/profil.png"class="a1" alt=""></a>
    <div class="menu"><p> <span><a href="<?webRoot?>/?action=liste-rp"class="name_listeclasse">Liste Classe</a></span> <span><a href="<?webRoot?>/?action=liste-rp-prof"class="name_listeprofesseur">Liste Professeur</a></span> </p></div>
    <P ><SPan class="a2"> <?=$_SESSION["userConnect"]["nom"]." ".$_SESSION["userConnect"]["prenom"]?> </SPan> <span class="a41"> <i class="fa-solid fa-calendar-days" style="color: #1c588a;"></i> Année: <?=$_SESSION["anneeEncours"]["nom"]?></span>  <button class="logout"><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i>  <a href="<?webRoot?>/?action=logout" class="m" >DECONECTION</a></span></button> </P>

    </div>
<?php endif ?>