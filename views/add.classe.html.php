<h2 class="a5"> <i class="fa-regular fa-folder-open fa-lg" style="color: #1c588a;"></i> AJOUTER UNE CLASSE</h2>
    <form action="<?webRoot?>" method="post" >
        <div class="addcontainer">
            <div class="b1">
                <h2 class="niveau">Niveau</h2>
                <select name="niveau" id="" class="niveauselect">
                    <option value="L1">Licence1</option>
                    <option value="L2">Licence2</option>
                    <option value="L3">Licence3</option>
                    <option value="M1">Master1</option>
                    <option value="M2">Master2</option>
                </select>
                <h2 class="filiere">Filiere</h2>
                <select name="filiere" id="" class="filiereselect">
                    <option value="GLRS">GLRS</option>
                    <option value="IAGE">IAGE</option>
                    <option value="CPD">CPD</option>
                    <option value="TTL">TTL</option>
                </select>

                <h2 class="b4">Nom de la classe  <input type="text" name="libelle" class="Libelle" ></h2>
                
                
                <BUtton class="btannuler"name="action" value="return-liste-classe">Annuler</BUtton> <button class="btenregistrer" name="action" value="form-add-classe" >Enregistrer</button>
            </div>
        </div>

    </form>