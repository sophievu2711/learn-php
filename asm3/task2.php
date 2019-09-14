<html>
<body>
	<?php
		$table = array(
			'Mark' => array(100,90,80,50),
			'Josh' => array(0,0,100,100),
			'Nick' => array(100,90,85,100)
		);
		
		echo '<pre>';
		print_r($table);
		echo '</pre>';
		
		function compare_sum($a,$b){
			$a_sum = array_sum($a);
			$b_sum = array_sum($b);
			
			if($a_sum == $b_sum){
				return 0;
			}else {
				return ($a_sum > $b_sum)? -1 :1;
			}
		}
		
		uasort($table, 'compare_sum');
		
		echo '<pre>';
		print_r(array_keys($table));
		echo '</pre>';
	?>
</body>
</html>