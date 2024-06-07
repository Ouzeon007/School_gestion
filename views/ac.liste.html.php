<h2 class="c1"> <i class="fa-solid fa-table fa-lg" style="color: #1c588a;"></i> TABLEAUX DEMANDES</h2>

<h2 class="c2">Etat</h2>
<form action="<?webRoot?>" method="post">
<select name="Etat" id="" Class="c3">
  <option value="All" <?= ($selectedFilter == 'All')?'selected':''?>>All</option>
  <option value="Encours" <?= ($selectedFilter == 'Encours')?'selected':''?> >En cours</option>
  <option value="Accepter" <?= ($selectedFilter == 'Accepter')?'selected':''?> >Accepter</option>
  <option value="Refuser" <?= ($selectedFilter == 'Refuser')?'selected':''?> >Refuser</option>

</select>
<button class="button" type="submit" name="action" value="form-filtre-demande-ac" >OK</button>
</form>


<table class="table-style">
  <thead>
    <tr>
      <th>Matricule</th>
      <th>Nom et Prenom</th>
      <th>Classe</th>
      <th>Date</th>
      <th>Type</th>
      <th>ETat</th>
      <th>Description</th>
    </tr>
  </thead>

  <tbody>

  <tr>
        <?php foreach($demandes as $value): ?>
          <tr>
            <td><?= $value['matricule'] ?></td>
            <td><?= $value['nom']." ".$value['prenom'] ?></td>
            <td><?= $value['libelle'] ?></td>
            <td><?= $value['date'] ?></td>
            <td><?= $value['type'] ?></td>
            <td><?= $value['etat'] ?></td>
            <td class="a10"><a href="<?webRoot?>/?action=detail&demande_id=<?=$value['id']?>" class="s1"  >Detail</a></td>
          </tr>
        <?php endforeach; ?>  
      
      </tr>
  </tbody>
</table>

<div>
  <button class="e1" >Precedent</button> <button class="e2" >1</button> <button class="e3" >2</button> <button class="e4">3</button> <button class="e5">Suivant</button>
</div>
