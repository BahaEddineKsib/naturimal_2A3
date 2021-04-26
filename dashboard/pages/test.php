<?PHP


class avisC {


	function ajouteravis ($avis){
        
		$sql="insert into avis (id_client,cmt,stars) values (:id_client,:cmt,:stars)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
     

        $id_client=$avis->getid_client();
		$cmt=$avis->getcmt();
		$stars=$avis->getstars();
		
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':cmt',$cmt);
		$req->bindValue(':stars',$stars);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficheraviss(){
		//$sql="SElECT * From cmt e inner join formationphp.cmt a on e.idc= a.idc";
		$sql="SElECT * From avis ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function getname($id_client){
		$sql="SELECT * From user where id =$id_client ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		foreach($liste as $row){
			$name=$row['nom'];
			
		}
		return $name;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function calculerstars($stars){
		$sql="SELECT * From avis where stars =$stars ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		$i=0;
		foreach($liste as $row){
			$i++;
			
		}
		return $i;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}


	function supprimeravis($idc){
		$sql="DELETE FROM avis where idc= :idc";
		$sql2="DELETE FROM reponse where idc= :idc";
		$sql3="DELETE FROM avisrating where idavis= :idc";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req2=$db->prepare($sql2);
		$req3=$db->prepare($sql3);
		$req->bindValue(':idc',$idc);
		$req2->bindValue(':idc',$idc);
		$req3->bindValue(':idc',$idc);
		try{
			$req->execute();
			$req2->execute();
			$req3->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifieravis($avis,$idc){ 
		$sql="UPATE avis SET cmt=:cmt WHERE idc=:idc";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);

        $cmt=$avis->getcmt();

		$req->bindValue(':idc',$idc);
		$req->bindValue(':cmt',$cmt);

		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}

	function recupereravis($idc){
		$sql="SELECT * from avis where idc=$idc";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeaviss($idc){
		$sql="SELECT * from avis where idc=$idc";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>