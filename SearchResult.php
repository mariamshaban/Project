<?php 
//session_start();

?>
<html>
<?php include"headerbefore.php"?>

 <head></head>
 <body>

 <div class="new_arrivals_agile_w3ls_info"> 
  
  <div class="container">
      <h3 class="wthree_text_info">Our<span>Items</span></h3>		

          <div id="horizontalTab">
                  <ul class="resp-tabs-list">
                      <li> Men's</li>
                  </ul>
              <div class="resp-tabs-container">
              <!--/tab_one-->
                  <div class="tab1">
         <?php
         
    include "connection.php";
        $sql="select * from items where Description like '%$_GET[search]%'";
        $qry=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($qry))
         {
      ?>
                      <div class="col-md-4 product-men">
                          <div class="men-pro-item simpleCart_shelfItem">
                              <div class="men-thumb-item">
                                  <img src="itemsimg/<?php echo($row['Itemno']); ?>.jpg" alt="" class="pro-image-front">
                                  <img src="itemsimg/<?php echo($row['Itemno']); ?>.jpg" alt="" class="pro-image-back">
                                      <div class="men-cart-pro">
                                          <div class="inner-men-cart-pro">
                                              <a href="itemsafter.php" class="link-product-add-cart">Quick View</a>
                                          </div>
                                      </div>
                                      <span class="product-new-top">New</span>
                                      
                              </div>
                              <div class="item-info-product ">
                                  <h4><a href="itemsafter.php"><?php echo($row['Name']);?></a></h4>
                                  <div class="info-product-price">
                                      <span class="item_price"><?php echo($row['Price']);?></span>
                                      <del>$69.71</del>
                                  </div>
                                  <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                                      <form action="#" method="post">
                                                          <fieldset>
                                                              <input type="hidden" name="cmd" value="_cart" />
                                                              <input type="hidden" name="add" value="1" />
                                                              <input type="hidden" name="business" value=" " />
                                                              <input type="hidden" name="item_name" value="Formal Blue Shirt" />
                                                              <input type="hidden" name="amount" value="30.99" />
                                                              <input type="hidden" name="discount_amount" value="1.00" />
                                                              <input type="hidden" name="currency_code" value="USD" />
                                                              <input type="hidden" name="return" value=" " />
                                                              <input type="hidden" name="cancel_return" value=" " />
                                                              <input type="submit" name="submit" value="Add to cart" class="button" />
                                                          </fieldset>
                                                      </form>
                                                  </div>
                                                                      
                              </div>
                          </div>                              
                      </div>
                      <?php
          }
          ?>									
                              </div>
                          </div>
                      </div>
                                                                      
                              </div>
                          </div>
                      </div>
                   
                      <div class="clearfix"></div>
                    
                  </div>
              </div>
           
          </div>	
      </div>
  </div>  



</body>
</html>
