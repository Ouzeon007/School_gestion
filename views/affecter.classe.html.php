<h2 class="a5"> <i class="fa-regular fa-folder-open fa-lg" style="color: #1c588a;"></i> DEMANDE</h2>
    <form action="<?webRoot?>" method="post" >
        <div class="addcontainer1">
            <div class="CONTENU">
                <h2 class="niveau">Grade</h2>
                <select name="grade" id="" class="gradeselect">
                    <option value="L1">Ingenieur</option>
                    <option value="L2">Docteur</option>
                    <option value="L3">Bachelier</option>
                    <option value="M1">Master</option>
                </select>
                
                <h2 class="b4">Nom <input type="text" name="nom_prof" class="Libelle1"> Prenom <input type="text" name="prenom_prof" class="Libelle1"></h2>
                <div >
                    <h2 class="module">Module</h2>
                    <p class="modulecheck"> <span><input type="checkbox" name="module[]" value="UML" > <Label for="">UML</Label> </span>  <span><input type="checkbox" name="module[]" value="PHP" > <Label for="">PHP</Label> </span>  <span><input type="checkbox" name="module[]" value="JAVA" > <Label for="">JAVA</Label> </span> <span><input type="checkbox" name="module[]" value="PYTHON" > <Label for="">PYTHON</Label> <span> </p>
                </div>
                <div>
                    <h2 class="classe">CLASSE</h2>
                    <p class="classecheck"> <?php foreach($classes as $value):?> <span><input type="checkbox" name="classe[]" value="<?= $value['libelle']?>" ><?= $value['libelle']?></span> <?php endforeach;?></p>

                </div>
                <BUtton class="btannuler1">Annuler</BUtton> <button class="btenregistrer1" name="action" value="form-add-classe" >Enregistrer</button>
            </div>
        </div>

    </form>