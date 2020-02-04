<?php
	function recListeReservation($db){			
		$select_reservation = mysqli_query($db, "select * from jm_Reservation");
		
		if($select_reservation && $select_reservation->num_rows>0){
		  $select_reservation->fetch_all(MYSQLI_ASSOC);
		}
		return $select_reservation;
	}

	function recReservation($db,$reservID){			
		$select_reserv = mysqli_query($db, "select * from jm_Reservation where idReserv = '".$reservID."'");
		
		$select_reserv_f = mysqli_fetch_array($select_reserv);

		return $select_reserv_f;
	}

	function assignerPc($db,$etudiant_nom,$nomStagReserv,$prenomStagReserv,$horaireResev,$idPc,$colResev){
		//Assigner PC
		$assigncomp = mysqli_query($db, "insert into jm_Reservation(idStagReserv,nomStagReserv,prenomStagReserv,horaireResev,refPcResev,colResev) values('".$etudiant_nom."', '".$nomStagReserv."','".$prenomStagReserv."','".$horaireResev."','".$idPc."','".$colResev."')");
		return $assigncomp;
	}

	function suppressionPc($db,$reservID){
		//	Récupération de réservation par id
		$del_reserv = mysqli_query($db, "delete from jm_Reservation where idReserv = '".$reservID."'");
		return $del_reserv;
	}

?>