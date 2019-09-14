<html>
<head>
</head>

<body>
<h3>#1. Count( ), recursive count( )</h3>
<!---Create array, count elements------->
	<?php
		$faculties = array('business_students' => array('Rosie','Alice','Bob'),
						'art_students' => array('Alex','Josh','Ryan','John')
		);
		echo '<pre>';
		print_r($faculties);
		echo '</pre>';
		
		$number_of_faculty = count($faculties);
		$number_of_students = count($faculties, COUNT_RECURSIVE);
		$number_of_business_student = count($faculties['business_students']);
		$number_of_art_student = count($faculties['art_students']);
		
		echo "<br>Number of faculty: " . $number_of_faculty;
		echo "<br>Number of current students: ". ($number_of_students - $number_of_faculty);
		echo "<br>Number of business students: " .$number_of_business_student;
		echo "<br>Number of art students: " .$number_of_art_student;
	?>
	
<!----Merge array----------------------->
<hr>
<h3>#2. array_merge() </h3>
	<?php 
		$person = array('name' => 'Alice', 
						'age' => '20',
						'city' => 'Peking',
						'job' => 'Manager');
		echo '<pre>';				
		print_r($person);
		echo '</pre>';
		
		$newData =array('name' => 'Alice',
						'city' => 'California',
						'publication' => 'The star');
		echo '<pre>';				
		print_r($newData);
		echo '</pre>';
		
		$person = array_merge($person, $newData);
		echo '<pre>';
		print_r($person);
		echo '</pre>';
	?>
	
<!----Merge array----------------------->
<hr>
<h3>#3. Range(0,100,20) </h3>
	<?php
		foreach (range(0,100,20) as $number){
			echo $number. " ";
		}
	?>
	
<!----Merge array----------------------->
<hr>
<h3>#4. Array_combine </h3>	
	<?php
		$city = array(array('Sydney','Wollongong'),'Melbourne','Perth');
		$state = array('NSW','VIC','SA');
		$combiner = array_combine($state,$city);
		
		echo "<pre>";
		print_r($combiner);
		echo "</pre>";
	?>
	
<!----One-dimensional array into arrays ------------------->
<hr>
<h3>#5. Array_chunk </h3>	
	<?php
		$city = array('Sydney','Wollongong','Kiama','Melourne','Perth','Darwin');
		$city_new=array_chunk($city,3);
		
		echo "<pre>";
		print_r($city);
		echo "</pre>";
		
		echo "<pre>";
		print_r($city_new);
		echo "</pre>";
	?>
<!----Extract a subarray from an array ------------------->
<hr>
<h3>#6. Array_slice </h3>	
	<?php
		$station=array('Dometic Airport', 'International Airport','Wolli Creek','Sutherland','Waterfall','Wollongong');
		$station_left=array_slice($station,3);
		
		echo "<pre>";
		print_r($station);
		print_r($station_left);
		echo "</pre>";
	?>
<!----Replace a section of an array with another array?????? ------------------->
<hr>
<h3>#7. Array_splice </h3>	
	<?php
		$alphabet = array("a","b","c","g","h");
		$fix_alphabet = array("d","e","f");
		
		echo "<pre>";		
		print_r($alphabet);
		echo "</pre>";
		
		$alphabet_new = array_splice($alphabet,3,0,$fix_alphabet);
		
		echo "<pre>";		
		print_r($alphabet);
		echo "</pre>";
		
	?>
<!----Sort array based on values ------------------->
<hr>
<h3>#8. asort/arsort </h3>	
	<?php
		$city = array(array('Sydney','Wollongong'),'Melbourne','Perth');
		$state = array('NSW','VIC','SA');
		$combiner = array_combine($state,$city);
		$sorted_city = asort($city);
		$reverse_city = arsort($city);
		
		print_r($sorted_city);
		Print_r($reverse_city);
	?>
<!----Sort array based on keys ------------------->
<hr>
<h3>#9. ksort/krsort </h3>	
	<?php
		$city = array(array('Sydney','Wollongong'),'Melbourne','Perth');
		$state = array('NSW','VIC','SA');
		$combiner = array_combine($state,$city);
		$sorted_city = ksort($city);
		$reverse_city = krsort($city);
		
		print_r($sorted_city);
		Print_r($reverse_city);
	?>
<!----Determine how many times elements appear in array ------------------->
<hr>
<h3>#10. array_count_values </h3>	
	<?php
		$color = array ("red","green","black","red","yellow","pink","pink","black","white");
		$counts= array_count_values($color);
		
		echo "<pre>";
		print_r($color);
		Print_r($counts);
		echo "</pre>";
	?>
<!----Determine whether a given key or index exists in an array ------------------->
<hr>
<h3>#12. Return all the keys of an array </h3>	
	<?php
		echo "<pre>";
		print_r($faculties);
		echo "</pre>";

		echo "All faculties are: ";
		foreach(array_keys($faculties) as $faculty){
			echo $faculty . ", ";
		}
	?>
<h3>#13. Determine whether a given key exists </h3>
	<?php		
		if (array_key_exists('business_students', $faculties)){
			echo "Business_students is in the array.";
		}
	?>
<h3>#14. Determine whether element exists </h3>
	<?php
		echo "Index of elemennt Ryan: ";
		echo array_search("Ryan",$faculties['art_students']). "<br>";
	?>
<!----Determine whether a given key or index exists in an array ------------------->
<hr>
<h3>#15. array_map() </h3>
	<?php
		function grade($n)
		{
			if ($n >= 80){
				return "HD";
			}else return "pass";
		}

		$a = array("Nick" => 90, "Josh" => 80, "Alice" => 61);
		$b = array_map("grade", $a);
		
		echo "<pre>";
		print_r($a);
		print_r($b);
		echo "</pre>";
	?>
<!----Pick random ------------------->
<hr>
<h3>#16. Create random color </h3>
	<?php
		$color='#';
		$colors = array (0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F');
		for($i=0;$i<6;$i++){
			$color.=$colors[array_rand($colors)];
		}
		echo $color;
	?>
<!----Swap key and value ------------------->
<hr>
<h3>#17. Array flip </h3>
	<?php
		$draft= array("10/12" => "Alice",
					  "11/12" => "Tom",
					  "9/12" => "Tom",
					  "12/12" => "Alice");
					  
		$submission = array_flip($draft);

		echo "<pre>";
		print_r($draft);
		print_r($submission);
		echo "</pre>";
	?>
<!----Find the difference between arrays ------------------->
<hr>
<h3>#18. array_diff </h3>
	<?php
		$text = "This is a sample text. Writing whatever .";
		$words = explode(' ',$text);
		
		$second_text = "This is a second text. Writing whatever you want .";
		$words2 = explode(' ',$second_text);

		echo "<pre>";
		echo $text;
		echo "<br>" .$second_text . "<br>";
		print_r($words);
		print_r($words2);
		
		echo "diff(list2, list1)";;
		$diff_words = array_diff($words2, $words);
		print_r($diff_words);
		echo "diff(list1, list2)";
		$diff_words = array_diff($words, $words2);
		print_r($diff_words);
		echo "</pre>";	
	?>
	
<h3>#19. Common between two arrays </h3>
	<?php 
		$common = array_intersect($words,$words2);
		echo "<pre>";
		print_r($common);
		echo "<br>Number of common words: ".count($common);
		echo "</pre>";
	?>
<!----Swap key and value ------------------->
<hr>
<h3>#20. Filter </h3>	
	<?php
		function test_odd($var)
		{
		return($var & 1);
		}

		$a1=array(100,34,2,3,4);
		print_r(array_filter($a1,"test_odd"));
	?>
</body>
</html>