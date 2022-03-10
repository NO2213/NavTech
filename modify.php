<?php 
require_once 'config.php';

$Action 	 = isset($_POST['action']) ? $_POST['action'] : '';
$Id     	 = isset($_POST['Id']) ? $_POST['Id'] : '';
$ReturnArray = array('Content'=>'', 'Message'=>'', 'Status'=>'');

//$ReturnArray['Message'] = $Action;

if ($Action == 'Edit')
{
	$sql    = 'SELECT * FROM '.$dbname.'.employee WHERE Id="'.$Id.'"';
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {  	
	// data retrieved in array
	$row		   = $result->fetch_assoc();
	$FullName 	   = $row["full_name"];
	$Age 		   = $row["age"];
	$ContactNumber = $row["contactnumber"];
	$NRIC 	   	   = $row["nric"];

	$ReturnArray['Content'] = '<td><input type="text" id="fullname_'.$Id.'" name= "fullname_'.$Id.'" value="'.$FullName.'" /></td><td><input type="text" id="age_'.$Id.'" name= "age_'.$Id.'" value="'.$Age.'" /></td><td><input type="text" id="contactnumber_'.$Id.'" name= "contactnumber_'.$Id.'" value="'.$ContactNumber.'" /></td><td><input type="text" id="nric_'.$Id.'" name= "nric_'.$Id.'" value="'.$NRIC.'" /></td><td><div id="Action_'.$Id.'"><a id="Save_'.$Id.'" href="#a" class="btn btn-success btn-xs">Save</a> <a id="Cancel_'.$Id.'" href="#a" class="btn btn-danger btn-xs">Cancel</a></div></td>';
	}
}
else if ($Action == 'Delete')
{
	
}
else if ($Action == 'Save')
{

	/*************************************************************
						UPDATE	STARTS
	*************************************************************/
	$fullname 	   = isset($_POST['fullname']) 		? $_POST['fullname'] 	  : '';
	$age 	 	   = isset($_POST['age']) 			? $_POST['age'] 		  : '';
	$contactnumber = isset($_POST['contactnumber']) ? $_POST['contactnumber'] : '';
	$nric 	 	   = isset($_POST['nric']) 		    ? $_POST['nric'] 		  : '';
	
	$sql = 'UPDATE '.$dbname.'.employee SET full_name="'.$fullname.'", age="'.$age.'", contactnumber="'.$contactnumber.'", nric="'.$nric.'"  WHERE Id="'.$Id.'"';

	if ($conn->query($sql) === TRUE) {
	  $ReturnArray['Message'] = "updated successfully";
	} else {
	  $ReturnArray['Message'] = "Error ";
	}
	/*************************************************************
						UPDATE	ENDS
	*************************************************************/	
	
	/*************************************************************
						FETCH	STARTS
	*************************************************************/
	$sql    = 'SELECT * FROM '.$dbname.'.employee WHERE Id="'.$Id.'"';
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {  	
	// data retrieved in array
	$row		   = $result->fetch_assoc();
	$FullName 	   = $row["full_name"];
	$Age 		   = $row["age"];
	$ContactNumber = $row["contactnumber"];
	$NRIC 	   	   = $row["nric"];

	$ReturnArray['Content'] = '<td>'.$FullName.'</td><td>'.$Age.'</td><td>'.$ContactNumber.'</td><td>'.$NRIC.'</td><td><div id="Action_'.$Id.'"><a id="Edit_'.$Id.'" href="#a" class="btn btn-primary btn-xs">Edit</a> <a id="Delete_'.$Id.'" href="#a" class="btn btn-danger btn-xs">Delete</a></div></td>';
	}
	/*************************************************************
						FETCH	ENDS
	*************************************************************/

	require_once 'generate_json.php';
	
}
else if ($Action == 'Cancel')
{
	$sql    = 'SELECT * FROM '.$dbname.'.employee WHERE Id="'.$Id.'"';
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {  	
	// data retrieved in array
	$row		   = $result->fetch_assoc();
	$FullName 	   = $row["full_name"];
	$Age 		   = $row["age"];
	$ContactNumber = $row["contactnumber"];
	$NRIC 	   	   = $row["nric"];

	$ReturnArray['Content'] = '<td>'.$FullName.'</td><td>'.$Age.'</td><td>'.$ContactNumber.'</td><td>'.$NRIC.'</td><td><div id="Action_'.$Id.'"><a id="Edit_'.$Id.'" href="#a" class="btn btn-primary btn-xs">Edit</a> <a id="Delete_'.$Id.'" href="#a" class="btn btn-danger btn-xs">Delete</a></div></td>';
	}	
}



echo json_encode($ReturnArray);
?>