<?php include "header.php"?>



<!-- /new_arrivals --> 
	<div class="new_arrivals_agile_w3ls_info"> 
  
		<div class="container">
		    <h3 class="wthree_text_info">Our<span>Items</span></h3>		
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li> </li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
						<div class="tab1">
               <?php
              //include "connection.php";
              $sql="select * from items where SectionNo='$_GET[secno]' ";
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
													<a href="itemsafter.php?itemno=<?php echo($row['Itemno']); ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product ">
										<h4><a href="itemsafter.php"><?php echo($row['Name']);?></a></h4>
										<div class="info-product-price">
											<span class="item_price"><?php echo($row['Price']);?></span>
											 
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset>
																<input type="hidden" name="cmd" value="_cart">
																	<input type="hidden" name="add" value="">
																	<input type="hidden" name="business" value=" ">
																	<input type="hidden" name="item_name" value="<?php echo($row['Name']);?>">
																	<input type="hidden" name="amount" value="<?php echo($row['Price']);?>">
																	<input type="hidden" name="discount_amount" value="<?php echo($row['DiscountValue']);?>">
																	<input type="hidden" name="currency_code" value="USD">
																	
																	<input type="hidden" name="return" value=" ">
																	<input type="hidden" name="cancel_return" value=" ">
																	<input type="submit" name="submit" value="Add to cart" class="button">
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
<?php include "footer.php" ?>