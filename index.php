<!DOCTYPE HTML>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Semester Grade Point Calculator</title>
</head>
<style>
h1,h3 {text-align:center;}
.container { width:100px; margin:0  auto;}
.sub_container { width:200px; margin:0  auto;}
.container input {width: 100%;clear: both;}
table{font: 11px/24px Verdana, Arial, Helvetica, sans-serif;border-collapse: collapse;}


footer { text-align:center;color:#ccc;font-size:12px;} 
</style>
<body>
<h1>Sri Siddhartha Institute of Technology, Tumkur</h1>
<h3> (A Constituent College of Sri Siddhartha Academy of Higher Education)</h3>
	<?php error_reporting(0);
	
	//Subject Enter Form
	if(!isset($_POST['semester']) AND !isset($_POST['credit']))
	{
		echo '	<div align="center" class="sub_container">
				<form action="'. $_SERVER["PHP_SELF"] .'" method="POST">
				<fieldset>
				<legend>Enter Details</legend>
				<label>Enter Number of Subjects:</label><input type="text" name="semester" />
    			<input type="submit" value="Submit" />
				</fieldset>
				</form>
				</div>';

	}//Endif
	
	// Grade, Credit Form
	if(isset($_POST['semester']))
	{
		$no_of_sub = $_POST['semester'];
		echo '	<div class="container">
				<form action="'. $_SERVER["PHP_SELF"] .'" method="POST" id="cgpa_form">
					<fieldset>
  						<legend>Enter Details</legend>
						<table border="1" width="50">
							<tr>
								<th width="25">Credits</th>
        						<th width="25">Grade</th>
							</tr>';
	
							for ($i = 0; $i < $no_of_sub; $i++) 
							{
    						echo ' <tr>
    								<td align="center"><input type="text" name="credit[]" /></td>
       								 <td> <select name="grade[]" form="cgpa_form"> 
            								<option value="10">S</option>
                							<option value="9">A</option>
               								<option value="8">B</option>
                							<option value="7">C</option> 
											<option value="5">D</option>  
											<option value="4">E</option>  
											<option value="0">F</option> 											
        									</select>
        							</td>
       
    							</tr>';
  							}//Endfor
  					echo '</table>
							<input type="submit" value="Submit" />
					</fieldset>
				</form>
			</div>';
		}//Endif Grade, Credit Form
	
	
	//Report 
	if(isset($_POST['credit']))
	{
		//POSTting Credits from Form
		$credits = $_POST['credit'];
		//POSTting Grades from Form
		$grades = $_POST['grade'];
		//Variable Declaration
		$total = 0;
		$i = 0;
		$result = 0;
		//Display Credits
		echo '<br/>';
		foreach( $credits as $v ) 
		{
				
				$total = $total + $v;
		}
			
		//Display Grades	
		echo '<center>';
		
	
		
		//Calculating Total Points
		for( $i = 0; $i < count($credits) ; $i++ )
		{
			$result += $credits[$i] * $grades[$i];	
		}
		//Calculating CGPA
		$sgpa = $result / $total;
		
		
 		echo '<h1 style="color:green;"><br/>Your Semester Grade Point Average :'. sprintf('%01.2f', $sgpa);
	}//Endif Results
	
	
	//End PHP
	?>

<footer> &copy;2013 SSIT360. Integrating Innovations. </footer>'
<div align="center">


</div>
</body>
</html>
