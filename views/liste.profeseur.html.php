<h2 class="c1"> <i class="fa-solid fa-table fa-lg" style="color: #1c588a;"></i> TABLEAUX PROFESSEURS</h2>

<h2 class="c2">Etat</h2>
<form action="<?webRoot?>" method="post">
<select name="Module" id="" Class="c3">
  <option value="All" <?= ($selectedFilter2 == 'All')?'selected':''?>>All</option>
  <option value="PHP" <?= ($selectedFilter2 == 'PHP')?'selected':''?> >PHP</option>
  <option value="UML" <?= ($selectedFilter2 == 'UML')?'selected':''?> >UML</option>
  <option value="JAVA" <?= ($selectedFilter2 == 'JAVA')?'selected':''?> >JAVA</option>
  <option value="PYTHON" <?= ($selectedFilter2 == 'PYTHON')?'selected':''?> >PYTHON</option>

</select>
<button class="button" type="submit" name="action" value="form-filtre-module" >OK</button>
</form>


<button Class="c4"> <P class="s5"><i class="fa-regular fa-newspaper fa-bounce fa-lg" style="color: #ffffff;"></i></P> <a href="<?webRoot?>/?action=add-prof" class="s">NOUVEAUX</a></button>
<table class="table-style">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Grade</th>
      <th>Module</th>
      <th>Option</th>
    </tr>
  </thead>

  <tbody>

  <tr>
        <?php foreach($professeurs as $value): ?>
          <tr>
            <td><?=  $value['nom'] ?></td>
            <td><?= $value['prenom'] ?></td>
            <td><?= $value['grade'] ?></td>
            <td><?= implode("-",$value["module"])?></td>
            <td class="a10"><a href="<?webRoot?>/?action=classe&prof_id=<?=$value['id']?>" class="s1"  >Classe</a> || <a href="<?webRoot?>/?action=module&prof_id=<?=$value['id']?>" class="s1"  >Module</a> || <a href="<?webRoot?>/?action=detailprof&prof_id=<?=$value['id']?>" class="s1"  >Detail</a></td>
          </tr>
        <?php endforeach; ?>  
      
      </tr>
  </tbody>
</table>

<div>
  <button class="e1" >Precedent</button> <button class="e2" >1</button> <button class="e3" >2</button> <button class="e4">3</button> <button class="e5">Suivant</button>
</div>