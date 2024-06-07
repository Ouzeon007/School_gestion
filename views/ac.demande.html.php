<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://localhost:8000/projet/public/style.css">
</head>
<body>
    
<div class="a">

<img src="Capture d'écran 2023-12-05 224313.png"class="a1" alt="">
<P ><SPan class="a2"> Mr. Mouhamed FALL  </SPan> <span class="a4"> <i class="fa-solid fa-calendar-days" style="color: #1c588a;"></i> Annee: 2023/2024</span> <span Class="a3"> <i class="fa-solid fa-school" style="color: #1c588a;"></i> Attachés de classe</span></P>

</div>
<h2 class="c1"> <i class="fa-solid fa-table fa-lg" style="color: #1c588a;"></i> TABLEAUX DEMANDES</h2>

<h2 class="c2">Etat</h2>
<select name="Etat" id="" Class="c3">
<option value="1"></option>
<option value="2">En cours</option>
<option value="3">Accepter</option>
<option value="4">Refuser</option>

</select>
<button class="a11">OK</button>
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
      <?php
      require_once('C:\Users\nouss\OneDrive\Documents\phpglrsa\projet\repositories\demande.repository.php'); 
      foreach($tabDemande as $value): ?>
        <tr>
          <td><?php echo $value["Date"] ;?></td>
          <td><?php echo $value["Type"] ;?></td>
          <td><?php echo $value["Etat"] ;?></td>
          <td class="a10">Detail</td>
        </tr>
      <?php endforeach; ?>  
    
    </tr>
</tbody>
</table>

</body>
</html>