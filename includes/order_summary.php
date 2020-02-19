<?php

$ip_add = getRealIpUser();

$select_cart ="select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con, $select_cart);

$count =mysqli_num_rows($run_cart);

?>
<?php
                            $total =0;

                    while($row_cart = mysqli_fetch_array($run_cart)){

                    $pro_id = $row_cart['p_id'];

                    $pro_size = $row_cart['size'];

                    $pro_qty = $row_cart['quantity'];

                    $get_products = "select * from products where product_id='$pro_id'";

                    $run_products = mysqli_query($con, $get_products);

                    while($row_products=mysqli_fetch_array($run_products)){

                        $product_title = $row_products['product_title'];

                        $product_img1 = $row_products['product_img1'];

                        $product_price = $row_products['product_price'];

                        $sub_total = $row_products['product_price']*$pro_qty;

                        $total += $sub_total;
                    
                    ?>
                    <?php } }?>

<div id="order-summary" class="box"><!--#order-summary Begin -->

<div class="box-header">

    <h4>Order Summary</h4>

</div>

<p class="text-muted">

Shipping and additional costs are calculated based on value you provide
</p>

<div class="table-responsive">

<table class="table"><!--table Begin -->

    <tbody  style="color: #f2f1f6;">

    <tr>

        <td> Order Sub-Total </td>
        <th> &#8358; <?php echo $total; ?>  </th>
    </tr>

    <tr>

        <td> Shipping and Handling</td>
        <td>&#8358; 0</td>
    </tr>

    <tr>

        <td> Tax </td>
        <td> &#8358; 0 </td>
    </tr>

    <tr class="total">

        <td> Total</td>
        <td> &#8358; <?php echo $total; ?></td>
    </tr>
    </tbody>

    

</table>
</div>
<div class="text-center"><!-- pull-right Begin -->
         
         <a href="cart.php" class="btn btn-primary btn-sm">
            <i class="fa fa-shopping-cart" ></i> Return to cart
         </a>

     </div><!-- pull-right Finish -->

</div><!--order-summary Finish -->