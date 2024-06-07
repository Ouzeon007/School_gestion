  <h2 class="c1"> <i class="fa-solid fa-table fa-lg" style="color: #1c588a;"></i> TABLEAUX DEMANDES</h2>

  <h2 class="c2">Etat</h2>
  <form action="<?webRoot?>" method="post">
  <select name="Etat" id="" Class="c3">
    <option value="All" <?= ($selectedFilter == 'All')?'selected':''?>>All</option>
    <option value="Encours" <?= ($selectedFilter == 'Encours')?'selected':''?> >En cours</option>
    <option value="Accepter" <?= ($selectedFilter == 'Accepter')?'selected':''?> >Accepter</option>
    <option value="Refuser" <?= ($selectedFilter == 'Refuser')?'selected':''?> >Refuser</option>

  </select>
  <button class="button" type="submit" name="action" value="form-filtre-demande" >OK</button>
  </form>


  <button Class="c4"> <P class="s5"><i class="fa-regular fa-newspaper fa-bounce fa-lg" style="color: #ffffff;"></i></P> <a href="<?webRoot?>/?action=add" class="s">NOUVEAUX</a></button>
  <table class="table-style">
    <thead>
      <tr>
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
