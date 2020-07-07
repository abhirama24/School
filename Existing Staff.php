<?php 	

$errors= array('id_e'=>'' );
$sub   = array('submit'=>''); 


  if (isset($_POST['submit'])) 
{

	 // To validate entered ID
	  if (empty($_POST['sid'])) 
	  {
	  		$errors['id_e']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$uid=$_POST['sid'];
	  	
	  	if(!is_numeric($uid))
	  	{
	  		$errors['id_e']="*ID must be Numeric  <br/><br/>";
	    }
	  }

	  if(array_filter($errors))
	  {
	  	//There is an error;
	  }
	  else
	  {
	  	include('connection.php');

	     //writing the query
		 $id=mysqli_real_escape_string($connection,$uid);

	     //make sql
		$sql = "SELECT Id FROM staff_login WHERE Id=$id";

		//get the result
		$res=mysqli_query($connection,$sql);
    	//echo $res;

		//store it as an array
		$fna=mysqli_fetch_assoc($res);
		//print_r($fna);

		if($uid == $fna['Id'])
		{
		  header('Location:result.php');
		}
		else
		{
		  $sub['submit'] = "*Unregistered User!!!!!";
		}
  	}
}

?>

 <!DOCTYPE html>
 <html>
 
 <?php 	include('templates/h.php'); ?>

 <h3 class="center green-text">	Login using your ID</h3>
<div class="as">
<form class="white border-bold" action="staff_existing.php" method="POST">

<label>	Enter your ID</label>
<input type="text" name="sid">
<div class="red-text"> <?php echo $errors['id_e']; ?> </div>

<input type="submit" name="submit">
<div class="red-text"> <?php echo $sub['submit'];  ?> </div>

</form>
</div>
 </html>
