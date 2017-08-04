<?php 
function get_display_member($member){

$sql312 = "SELECT * FROM all_studentsrec WHERE studentid = '$member' ";
		$query312 = mysql_query($sql312);
		while($rocomname22 = mysql_fetch_array($query312)){
			$get_fname = $rocomname22['FirstName'];
			$get_lname = $rocomname22['LastName'];
			}
			
			return $get_fname.' '.$get_lname;
			
			
}
			
?>