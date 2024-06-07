<h2 class="d" > <i class="fa-solid fa-circle-info fa-lg" style="color: #1c588a;"></i> Detail</h2>
    <img src="<?webRoot?>/img/profil.png" class="d1" alt="">
    <div>
        <P class="d2" > <i class="fa-solid fa-signature" style="color: #1c588a;"></i>Nom: <?=$demande["nom"]?></P>
        <p class="d3"> <i class="fa-solid fa-signature" style="color: #1c588a;"></i> Prenon: <?=$demande["prenom"]?></p>
        <p class="d4"> <i class="fa-solid fa-graduation-cap" style="color: #1c588a;"></i> Classe: <?=$demande["libelle"]?></p>
    </div>

    <div>
        <p class="d5" > <i class="fa-solid fa-calendar-days" style="color: #1c588a;"></i> Année: <?=$_SESSION["anneeEncours"]["nom"]?></p>
        <p class="d6"> <i class="fa-solid fa-quote-left" style="color: #1c588a;"></i> Type: <?=$demande["type"]?></p>
        <p class="d7"> <i class="fa-regular fa-calendar" style="color: #1c588a;"></i> Date: <?=$demande["date"]?></p>
        <p class="d8">Motif</p>
    </div>
    <div class="d9" ><p class="b10" > <?=$demande["motif"]?> </p></div>
    <? if($_SESSION["userConnect"]["role"]=="ROLE_AC"):?>
        <button class="b11">Rejeter</button> <button class="b12">Valider</button>
    <?php endif ?>

