<?php
        $active ='Shopping Cart';
        include("includes/header.php");
?>

<?php 

  $get_pro = "select * from products where product_id='$product_id'";

  $run_pro = mysqli_query($con, $get_pro);

  $row_pro = mysqli_fetch_array($run_pro);

     $cat =  $row_pro['p_cat_id'];
  
     $get_cat ="select * from product_categories where p_cat_id='$cat'";

     $run_cat = mysqli_query($con, $get_cat);

     $row_cat = mysqli_fetch_array($run_cat);

        $size_id = $row_cat['size_id'];



?>

<div id="content"><!-- content Begin -->
    <div class="container"><!-- container Begin -->
    <div class="row">
        <div class="col-md-12"><!-- col-md-12 Begin -->
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb"><!-- breadcrumb Begin -->
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>

                <li class="breadcrumb-item">
                     <a href="showroom.php">Shop</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                      <a href="showroom.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?> </a>
                </li> 

                <li class="breadcrumb-item">
                    <?php echo $pro_title; ?> 
                </li>
            </ol><!-- breadcrumb Finish -->
</nav>
        </div><!-- col-md-12 Finish -->
</div>
    </div>

<div class="container"><!--row begin -->
   
            <div id="productMain" class="row"><!-- col-sm-productMain Begin -->
                <div class="col-md"><!-- col-sm-6 Begin -->
                    <div id="mainImage"><!-- mainImage Begin -->
                          <div id="myCarousel" class="carousel slide"  data-ride="carousel"> <!-- carousel slide begin -->

                                <ol class="carousel-indicators"><!-- carousel indicators begin -->
                                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                  <li data-target="#myCarousel" data-slide-to="1" ></li>
                                  <li data-target="#myCarousel" data-slide-to="2" ></li>
                                </ol><!-- carousel indicator finish -->

                          <div class="carousel-inner"><!-- carousel inner begin -->

                              <div class="carousel-item active">

                                  <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product_display_one" class="img-fluid">

                              </div>

                              <div class="carousel-item">

                                  <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="<?php echo $pro_img2; ?>" class="img-fluid">

                              </div>

                              <div class="carousel-item">

                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>"  alt="<?php echo $pro_img3; ?>" class="img-fluid">

                              </div>
                            
                            </div><!-- carousel inner finish -->

                            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                              </a>
                              <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                              </a>

                        </div><!-- myCarousel Finish -->
                    </div><!-- mainImage Finish -->    
                                 

                     <div class="row" id="thumbs"><!-- row thumbs begin -->
                  
                      <div class="col-4"><!--col-xs-4 begin -->
                      <a data-target="#myCarousel" data-slide-to="0"  href="" class="thumb"><!--thumbs begin -->
                        <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Small Product One" class="img-fluid">
                      </a><!--thumbs finish -->
                    </div><!--col-xs-4 finish -->
                  

                    <div class="col-4"><!--col-xs-4 begin -->
                      <a data-target="#myCarousel" data-slide-to="1"  href="" class="thumb"><!--thumbs begin -->
                        <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Small Product Three" class="img-fluid">
                      </a><!--thumbs finish -->
                    </div><!--col-xs-4 finish -->


                    <div class="col-4"><!--col-xs-4 begin -->
                      <a data-target="#myCarousel" data-slide-to="2"  href="" class="thumb"><!--thumbs begin -->
                        <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Small Product Two" class="img-fluid">
                      </a><!--thumbs finish -->
                    </div><!--col-xs-4 finish -->
                  
                  </div><!-- row Finish -->

                </div><!-- col-sm-6 Finish -->

            
                <div class="col-md"><!-- col-sm-6 Begin -->
                  <div class="box"><!--Box Begin -->
                    <h3 class="details-title"><?php echo $pro_title; ?></h3>
                    <h3 class="details-price">&#8358; <?php echo $pro_price; ?></h3>
                    <hr>

                    <?php add_cart(); ?>

                      <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!--form Begin-->
                        <div class="form-group"><!--form-group Begin-->
                        <label for="" class="col-md-7 control-label">Products Quantity</label>
                        
                        <div class="col-md-7"><!--col-md-7 Begin-->
                          <select name="product_qty" id="" class="form-control"><!--product_qty begin-->
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select><!--product_qty Finish-->
                        </div><!--col-md-7 Finish-->
                        
                        </div><!--form-group Finish-->

                        <div class="form-group"><!--form-group Begin-->
                          <label class="col-md-5 control-label">Product Size</label>
                        
                          <div class="col-md"><!--col-md-7 Begin-->
                          
                          <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for product')" ><!--Select Finish-->
                          
                          <option disabled selected>Select a size</option>
                          <?php 
                           $get_size = "select * from sizes where size_id='$size_id'";

                           $run_size = mysqli_query($db, $get_size);
                       
                           while($row_size=mysqli_fetch_array($run_size)){
                       
                               $size = $row_size['available_size'];                                                                                                            
                              
                               ?>
                               <option value="<?php echo $size;?>"><?php echo $size;?> </option>                                                                                                  
                            
                       <?php }
                       ?>                                                
                          </select><!--Select Finish-->
                        
                          </div><!--col-md-7 Finish-->
                        </div><!-- Form-group Finish-->

                       
                        <h4 class="text-center details-btn"><button class="btn btn-primary"> Add to cart <i class="fa fa-shopping-cart"></i></button></h4>
                        
                      </form><!--form Finish-->
                 
                      <hr>


                          <h4 class="prod-details">Product Details</h4>
                                <p>

                                <?php echo $pro_desc; ?> 
                                
                                </p>
                                       

                      
                                    <hr>
                      </div><!-- box Finish -->

                  
                </div><!-- col-sm-6 Finish -->


            </div><!-- productMain Finish -->

                <div class="col-sm-12 box"><!-- box same-height headline Begin -->
                  <h3 class="text-center details-title">Products you May Like</h3>
                </div><!-- box same-height headline Finish -->

                
    <div id="content" class="container-fluid"><!-- container-fluid begin -->

      <div class="row"><!-- row begin -->

              <?php

                $get_products = "select * from products order by rand() LIMIT 0,4";

                $run_products = mysqli_query($con, $get_products);

              while($row_products = mysqli_fetch_array($run_products)){

                $pro_id = $row_products['product_id'];

                $pro_title = $row_products['product_title'];
                
                $pro_img1 = $row_products['product_img1'];

                $pro_price = $row_products['product_price']; 
                echo "

        <div class='top-box'><!-- Box Begin -->

                <table class='table'><!-- table Begin -->

                    <tbody>
                     <tr>
                         <td colspan='8'>
                         <a href='details.php?pro_id=$pro_id'>
                              
                         <img class='pro-images' src='admin_area/product_images/$pro_img1' alt='product_image'><br>
                            
                                <span class='pro-name'>$pro_title </span><br>
                                  <span class='pro-price'> &#8358; $pro_price </span> 
                             
                     </a>
                         </td>
                      </tr>
                    </tbody>

                </table>
        </div>
        

                    ";
              }




              ?>
             
          </div><!-- same-height-row Finish -->


        </div><!-- col-sm-9 Finish -->
      
    </div><!--row finish -->

  </div><!-- container Finish -->

</div><!-- content Finish -->

</div>
<?php

        include("includes/footer.php");

        ?>



   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>

           