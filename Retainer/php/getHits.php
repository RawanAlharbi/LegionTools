<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('_db.php');
include('../../Overview/turk/turk_functions.php');
include("../../amtKeys.php");
include("../../isSandbox.php");

  try {
      $dbh = getDatabaseHandle();
  } catch( PDOException $e ) {
      echo $e->getMessage();
  }


if( $dbh ) {


	$task = $_REQUEST['task'];

	$resultHitIds = array();
	$resultHits = array();

	$sql = "SELECT hit_Id FROM hits WHERE task = :task";
	$sth = $dbh->prepare($sql); 
	$sth->execute(array(':task' => $task));
	$hitsForTask = $sth->fetchAll();
	// print_r($result);

	$reviewableHits = turk50_getAllReviewableHits();

	$hitsFromTurk = array();
	foreach($reviewableHits as $hit){
		array_push($hitsFromTurk, $hit->HITId);
	}

	if(is_array($hitsFromTurk)){
		foreach($hitsForTask as $hit){
			if(in_array($hit["hit_Id"], $hitsFromTurk)){
				array_push($resultHitIds, $hit["hit_Id"]);
			}
		}
	}

	foreach($resultHitIds as $hitId){
		// print_r(turk_easyHitToAssn($hitId));
		// echo "</br></br>";
		$hitInfo = turk_easyHitToAssn($hitId);
		array_push($resultHits, $hitInfo);
	}
	
	echo json_encode($resultHits);

}

?>
