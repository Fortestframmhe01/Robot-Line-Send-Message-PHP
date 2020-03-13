<?php 
	use LineNotify\LineNotify;

	require_once 'lib/LineNotify.php';

	$line = new LineNotify();

	$line->setToken('cRe6bljxNlbJEvo8ThegJaERqDMb4QcRpKlmhbl2lHq');
	$line->setMessage('Hello World, im from thailand');

	$send = $line->lineSend(); // Return 1, 0

	if($send == 1) {
		echo "Successful";
	} else {
		echo "Fail";
	}
?>