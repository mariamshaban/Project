<?php 
 
 session_start();
 if(!isset($_SESSION['user'])){
	 include 'singinform.php';
	 die();
 }
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit Your Profile</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts2/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css2/style.css">
	</head>
<?php include'headerbefore.php'?>
	<body>
	             
	<form action="" method="post" enctype="multipart/form-data">

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="profileimg/<?php echo($_SESSION['user']); ?>.jpg" alt="upload your img">
					 <input type="file" name="uploadfile">
					<button type="submit" name="uploadimg" style="color: white;">Upload Img
					<i class="zmdi zmdi-arrow-right"></i>
				</button>
					

</form>

				</div>
				<form action="" method="post" >
				<?php
    include "Connection.php";
    if(isset($_POST['submit'])) //and $_POST['submit']=="Upload")
    {
        $db=new Connection();
		$insert="update clint set 
		Username='$_POST[txtusername]',
		Name='$_POST[txtName]',
		Phone='$_POST[txtphone]',
		Email='$_POST[txtEmail]',
		Location='$_POST[txtlocation]',
		password='$_POST[txtpassword]',
		SecurityQ='$_POST[txtSecurityQuestion]',
		SecurityAnswer='$_POST[txtSecurityAnswer]'
		where Username='$_POST[txtusername]'";
        $add= $db->rundb($insert);
        if($add=="Ok")
        echo("<h6 style='color:green'><b> User has been  updated succeed!! </b></h6>");
        else if (strpos($add, 'PRIMARY') == true) 
         
            echo ("<h6 style='color:red'><b> Sorry This username exist :)</b> </h6>");
        else if (strpos($add, 'Email') == true) 
                echo ("<h6 style='color:red'><b> Sorry This email exist :)</b> </h6>");
        else if (strpos($add, 'Phone') == true) 
                echo ("<h6 style='color:red'><b> Sorry This phone exist :) </b></h6>");             
        else
            echo ("<h6 style='color:red'><b>".$add."<b></h6>");
    }

    $db=new Connection();
	$ss=$_SESSION['user'];
	echo($ss);
    $result=$db->GetData("select * from clint where username='$ss'");
    $user=$result['Username'];
    $pass=$result['password'];
    $name=$result['Name'];
    $email=$result['Email'];
    $phone=$result['Phone'];
    $loc=$result['Location'];
    $question=$result['SecurityQ'];
    $answer=$result['SecurityAnswer'];
 
?>
					<h3>Edit Your Profile</h3>
					<div class="form-group">
					<input type="text" name="txtusername" placeholder="Username"  class="form-control" required="" value="<?php echo($user)?>" >
					
					<input type="text" name="txtName" placeholder="your name"  class="form-control"  required="" value="<?php echo($name) ?>">
					

					</div>
					<div class="form-wrapper">
					<input type="text" name="txtphone" placeholder="phone"  class="form-control" required="" value="<?php echo($phone)  ?>">
						
					</div>
					<div class="form-wrapper">
					<input type="email" name="txtEmail" placeholder="Email"  class="form-control" required="" value= "<?php echo($email) ?>"> 
						
					</div>
					<div class="form-wrapper">
					<input type="text" name="txtlocation" placeholder="Location"  class="form-control" required="" value= "<?php echo ($loc) ?>"> 
						
					</div>
					
					<div class="form-wrapper">
					<input type="password" name="txtpassword" placeholder="Password"   class="form-control" required="" value="<?php echo($pass) ?>"> 
						
					</div>
					<div class="form-wrapper">
					<input type="text" name="txtSecurityQuestion" placeholder="Security Question"  class="form-control"  required="" value= "<?php echo($question) ?>"> 
					
					</div>
					<div class="form-wrapper">
					<input type="text" name="txtSecurityAnswer" placeholder="Security Answer"  class="form-control" required="" value= "<?php echo ($answer) ?>"  > 
						
					</div>
					<button type="submit" name="submit" style="color: white;">Upload
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<?php
		require_once("connection.php");
		if(isset($_POST['uploadimg']))
		{
			$dir="profileimg/";
			$image=$_FILES['uploadfile']['name'];
			$temp_name=$_FILES['uploadfile']['tmp_name'];
			$ss=$_SESSION['user'];
			$user=$ss;
			if($image!="")
			{

			/*prevent replace	if(file_exists($dir.$image))
				{
					$image= time().'_'.$image;
				}*/

				$fdir= $dir.$user.".jpg";
				move_uploaded_file($temp_name, $fdir);
				echo "File Uploaded Suucessfully ";

			}

			//	$query="insert IGNORE into `images` (`id`,`file`) values ('','$image')";
			//	mysqli_query($con,$query) or die(mysqli_error($con));
				
			
		}

?>


				</form>
			</div>
		</div>
		
	</body>
	<?php include'footer.php'?>

</html>