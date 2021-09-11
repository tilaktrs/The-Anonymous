<?php
//getting value for post
$room = $_POST['room'];
// checking for string size
if(strlen($room)>20 or strlen($room)<2)
{
  
  $message = "Please choose a number between 2 to 20 characters";

	  // alerting the window for this condition 
	  echo '<script language="javascript">';
	  echo 'alert("'.$message.'");';
	  // to alert message on localhost/chatroom
	  echo 'window.location="http://localhost/chatroom";';
	  echo '</script>';

 }
//checking whether room name is alphanumeric 
else if(!ctype_alnum($room))
{

	$message = "please choose an alphanumeric room name";
	echo '<script language = "javascript">';
	// first semicolon is for js and second is for php
	// to use php variable in javascript
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/chatroom";';
	echo '</script>';
}

else
{
  // connect to  the database

	Include 'db_connect.php';

}


// Lets chat now
// check if room already exist or not
$sql = "SELECT * FROM rooms WHERE roomname= '$room'";
   // to get result of this query
$result = mysqli_query($conn , $sql); // always takes two parameters

if($result) //  here the query will execute
{
         if(mysqli_num_rows($result) > 0) // if some rows are there or room already exist

         {
	         $message = "Please choose a different room name. This room is already claimed";
         
	  
		  // alerting the window for this condition 
			  echo '<script language="javascript">';
			  echo 'alert("'.$message.'");';
			  // to alert message on localhost/chatroom
			  echo 'window.location="http://localhost/chatroom";';
			  echo '</script>';

         } 
         // if no rows are there or room does not exist
         else
         {
                
              $sql = "INSERT INTO rooms (`roomname`, `stime`) VALUES ('$room', current_timestamp());";
             if(mysqli_query($conn , $sql))
             {
             	$message = "your Room is ready!";
             	// alerting the window for this condition 
			  echo '<script language="javascript">';
			  echo 'alert("'.$message.'");';
			  // to alert message on localhost/chatroom
			  // here room.php is used to handle all the rooms
			  // here we are using GET METHOD 
			  // providing roomname as a get parameter
			  echo 'window.location="http://localhost/chatroom/rooms.php?roomname='.$room.'";';
			  echo '</script>';
			}
               
        }

}
else
{
 // if query does not exist  

	echo "Error: ". mysqli_error($conn);


}
?>