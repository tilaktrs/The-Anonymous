<?php
$room = $_POST['room'];
 include 'db_connect.php';
 $sql = "SELECT msg,stime,ip  FROM msgs WHERE room='$room'";

 $res="";

 $result = mysqli_query($conn , $sql);

// if messages found in the room then display all the messages
 if(mysqli_num_rows($result)>0)
{
  // here $row becomes array and it helps to access all the columns of the database 
   while($row = mysqli_fetch_assoc($result))
   {
       
      $res = $res . '<div class="container">';
      $res = $res . $row['ip'];
      $res= $res . " says <p>".$row['msg'];
      $res = $res . '</p><span class="time-right">' . $row["stime"] . '</span></div>';
        

   }
  
}

echo $res;




?>