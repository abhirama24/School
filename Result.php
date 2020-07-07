<?php 

include('connection.php');

//Initialize variables to null values
$name='';
$reg='';
$attend='';
$kan='';
$eng='';
$hin='';
$math='';
$sci='';
$ss='';


//Initialize error Array
$errors=array('sname'=>'','reg'=>'','attend'=>'','kan'=>'','eng'=>'','hin'=>'','math'=>'','sci'=>'','ss'=>'');

if(isset($_POST['submit'])) 
{

      // To validate StudentName
	  if (empty($_POST['sname'])) 
	  {
	  		$errors['sname']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$name=$_POST['sname'];
	  	if(preg_match('/ ^[a-zA-Z\s]+$ /',$name))
	  	{
	  		$errors['sname']= "*Enter a valid UserName <br/><br/>";
	    }
	  }

	  // To validate Register Number
	  if (empty($_POST['reg'])) 
	  {
	  		$errors['reg']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$reg=$_POST['reg'];
	  		if(!is_numeric($reg))
	  	{
	  		$errors['reg']= "*Enter a valid Register Number  <br/><br/>";
	    }
	  }

	    // To validate Attendence
	  if (empty($_POST['attend'])) 
	  {
	  		$errors['attend']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$attend=$_POST['attend'];
	  		if( (is_numeric($attend)) && ($attend<100 && $attend > 0) )
	  		{
	  			//Do nothing
	  		}
	  	else{
	  		$errors['attend']= "*Enter a valid Attendence % <br/><br/>";
	    }
	  }

	  // To validate Kannada Marks
	  if (empty($_POST['kan'])) 
	  {
	  		$errors['kan']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$kan=$_POST['kan'];
	  		if( (is_numeric($kan)) && ($kan<=100 && $kan >=0))
	  		{
	  				// DO nothing
	  		}
	    	else
	    	{
	  		 $errors['kan']= "*Enter a valid Marks <br/><br/>";
	        }
	  }


	  // To validate English Marks
	  if (empty($_POST['eng'])) 
	  {
	  		$errors['eng']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$eng=$_POST['eng'];
	  		if( (is_numeric($eng)) && ($eng<=100 && $eng >=0) )
			{
			//DO nothing
			}
	  	   else
	  	   {
	  		 $errors['eng']= "*Enter a valid Marks <br/><br/>";
	       }
	  }

	   // To validate Hindi Marks
	  if (empty($_POST['hin'])) 
	  {
	  		$errors['hin']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$hin=$_POST['hin'];
	  		if( (is_numeric($hin)) && ($hin<=100 && $hin >=0) )
	  		{
	  			//DO nothing
	  		}
	  	    else
	  	    {
	  		  $errors['hin']= "*Enter a valid Marks <br/><br/>";
	        }
	  }

	  // To validate Math Marks
	  if (empty($_POST['math'])) 
	  {
	  		$errors['math']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$math=$_POST['math'];
	  		if( (is_numeric($math))  && ($math<=100 && $math >=0) )
	  		{
	  			//Do nothing
	  		}
	  	else{
	  		$errors['math']= "*Enter a valid Marks <br/><br/>";
	    }
	  }

	   // To validate Science Marks
	  if (empty($_POST['sci'])) 
	  {
	  		$errors['sci']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$sci=$_POST['sci'];
	  		if((is_numeric($sci)) && ($sci<=100 && $sci >=0) )
	  		{
	  			//Do nothing
	  		}
	     else
	     {
	  		$errors['sci']= "*Enter a valid Marks <br/><br/>";
	    }
	  }

	  // To validate Social-Science Marks
	  if (empty($_POST['ss'])) 
	  {
	  		$errors['ss']= '*This field cannot be empty!!';
	  }	
	  else
	  {
	  	$ss=$_POST['ss'];
	  		if( (is_numeric($ss)) && ($ss<=100 && $ss >=0) )
	  		{
	  			//DO nothing
	  		}
	  		else
	  		{
	  		  $errors['ss']= "*Enter a valid Marks <br/><br/>";
	        }
	  }

	  if(array_filter($errors))
	  {
	  	//echo "There is an error";
	  }
	  else
	  {
	  	//echo "No error!!!";
	  	$name=mysqli_real_escape_string($connection,$name);
	  	$reg =mysqli_real_escape_string($connection,$reg);
	  	$attend=mysqli_real_escape_string($connection,$attend);
	  	$kan=mysqli_real_escape_string($connection,$kan);
	  	$eng=mysqli_real_escape_string($connection,$eng);
	  	$hin=mysqli_real_escape_string($connection,$hin);
	  	$math=mysqli_real_escape_string($connection,$math);
	  	$sci=mysqli_real_escape_string($connection,$sci);
	  	$ss=mysqli_real_escape_string($connection,$ss);

        //create SQL
	  	$sql="INSERT INTO marks(Student_Name,Register_Number,Attendence,Kannada,English,Hindi,Maths,Science,Social_Science) VALUES('$name','$reg','$attend','$kan','$eng','$hin','$math','$sci','$ss')"; 
	  
	  //Save to db an check it

	    if(mysqli_query($connection,$sql))
	    {
	     	//sucess
	    	//header('Location:staff.php');
	    	//echo 'Successfully Registered!!!!' ;
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
<div>

<h2 class="center grey-text">Welcome </h2>

<h4 class="center">Add the marks Details of the student</h4>

</div>

<form class="aa white border-bold" action="result.php" method="POST">

	<label> Students Name:</label>
 		<input type="text" name="sname" value="<?php echo $name ;?>">
 		<div class="red-text"> <?php echo $errors['sname'];?> </div>

 		<label>Register Number:</label>
 		<input type="text" name="reg" value="<?php echo $reg; ?>" >
 		<div class="red-text"> <?php echo $errors['reg'];?> </div>

  		<label>Attendence(%):</label>
 		<input type="number" name="attend" value="<?php echo $attend; ?>" >
 		<div class="red-text"> <?php echo $errors['attend'];?> </div>

  		<h4 class="center">Enter Marks of different subjects</h4>

  		<label>Kannada:</label>
 		<input type="number" name="kan" value="<?php echo $kan; ?>">
 		<div class="red-text"> <?php echo $errors['kan'];?> </div>

 		<label>English:</label>
 		<input type="text" name="eng" value="<?php echo $eng; ?>">
 		<div class="red-text"> <?php echo $errors['eng'];?> </div>

 		<label>Hindi:</label>
 		<input type="number" name="hin" value="<?php echo $hin; ?>">
 		<div class="red-text"> <?php echo $errors['hin'];?> </div>

 		<label>Mathematics:</label>
 		<input type="number" name="math" value="<?php echo $math; ?>">
 		<div class="red-text"> <?php echo $errors['math'];?> </div>

 		<label>Science:</label>
 		<input type="number" name="sci" value="<?php echo $sci; ?>">
 		<div class="red-text"> <?php echo $errors['sci'];?> </div>

 		<label>Social Science:</label>
 		<input type="text" name="ss" value="<?php echo $ss ; ?>">
 		<div class="red-text"> <?php echo $errors['ss'];?> </div>

 		
  		<br><br>
 		<div class="center">
 			<input type="submit" name="submit" value="submit"> 
 		</div>

</form>

<?php include('templates/f.php'); ?>

 </html>
