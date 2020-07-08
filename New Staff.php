<?php 
 
 //Setting up the connection
  include('connection.php');

//initialization of variables
$name='';
$id='';

$errors= array('name_e' =>'' ,'id_e'=>'' );

if (isset($_POST['submit'])) 
{
	  // To validate UserName
	  if (empty($_POST['name'])) 
	  {
	  		$errors['name_e']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$name=$_POST['name'];
	  	if(preg_match('/^ [a-zA-Z\s]+$ /',$name))
	  	{
	  		$errors['name_e']= "*Enter a valid UserName <br/><br/>";
	    }
	  }

	  //To validate Id

	   if (empty($_POST['id'])) 
	  {
	  		$errors['id_e']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$id=$_POST['id'];
	  	if(preg_match('/^[1-9] $ /',$id))
	  	{
	  		$errors['id_e']= "*Enter a valid Id <br/><br/>";
	    }
	  }

	  if(array_filter($errors))
	  {
	  	echo "There is an error";
	  }
	  else
	  {
	  	$name=mysqli_real_escape_string($connection,$name);
	  	$id=mysqli_real_escape_string($connection,$id);

	  //create SQL
	  	$sql="INSERT INTO staff_login(Name,Id) VALUES('$name','$id')"; 
	  
	  //Save to db an check it

	    if(mysqli_query($connection,$sql))
	    {
	     	//sucess
	    	header('Location:staff.php');
	    	echo 'Successfully Registered!!!!' ;
	    }
	    else
	    {
	  	 echo 'Error!!!!' . mysqli_error($connection);
	    }
	  }
}
 ?>

 <!DOCTYPE html>
 <html>
 
 <?php include('templates/h.php'); ?>

 <h4 class="center white-text"> Staff Portal</h4>
 <section class="as">
 	<h5 class="center">Login </h5> 

 	<form class="white border-bold" action="staff_new_user.php" method="POST">
  
    	<label>Name:</label>
 		<input type="text" name="name">
 		<div class="red-text"> <?php echo $errors['name_e'];?> </div>

 		<label>Id:</label>
 		<input type="text" name="id">
 		<div class="red-text"> <?php echo $errors['id_e'];?> </div>
  		
  		<br><br>
 		<div class="center">
 			<input type="submit" name="submit" value="Submit to Register"> 
 		</div>

 	</form>
 </section> 
 	
 <?php include('templates/f.php'); ?>

 </html>
