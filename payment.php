<?php 
	ob_start();
  	session_start();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
		die();
			}
	?>
<?php include "headerbefore.php"?>
<br/> <br/> <br/>
<form method="post">
<center>
<table class="table">

<thead class="thead-dark">
<tr> 
    <th colspan="5" style="text-align:center"><h3><b> Your Cart Deatails</b></h3> </th>
</tr>
<tr> 

<th colspan="5" style="text-align:"><h3><b>
Order Number : 
<?php
    include"Connection.php"; 
    $db=new Connection();
    $sql="select max(OrderNo)+1 as OrderNo from `order` where username = '$_SESSION[user]'";
    $qry=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_assoc($qry))
    {
        if(empty($row['OrderNo']))
          echo("<input type='text' readonly value='1' name='orderno'>"); 
        else
          echo("<input type='text' readonly value='$row[OrderNo]' name='orderno'>");    
    }
    
  
     ?>
</b></h3> </th>
</tr>

    <tr style="background-color:black;color:white;font-style:bold">
        <th  style="color: #fbfbfb;text-align: center;"> Item no</th>
        <th style="color:#fbfbfb;text-align: center;"> Item Name</th>
        <th style="color:#fbfbfb;text-align: center;"> Item Price</th>
        <th style="color:#fbfbfb;text-align: center;"> Quantity</th>
        <th style="color:#fbfbfb;text-align: center;"> Total</th>
    </tr>
 
</thead>
<?php

$db=new Connection();
$sql="select Itemno,ItemName,sum(Quantity) as Quantity,Price,sum(Subtotal) as Subtotal,Username from cart where username ='$_SESSION[user]' group by Itemno,ItemName,Price,Subtotal,Username";
$qry=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($qry))
{
?>
<tr>

<td style="text-align: center;"><?php echo($row['Itemno']); ?> </td>
<td style="text-align: center;"><?php echo($row['ItemName']); ?> </td>
<td style="text-align: center;"><?php echo($row['Price']); ?> </td>
<td style="text-align: center;"><?php echo($row['Quantity']); ?> </td>
<td style="text-align: center;"><?php echo($row['Subtotal']); ?> </td>

</tr>

 
<?php } ?>
<tr style="background-color:black;color:white">
<td colspan="5"></td>
</tr>
<tr>
<td colspan="5" style="text-align:center"><h3><b>
 Total Of order :

<?php
 
$db=new Connection();
$sql="select sum(Subtotal) as Subtotal,Username from cart where username = '$_SESSION[user]' group by Username";
$qry=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($qry))
{
    echo("<input type='text' value='$row[Subtotal]' readonly name='txttotal'>"); 
     
  } ?>

</b></h3>
</td>

</tr>
<td colspan="6" style="text-align:center"><h3><b>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Special Requirements</label>
    <br/> <br/>
    <textarea class="form-control" name="txtspecial" id="exampleFormControlTextarea1" rows="2"> </textarea>
    </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="rdcash" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
   Cash On Delivery
  </label>
  <input class="form-check-input" type="radio" name="rdvisa" id="exampleRadios2" value="option2" >
  <label class="form-check-label" for="exampleRadios2">
   Visa 
  </label>
</div>

<br/><br/>
<div class="form-check" >
 
  
  <input type="text" name="txtcardname" placeholder="Name in card"  />
  <input type="date" name="txtexpire" placeholder="Expire Date"  />
  <input type="text" name="txtcvn" placeholder="CVN"/>
  <input type="text" name="txtvisano" placeholder="Visa No" />

</div>
 
<br/><br/>

<input type="submit" name="saveorder" value="Save Order" class="btn btn-lg btn-primary" />

<?php

if(isset($_POST['saveorder']) and $_POST['saveorder']=="Save Order"){
         $db=new Connection();
         $typepaid="";

         if(isset($_POST['rdcash']))
           $typepaid=$_POST['rdcash'];
        else
            $typepaid= $_POST['rdvisa'];
        $t=date('Y-m-d H:i:s');
         $sql2="insert into `order`  values('$_POST[orderno]', '$_POST[txttotal]','','$_POST[txtspecial]','$t','$_SESSION[user]','','$typepaid','$_POST[txtexpire]','$_POST[txtvisano]','$_POST[txtcardname]','Pending','$_POST[txtcvn]')";
         $qry2=$db->rundb($sql2);
               if ($qry2=="Ok"){
                 $sql="select Itemno,ItemName,sum(Quantity) as Quantity,Price,sum(Subtotal) as Subtotal,Username from cart where username ='$_SESSION[user]' group by Itemno,ItemName,Price,Subtotal,Username";
                $qry=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($qry))
                {
                    $sql2="insert into `orderdetails`  values('$_POST[orderno]', '$row[Itemno]','$row[Price]','$row[Subtotal]','$row[Quantity]')";
                    $qry2=$db->rundb($sql2);
                }
            
                if ($qry2=="Ok")
                {
                    $qry=mysqli_query($conn,"delete from cart where username ='$_SESSION[user]'");
               
                    echo("<script> alert('Order has been send , waiting 24 hours for response') </script>");
                }else
                    echo($qry);
            }       
        else{
       	echo ($qry2);

        }
            
    }
?>

</td>
</table>



</form>





<br/> <br/> <br/>
<?php include "footer.php"?>