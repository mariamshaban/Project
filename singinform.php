

<html>
<head>

</head>
<?php include"headerbefore.php"?>

<body>
<br/>  <br/> <br/>  
<div class="container">
<form action="#" method="post" class="form-horizontal">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" placeholder="Enter Username" name="txtusername"required="">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="txtpassword" required="">
    </div>
   
    <input  type="submit" class="btn btn-default name="submit"  value="Sign In" >
  </form>
</div>
</div>
</body>



<?php

            if(isset($_POST['submit']) and $_POST['submit']=="Sign In"){
            include "Connection.php";
					  $UserName=$_POST["txtusername"];
					  $password=$_POST["txtpassword"];
					  
            $db=new Connection();
             $query=$db->search("select * from clint where Username='$UserName' and password='$password'");
             if ($query!="ok"){
             echo("<script> alert('Invaild username or password') </script>");
						   }
                       else{
                      session_start();
                        $_SESSION['user']= $UserName;
                      header('location:indexusers.php');
						
           //  echo "<script> location.href='indexusers.php?user=$UserName'; </script>";

					   }
                            
					}
                ?>
 <br/>  <br/> <br/> 
</body>
<?php include"footer.php"?>
</html