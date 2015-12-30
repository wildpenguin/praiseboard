<?php 
/**
* The front end of the praiseboard stats
* this code usually goes into Controller and View
* I dont want to stick to any framework for the moment
* just explaining the idea
* author: wildpenguin@gmail.com
* 
*/
 	require_once('../PraiseBoard.php');

		// these data comes from the db
		$data = array(
			'bob'=>141,
			'todd'=>190,
			'mark'=>50,
			'mary'=>301,
			'katy'=>150,
		);

		$praiseBoard = new PraiseBoard($data);
		$stats = $praiseBoard->buildStats();

		echo json_encode( array(
			'stats'=>$stats,
		));

	?>

