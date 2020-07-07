
<?php  

		session_start();
		 $ui=$_SESSION['reg'];	
		
		if(!empty($ui))
		{
	        //writing the query
			include('connection.php');
             $reg=mysqli_real_escape_string($connection,$ui);

	         $fs = "SELECT Student_Name,Register_Number,Attendence,Kannada,English,Hindi,Maths,Science,Social_Science FROM marks WHERE Register_Number=$ui";

	        $ress=mysqli_query($connection,$fs);

            //store it as an array
   	         $f=mysqli_fetch_assoc($ress);

   	         //Total Marks
	        $total=$f['Kannada']+$f['English']+$f['Hindi']+$f['Maths']+$f['Science']+$f['Social_Science'];

	        //Percentage Calculation
	        $percent=($total/600)*100;

	        //Result Calculation
	        if($percent<35)
	        {
	        	$result='FAIL';
	        }
	        elseif ($percent>=35 && $percent<60) 
	        {
	        	$result='SECOND CLASS';
	        }
	        elseif ($percent>=60 && $percent<85) 
	        {
	        	$result='FIRST CLASS';
	        }
	        else
	        {
	        	$result='DISTINCTION';
	        }
	    }
	
		else
		{
			//Do nothing
		}
		
?>

<!DOCTYPE html>
<html>

<?php 	include('templates/h.php'); ?>
<h3 class="center brown-text"> Check Your Result</h3>

<div class=" row ab">
	<div class="card"> 
	   <div class="card-content center">

				<?php if($f): ?>
					<table>
						<!-- First Row -->
						<tr>
							<th colspan="1"> Student Name:</th>
							<td> <?php echo $f['Student_Name'] ;?> </td>
							
						</tr>
						<!-- Second Row -->
						<tr>
							<th>  Register Number: </th>
							<td> <?php echo $f['Register_Number'];  ?> </td>
						</tr>
						<!-- Third Row -->
						<tr>
							<th>  Attendence: </th>
							<td> <?php echo $f['Attendence'];  ?> % </td>
						</tr>
						<!-- Fourth Row -->
						<tr>
							<th> Subjects</th>
							<th> Marks</th>
							<th> Max Marks</th>
							<!--<th> Result</th>-->
						</tr>
						<!-- Fifth Row -->
						<tr>
							<td> <strong> Kannada </strong> </td>
							<td> <?php echo $f['Kannada']; ?> </td>
							<td> 100 </td>
						</tr>
						<!-- Sixth Row -->
						<tr>
							<td> <strong> English </strong>  </td>
							<td> <?php echo $f['English']; ?> </td>
							<td> 100 </td>
						</tr>
						<!-- Seventh Row -->
						<tr>
							<td> <strong>  Hindi </strong> </td>
							<td> <?php echo $f['Hindi']; ?> </td>
							<td> 100 </td>
						</tr>
						<!-- Eigth Row -->
						<tr>
							<td> <strong>  Mathematics </strong>  </td>
							<td> <?php echo $f['Maths']; ?> </td>
							<td> 100 </td>
						</tr>
						<!-- Ninth Row -->
						<tr>
							<td> <strong>  Science </strong></td>
							<td> <?php echo $f['Science']; ?> </td>
							<td> 100 </td>
						</tr>
						<!-- tenth Row -->
						<tr>
							<td> <strong>Social Science </strong></td>
							<td> <?php echo $f['Social_Science']; ?> </td>
							<td> 100 </td>
						</tr>
						<!-- Eleventh Row-->
						<tr>
							<th>  <strong> Total Marks </strong> </th>
							<td>  <?php echo $total ;   ?> /600 </td>  
						</tr>
					
					    <!-- Twelth Row -->
					     <tr>
							<td>  <strong> Percentage </strong> </td>
							<td>  <?php echo $percent ;   ?> </td>  
						</tr>
						<!-- Thirteenth Row -->
						<tr>
							<td>  <strong> Result </strong> </td>
							<td>  <?php echo $result ;   ?> </td>  
						</tr>
					</table>
				 <?php endif ?>
		</div>
	</div>
</div>



</html>
