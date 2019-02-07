<?php 
session_start();
if(!isset($_SESSION['user'])){
    include 'singinform.php';
    die();
}
?>
<!DOCTYPE html>
<html>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>

</head>
<?php include'headerbefore.php'?>

<body>
    
<div class="container">
  
  <form action="#" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" placeholder="Enter Username" name="txtusername"required="">
    </div>
    <div class="form-group">
      <label for="pwd">Check User:</label>
      <input type="submit"  name="submit"  class="form-control"  value="Check User" >
    </div>
    <div class="checkbox">
       <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <?php    
 include"connection.php";
     if(isset($_POST['submit']) and $_POST['submit']=="Check User")
  {                             
   if (!empty($_POST["txtusername"]))
  {
  $UserName=$_POST["txtusername"];
 
  $db=new Connection();
  $query=$db->search("select * from clint where Username='$UserName'");                     
  if($query!="ok")
      { 
         echo("<script> alert('Invaild username !!! try again') </script> ");
      }
      else
      {
	   $ss=$_SESSION['user'];
        
          $result=$db->GetData("select * from clint where Username='$ss'");
          $pass=$result['password'];
          $name=$result['Name'];
          $phone=$result['Phone'];
          $email=$result['Email'];


          include_once("ViaNettSMS.php");
          // Declare variables.
          $Username = "mariam1995.shaban@gmail.com";
          $Password = "ghaj";
          $MsgSender = "201013490531";
          $DestinationAddress = $phone;
          $Message = "Dear : ".$name." Your Password is : ".$pass." Mariam";
          
          // Create ViaNettSMS object with params $Username and $Password
          $ViaNettSMS = new ViaNettSMS($Username,$Password);
          try
          {
              // Send SMS through the HTTP API
              $Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
              // Check result object returned and give response to end user according to success or not.
              if ($Result->Success == true)
                  $Message = "Message successfully sent!";
              else
                  $Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
          }
          catch (Exception $e)
          {
              //Error occured while connecting to server.
              $Message = $e->getMessage();
          }
          echo($Message);
          
          
         
          
          
         // $headers='From: yourmobileapp2017@gmail.com';
         // ini_set("SMTP","mail.gmail.com");
        //  ini_set("smtp_port","587");                        
         // mail($email,"Foeget password","your password is ".$pass,$headers);
      }
  }
}
?>

  </form>
</div>

</body>
<?php include'footer.php'?>
</html>

