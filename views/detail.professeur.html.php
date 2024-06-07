<h2 class="d" > <i class="fa-solid fa-circle-info fa-lg" style="color: #1c588a;"></i> AFFECTER CLASSE</h2>
    <div class="contenuprofdetail" >
    <img src="<?webRoot?>/img/profil.png" class="img" alt="">
    <div>
        <P class="d2" > <i class="fa-solid fa-signature" style="color: #1c588a;"></i>Nom: <?=$professeur["nom"]?></P>
        <p class="d3"> <i class="fa-solid fa-signature" style="color: #1c588a;"></i> Prenon: <?=$professeur["prenom"]?></p>
        <p class="d4"> <i class="fa-solid fa-graduation-cap" style="color: #1c588a;"></i> Grade: <?=$professeur["grade"]?></p>
    </div>

    <div>
        <p class="d5" style="margin-top: -20%;"> <i class="fa-solid fa-calendar-days" style="color: #1c588a;"></i> Année: <?=$_SESSION["anneeEncours"]["nom"]?></p>
        <p class="d6"> <i class="fa-solid fa-quote-left" style="color: #1c588a;"></i> Professeur Matricule = <?=$professeur["id"]?></p>
        <p class="d7"> <i class="fa-regular fa-calendar" style="color: #1c588a;"></i> Module Etudiée: <?= implode("-",$professeur["module"])?></p>
        <p class="d7"> <i class="fa-regular fa-calendar" style="color: #1c588a;"></i> Classe Affecter: <?php foreach($professeursClasse as $value):?> <span><?= $value['libelle']?></span>-<?php endforeach;?> </p>

    </div>
    
     </div>

