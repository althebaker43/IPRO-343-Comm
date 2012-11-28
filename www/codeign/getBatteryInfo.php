<?php
$ids = array();
$volts = $currents =  $power= $temp= array();
$tmp_volts = $tmp_currents = $tmp_id = $tmp_temperature= $tmp_power = array();

for ($i=0; $i < 3; $i++) { 
	array_push($ids,strval($i+1));

	for ($x=0; $x < 4; $x++) { 
		$v = rand(0,15);
		$cur = rand(0,15);
		$pow = $v * $cur;
		$t = rand(60,120);
		array_push($tmp_volts, array(strval($x), strval($v)));
		array_push($tmp_currents, array(strval($x), strval($cur)));	
		array_push($tmp_power, array(strval($x), strval($pow)));
		array_push($tmp_temperature, array(strval($x), strval($t)));
	}
	array_push($volts,$tmp_volts);
	array_push($currents,$tmp_currents);
	array_push($power,$tmp_power);
	array_push($temp,$tmp_temperature);
	$tmp_volts = $tmp_currents =$tmp_temperature = $tmp_power = array();
}

//print_r($ids);
//print_r($volts);
$data = array('id' => $ids,'voltages'=>$volts,'currents'=> $currents,'temp'=>$temp,'power'=>$power);
echo json_encode($data);	
?>