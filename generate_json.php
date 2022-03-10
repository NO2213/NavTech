<?php 
require_once 'config.php';


$sql    = 'SELECT * FROM '.$dbname.'.employee ORDER BY id ASC';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // data strored in array
  while($row = $result->fetch_assoc()) {
	  $Id 			 = $row["id"];
	  $FullName 	 = $row["full_name"];
	  $Age 			 = $row["age"];
	  $ContactNumber = $row["contactnumber"];
	  $NRIC 		 = $row["nric"];
	  $Status 		 = $row["status"];
	  
	$generate_array[] = array('id' 		 	  => $Id,
							  'full_name' 	  => $FullName,
							  'age' 		  => $Age,
							  'contactnumber' => $ContactNumber,
							  'nric' 		  => $NRIC
							 );
  }
} else {
  echo "0 results";
}
$conn->close();

//ea($generate_array);

// encode array to json
$json = json_encode($generate_array);
$bytes = file_put_contents("employee.json", $json); 
//echo "The number of bytes written are $bytes.";
?>
