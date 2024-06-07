<h2 class="c1"> <i class="fa-solid fa-table fa-lg" style="color: #1c588a;"></i> TABLEAUX CLASSES</h2>

<h2 class="c2">Niveau</h2>
<form action="<?webRoot?>" method="post">
<button Class="c4"> <P class="s5"><i class="fa-regular fa-newspaper fa-bounce fa-lg" style="color: #ffffff;"></i></P> <a href="<?webRoot?>/?action=add_classe" class="s">NOUVEAUX</a></button>
<select name="Niveau" id="" Class="c3" style="margin-left: 22%;" >
  <option value="All" <?= ($selectedFilter1 == 'All')?'selected':''?>>All</option>
  <option value="L1" <?= ($selectedFilter1 == 'L1')?'selected':''?> >Licence1</option>
  <option value="L2" <?= ($selectedFilter1 == 'L2')?'selected':''?> >Licence2</option>
  <option value="L3" <?= ($selectedFilter1 == 'L3')?'selected':''?> >Licence3</option>
  <option value="M1" <?= ($selectedFilter1 == 'M1')?'selected':''?> >Master1</option>
  <option value="M2" <?= ($selectedFilter1 == 'M2')?'selected':''?> >Master2</option>

</select>
<button class="button" type="submit" name="action" value="form-filtre-niveau" >OK</button>
</form>


<table class="table-style">
  <thead>
    <tr>
      <!-- <th>Matricule</th> -->
      <th>filiere</th>
      <th>Niveau</th>
      <th>Nom</th>
      <!-- <th>Type</th>
      <th>ETat</th> -->
    </tr>
  </thead>

  <tbody>

  <tr>
        <?php foreach($classes as $value): ?>
          <tr>
            
            <td><?= $value['filiere']?></td>
            <td><?= $value['niveau'] ?></td>
            <td><?= $value['libelle'] ?></td>
          </tr>
        <?php endforeach; ?>  
      
      </tr>
  </tbody>
</table>

<div>
  <button class="e1" >Precedent</button> <button class="e2" >1</button> <button class="e3" >2</button> <button class="e4">3</button> <button class="e5">Suivant</button>
</div>
