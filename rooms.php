<?php
// this room is to share with your friends
// it will take room name as a get parameter

$roomname = $_GET['roomname'];

//connecting to the database to check wether it exist or not

 include 'db_connect.php';

 //Execute sql to check whether room exists

 $sql = "SELECT * FROM rooms where roomname = '$roomname'";

 $result = mysqli_query($conn , $sql);

if($result)
{

 // check if room exists 

    if(mysqli_num_rows($result)==0)
    {
	$message = "This room does not exist.Try creating a new one";

	  // alerting the window for this condition 
	  echo '<script language="javascript">';
	  echo 'alert("'.$message.'");';
	  // to alert message on localhost/chatroom
	  // if room does not exist , direct the user to the home page
	  echo 'window.location="http://localhost/chatroom";';
	  echo '</script>';

    }

}
else
{

 echo "Error :" .mysqli_error($conn);

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Anonymous</title>

    <link rel="icon" href="img/icon4.png">

    

    <!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<link href="css/product.css" rel="stylesheet">


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}



.anyclass{       

height:350px;
overflow-y:scroll;

}




</style>
</head>
<body>
	<header>



                     <!-- Navbar -->


  <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <h5 clas="my-0 mr-md-auto font-weight-normal">MyAnonymousChat.com</h5>
   <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="#">Home</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="#">About</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="#">Contacts</a>
        
      </nav>


</header>

<h2>Chat Messages- <?php echo $roomname ?></h2>


  <div class="container"> <!-- including div tag with class- anyclass  -->


    <div class="anyclass">
  
  </div>





  </div>


<!--  for button and placeholder          -->

<input type = "text" class="form-control" name = "usermsg" id="usermsg" placeholder="Add message"><br>
<button class="btn btn-default" name="submitmsg" id="submitmsg">send</button>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript">

//check for new messages every 1 second
setInterval(runFunction , 1000);

function runFunction()
{
        // post request 
 $.post("htcont.php",{room:'<?php echo $roomname ?>'},
            
            function(data , status)
            {

            	document.getElementsByClassName('anyclass')[0].innerHTML=data;
            	// here data is what returned by htcont.php
            }
       



 	    )



}




// using enter key to submit 
//credits : https://www.w3schools.com/howto/howto_js_trigger_button_enter.asp
var input = document.getElementById("usermsg");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    
    // Trigger the button element with a click
    document.getElementById("submitmsg").click();
  }
});

 




// jquery post method - (when user clicks on send button , data will be send 
 // to the database and will be get stored

$("#submitmsg").click(function(){

var clientmsg = $("#usermsg").val();

  $.post("postmsg.php", { text:clientmsg , room: '<?php echo $roomname ?>',
  ip:'<?php echo $_SERVER['REMOTE_ADDR'] ?>'},
// if this post request gets successfully executed then this function will run
  function(data , status){
 document.getElementsByClassName('anyclass')[0].innerHtml = data;});
  //[0] because multiple data field may be present with the same class name

  $("#usermsg").val("");
  return false; // if post method failed to execute
  

});
 







	</script>


</body>
</html>
