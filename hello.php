<?php
	$headerNumber = 1;
	while ($headerNumber <= 6) {
		
		echo "<h$headerNumber>Today is " . date("Y.m.d") . "</$headerNumber>";
		$headerNumber = $headerNumber + 1;
		}
	
	