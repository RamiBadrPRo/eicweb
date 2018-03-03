<?php 
	include "phpserver.php";
	$ab = $conn->prepare("SELECT * FROM `lists`");
	$ab->execute();
	$result = $ab->fetchAll(PDO::FETCH_ASSOC); 
	$i = $j = 0;
	$tab0 = [];
	foreach($result as $m) {
		array_push($tab0,[$m['schedule'],$m['name']]);
	}
	$tab = [];
	for($i = 0; $i < 20; $i++) {
		array_push($tab,[0,[]]);
	}
	for($j = 0; $j<count($result);$j++) {
		for($i = 0;$i<20;$i++) {
			if($tab0[$j][0][$i] == "*")  {
				$tab[$i][0] += 1;
				array_push($tab[$i][1],$tab0[$j][1]);
			}
		}
	}
	echo json_encode($tab);
?>