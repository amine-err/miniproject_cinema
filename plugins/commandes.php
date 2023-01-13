<?php 

function afficher()
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM films ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
function getAdmin($email, $motpasse){
  
    if(require("connexion.php")){
  
      $req = $access->prepare("SELECT * FROM admin WHERE email=? AND password=?");
      $req->execute(array($email,$motpasse));
      if($req->rowCount()==1){
        $data=$req->fetch(); 
        return $data ;
      }
      else{
        return false ; 
      }
      $req->closeCursor() ; 
  
    }
}