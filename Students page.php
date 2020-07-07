<?php 

//session_start();

$error=array('reg'=>'','ent'=>'');

if (isset($_POST['submit'])) 
{
	  // To validate UserName
	  if (empty($_POST['reg'])) 
	  {
	  		$error['reg']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$reg=$_POST['reg'];
	  	if(is_numeric( $_POST['reg'] ) )
	  	   {

	  	   }
	  	else
	  	   {
	  		  $error['reg']= "*Enter a valid Register Number <br/><br/>";
	       }
	  }


	  if(!array_filter($error))
	  {
	     include('connection.php');

         //writing the query
		 $reg=mysqli_real_escape_string($connection,$reg);

	     //make sql
		  $sql = "SELECT Register_Number FROM marks WHERE Register_Number=$reg";

		  //get the result
		  $res=mysqli_query($connection,$sql);

		  //store it as an array
		   $fna=mysqli_fetch_assoc($res);
		  
		  if($reg == $fna['Register_Number'])
		 {
		 	session_start();
		 	$_SESSION['reg']=$_POST['reg'];
	  	    header('Location:display.php');
	     }
	     else
	     {
	     	 $error['ent']="*Enter a valid Register Number <br/><br/>";
	     }
	   }
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Students Portal</title>
 	<style type="text/css">
 		body{
 			background-color: lightblue;
 		}
 	</style>
 </head>

 <?php include('templates/h.php'); ?>

 <h3 class="center"> Students Portal</h3>

 <br><br>

 <h5 class="center">Enter Your Register Number to view Result</h5>

 <form class="ac white border-bold" action="students.php" method="POST">

 <input type="text" name="reg" placeholder="Enter Your Register Number">
 <div class="red-text"> <?php echo $error['reg']; ?> </div>
 <div class="red-text"> <?php echo $error['ent']; ?> </div>

 <!--
 <div class="ad"> *All the Best</div>
 -->
 <br>

 <input type="submit" name="submit" class="center">
 	
 </form>




 </body>
 </html>
