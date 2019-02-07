


<?php session_start(); ?>
<?php  include "headerbefore.php" ?>
<style >
* {
  box-sizing: border-box;
}

/* Create three columns of equal width */
.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

/* Style the list */
.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

/* Add shadows on hover */
.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

/* Pricing header */
.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

/* List items */
.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

/* Grey list item */
.price .grey {
  background-color: #eee;
  font-size: 20px;
}

/* The "Sign Up" button */
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

/* Change the width of the three columns to 100% 
(to stack horizontally on small screens) */
@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}

</style>
<br/> <br/> <br/>
           
<div class="container">
<?php
              include "Connection.php";
              $user=$_SESSION['user'];
              $sql="select * from viewrequst  where username='$user'";
              $qry=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($qry))
                {
            ?>
<div class="columns">
  <ul class="price">
    <li class="header"><?php echo($row['Username']); ?></li>
    <li class="grey"><?php echo($row['ordertotal']); ?></li>
    <li><?php echo($row['Order Date']);?></li>
    <li><?php echo($row['typeofpaid']);?></li>
    <li><?php echo($row['status']); ?></li>
    <li><?php echo($row['visano']); ?></li>
    <li class="grey"><a href="<?php echo($row['OrderNo']); ?>" class="button" data-toggle="modal" data-target="#<?php echo($row['OrderNo']); ?>">More Details</a></li>
  </ul>
</div>




  <div class="modal fade" id="<?php echo($row['OrderNo']); ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo($row['Name']);?></h4>
        </div>
        <div class="modal-body">
          <p>Order Number <?php echo($row['OrderNo']); ?></p>
          <p> Item Number<?php echo($row['itemno']);?></p>
          <p> Price<?php echo($row['Price']);?></p>
          <p>Quantity <?php echo($row['Qty']);?></p>
          <p>Total <?php echo($row['subtotal']);?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

     <?php } ?>
     </div>
<br/> <br/> <br/>
<?php  include "footer.php" ?>