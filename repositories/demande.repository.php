<?php

   //definir un tableau de 5  demandes
     //une demande est caracterise
        //numero, chaine genere aleatoirement
         //date 
         //Etat(Encours,Accepte,Refuse)
         //Type (Suspension ou Annulation)
         //motif
         //etudiant (matricule,nom,prenom,
                //dateNaiss(Date php),
                //classe(filiere,niveau,code))

// fonction qui retourne le tableau de demande
// fonction qui retourne le tableau de demande par type
// fonction qui retourne le tableau de demande par etat

function genererChaine(int $nbr):string {
   $numero = bin2hex(random_bytes($nbr));
   return $numero;

}
function genererDate(int $a,$b):string {
   $j = random_int(1, 31);
   $m = random_int(1, 12);
   $a = random_int($a, $b);

   return  "$j/ $m/ $a";
}

function getAllDemande(int|null $anneeId=null):array{
   $demandes=getAllData("demandes");
   if($anneeId==null)return  $demandes;
      $demandeEtu=[];

      foreach ($demandes as $demande){
         if($demande["annee_id"]== $anneeId) {
            $demandeEtu[] =array_merge(getEtudiantById($demande['etudiant_id']),$demande);
         }
      }
      return $demandeEtu;
}

function fiterParEtat(int $anneeId,$etat="All"):array{
   $demandes=getAllDemande($anneeId);
   $demandeEtu=[];
   foreach($demandes as $demande){
      if($etat=="All"){
         $demandeEtu[]= $demande;
      }else{
         if($demande["etat"]==$etat)
            $demandeEtu[]= $demande;
      }
   }
   return $demandeEtu;
}
function fiterParNiveau(string $niveau="All"):array{
   $classes=getAllClasse();
   $classeEtu=[];
   foreach($classes as $classe){
      if($niveau=="All"){
         $classeEtu[]= $classe;
      }else{
         if($classe["niveau"]==$niveau)
            $classeEtu[]= $classe;
      }
   }
   return $classeEtu;
}
function fiterParModule(string $module="All"):array{
   $professeurs=getAllProfesseur();
   $prof=[];
   foreach($professeurs as $professeur){
      if($module=="All"){
         $prof[]= $professeur;
      }else{
         foreach($professeur["module"] as $value){
            if($value==$module){
            $prof[]= $professeur;
         }
      }
   }
   }
   return $prof;
}
function getDemandeByid($anneeId,$id){
   $demandes=getAllDemande($anneeId);
   return getDataById($demandes,$id);
}
function getProfByid($id){
   $professeurs=getAllProfesseur();
   return getDataById($professeurs,$id);
}
function getAllClasse():array{

   return getAllData("classes");
}

function getAllProfesseur():array{

   return getAllData("professeurs");
}
function getAllData(string $key):array {
   return fromJsonToArray("$key");
}
function getAllUsers():array {
   return getAllData("users");
}
function getAllUserByRole(string $role):array{
   $users= getAllUsers();
   $etudiants=[];
   foreach($users as $user){
      if($user["role"]==$role){
         $etudiants[]=$user;
      }
   }
   return $etudiants;
}

function getDataById(array $data, int $id,string $key="id"):array|null{
   foreach($data as $value){
      if($value[$key]==$id){
         return $value;
      }
   }
   return null;
}
function getClasseById(int $id):array|null{
   $classes=getAllClasse();
   return getDataById($classes,$id);
}

function getEtudiantById(int $id):array|null{
   $etudiants=getAllEtudiant();
   return getDataById($etudiants,$id);
}
function getAllEtudiant():array{
   $etudiants=getAllUserByRole("ROLE_ETUDIANT");
   $etudiantsClasse=[];
   foreach($etudiants as $etudiant){
      $classe=getClasseById($etudiant["classe_id"]);
      $etudiantsClasse[]=array_merge($classe,$etudiant);
      }
      return $etudiantsClasse;
   }
   


function getAllAnnee():array{
   return[
    [
      "id"=>1,
      "nom"=>"2023-2024",
      "etat"=> 1,
    ],
    [
      "id"=> 2,
      "nom"=> "2022-2023",
      "etat"=> 0,
    ]
    ];
}

function conection(string $login, string $password):array|null{
   $users=getAllUsers();
   foreach ($users as $user){
      if($user["login"]==$login && $user["password"]==$password){
         if($user["role"]=="ROLE_ETUDIANT") {
            $classe=getClasseById($user["classe_id"]);
            $user=array_merge($classe,$user);
            }
         return $user;
      }
   }
   return null;
}

function getAnneeEncours():array|null{
   $annees=getAllAnnee();
   foreach ($annees as $value){
      if($value["etat"]== 1) {
         return $value;
      }
   }
   return null;
}

function getDenamdeByEtudiantAndAnneeEncours(int $etudiantId, int $anneeId,$etat="All"):array|null{
   $demandes= getAllDemande($anneeId);
   $demandeEtu=[];
   foreach ($demandes as $demande){
      if($etat=="All"){
         if($demande["etudiant_id"]== $etudiantId ) {
         $demandeEtu[]=$demande;
         }
      }else{
         if($demande["etudiant_id"]== $etudiantId && $demande["etat"]== $etat) {
            $demandeEtu[]=$demande;
            }
      }
   }
   return $demandeEtu;
}

function addDemande(array $demande):void{
   fromArrayToJson("demandes", $demande);
}
function addClasse(array $classe):void{
   fromArrayToJson("classes", $classe);
}
function addProf(array $prof):void{
   fromArrayToJson("professeurs", $prof);
}
function affecterNewData(int $id,string $key2,array $new):void{
   fromArrayToJsonUpdate("professeurs","$key2",$id,$new);
}

function getDemandeId(int $i=1):int{
   $demandes=getAllDemande();
   foreach ($demandes as $value){
      if($value["id"]==$i){
         $i++;
}
   }
   return $i;
}

function getClasseId(int $i=1):int{
   $classes=getAllClasse();
   foreach ($classes as $value){
      if($value["id"]==$i){
         $i++;
}
   }
   return $i;
}
function getProfId(int $i=1):int{
   $professeurs=getAllProfesseur();
   foreach ($professeurs as $value){
      if($value["id"]==$i){
         $i++;
}
   }
   return $i;
}
function demandes(int $etudiantId, int $idDemande ):array|null{
   $demandes=getAllDemande();
   foreach ($demandes as $value){
      if($value["etudiant_id"]==$etudiantId && $value["id"]==$idDemande) {
         return $value;
      }
   }
   return null;
}
// function addClasseToProf(int $profId, array $newClasse){
//    fromArrayToJsonUpdate("profs","classe_id",$profId,$newClasse);
// }
function getClasseIdByName(array|null $names):array{
   $classes=getAllClasse();
   $classesSelect=[];
   foreach($classes as $classe){
      foreach($names as $name){
         if($classe["libelle"]==$name){
            $classesSelect[]=$classe["id"];
         }
      }
      
   }
   return $classesSelect;
}
function classeDispo(int $idProf): array {
   $classes = getAllClasse();
   $profs = getAllProfesseur();
   $classesDispo = [];
   foreach ($profs as $prof) {
       if ($prof["id"] == $idProf) {
           foreach ($classes as $classe) {
               if (!in_array($classe["id"], $prof["classe"])) {
                   $classesDispo[] = $classe;
               }
           }
       }
   }

   return $classesDispo;
}

function getProfClasseName(int $id):array{
   $profs = getAllProfesseur();
   $profClasse = [];
   foreach($profs as $prof){
      if($prof['id'] == $id){
         foreach($prof['classe'] as $value){
            $profClasse[] = getClasseById($value);
         }
      }
   }
   return $profClasse;
}
function affecterNewModule(int $id,string $key2,array $new):void{
   fromArrayToJsonUpdate1("professeurs","$key2",$id,$new);

}
?>