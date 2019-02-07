<?php session_start(); ?>
<?php include "headerbefore.php" ?>
<br/><br/><br/>

<form method="post">
<div class="container">
  <div class="form-group">
    <label for="exampleInputEmail1"> Description	</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtdesc" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Item Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1"name="txtitemname" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Item Price</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="txtprice">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Item Discount</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="txtdisc">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Section Name</label>
    <select class="form-control" id="exampleInputPassword1" name="txtsectionname">
	<?php
	   include "connection.php";
		$sql="select * from section";
		$qry=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($qry))
		 {
	  ?>
   <option value="<?php echo($row['SectionNo']); ?>"><?php echo($row['Name']); ?></option>
		 <?php }?>
	</select>
  </div>
  <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile02">
  </div> 
</div>
  <input type="submit" name="submit" class="btn btn-primary"/>
  <?php  
       
      //include"Connection.php";
   if(isset($_POST['submit']) and ($_POST['submit']=="Save"))
       {			  
           $db=new Connection();	
           $sql="insert into items values('','$_POST[txtdesc]','$_POST[txtprice]','$_POST[txtitemname]' ,'$_SESSION[user]','$_POST[txtsectionname]','$_POST[txtdisc]')";
           $qry=$db->rundb($sql);
           if($qry=="Ok")
           echo("<h6 style='color:green'><b> Item has been Saved succeed!! </b></h6>");
               else 
            echo "Error" ;
	    }
 ?>

 
</div>
</form>

<br/><br/><br/>
<?php include "footer.php" ?>

