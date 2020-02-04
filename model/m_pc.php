<?php
	function recListePc($db){			
		$select_ordinateur = mysqli_query($db, "select * from jm_Pc where DispoPc = '0'"); 
		
		if($select_ordinateur && $select_ordinateur->num_rows>0){
		  $select_ordinateur->fetch_all(MYSQLI_ASSOC);
		}
		return $select_ordinateur;
	}

	function recListePcById($db,$idPc){			
		$select_idPc = mysqli_query($db, "select * from jm_Pc where idPc = '".$idPc."'"); 
		
		if($select_idPc && $select_idPc->num_rows>0){
		  $select_idPc->fetch_all(MYSQLI_ASSOC);
		}
		return $select_idPc;
	}

	function updatePcDispo($db,$idPc){
		//update ordinateur id..
		$update_ordinateur_dispoStag = mysqli_query($db, "update jm_Pc set DispoPc = '0' where idPc = '".$idPc."'");
	}

	function updatePcNonDispo($db,$idPc){
		//update ordinateur id..
        $update_ordinateur_dispoStag = mysqli_query($db, "update jm_Pc set DispoPc = '1' where idPc = '".$idPc."'");
	}

?>