<?php      
session_start();
include("includes/dbcon.php");

if(!isset($_SESSION['email'])){

   echo "<script>window.open('https://e-acez.com/sign-in.php', '_self')</script>";

}else{

    ?>
    <?php

    if(isset($_GET['print_receipt'])){

           $payment_id = $_GET['print_receipt'];

               $get_receipt = "select * from payments where payment_id='$payment_id'";

               $run_receipt = mysqli_query($con, $get_receipt);

               $row_receipt=mysqli_fetch_array($run_receipt);

               $customer_email = $row_receipt['customer_email'];

                   $invoice_no = $row_receipt['invoice_no'];

                   $amount_paid = $row_receipt['amount'];    

                   $payment_date = $row_receipt['payment_date'];  

    }

    $get_customer = "select * from customers where customer_email ='$customer_email'";

    $run_customer = mysqli_query($con, $get_customer);

    $row_customer =mysqli_fetch_array($run_customer);
        $firstname = $row_customer['firstname'];
        $lastname = $row_customer['lastname'];
        $c_phone = $row_customer['customer_phone'];
        $c_address = $row_customer['customer_address'];
        $c_city = $row_customer['customer_city'];
        $c_state = $row_customer['customer_state'];
        $c_country = $row_customer['customer_country'];


    $email = $_SESSION['email'];          

    $get_customer_info = "select * from customer_info where email ='$email'";

    $run_customer_info = mysqli_query($conn, $get_customer_info);

    while($row_customer_info=mysqli_fetch_array($run_customer_info)){


        $b_name = $row_customer_info['business_name'];

        $phone = $row_customer_info['phone_number'];

         $address = $row_customer_info['address'];

         $state = $row_customer_info['state'];      
         
         $country = $row_customer_info['country'];   

    }
    
    $get_logo = "select * from logo";

    $run_logo = mysqli_query($con, $get_logo);

    $row_logo = mysqli_fetch_array($run_logo);

    $shop_logo = $row_logo['b_logo'];
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OT-Tech admin area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
   <link rel="stylesheet" href="font-awsome\css\font-awesome.min.css">
   <link rel="stylesheet" href="css/styles.css">

 
</head>
<body class="center">

    <div class="container ">
    <form method="post">
        <div class="container receipt">
        <div class="header-receipt">
        <span class="h1">  <?php echo $b_name; ?>  </span>
            <img class="header-image" src="../images/<?php echo $shop_logo; ?>" > 
        </div>

<div class="row">
    <div class="col-md-5">
        <div class="table invoice"><!--table responsive begin -->
            <table class="table table-striped table-bordered"><!--table Begin -->

              

                                

                <thead> 
                    <tr>
                        <th> Invoice number </th>
                        <th> Date of issue </th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <td> <?php echo $invoice_no; ?>  </td>               
                        <td> <?php echo $payment_date; ?> </td>
                    </tr>

               
                </tbody>
                </table>
        </div><br>

        <div class="table invoice"><!--table responsive begin -->
            <table class="table table-striped table-bordered"><!--table Begin -->
                <thead> 
                    <tr>
                        <th> Billed to </th>
                        <th>  <?php echo $b_name; ?>   </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $firstname . ' ' . $lastname ; ?> </td>    
                        <td> <?php echo $phone; ?></td>
                    </tr> 
                    <tr>
                        <td><?php echo $c_phone; ?> </td>    
                        <td> <?php echo $address; ?></td> 
                    </tr>        
                     <tr>
                        <td><?php echo $c_address . ' '. $c_city .','; ?> </td>    
                        <td> <?php echo $state; ?> </td> 
                    </tr>   
                    <tr>
                        <td><?php echo $c_state . ', ' . $c_country . '.'; ?> </td>    
                        <td> <?php echo $country; ?> </td> 
                    </tr>   
                                            
              
                </tbody>
            </table>
        </div><br>
    </div>
</div>
    <?php 

$get_customer_orders = "select * from pending_orders where invoice_no ='$invoice_no'";

$run_customer_orders = mysqli_query($con, $get_customer_orders);

?>
<div class="row">
    <div class="col-md-8">
        <div class="table"><!--table responsive begin -->
            <table class="table table-striped table-bordered table-hover"><!--table Begin -->

                <thead> 
                    <tr>
                        <th> S/N </th>
                        <th> Product Name </th>
                        <th> Qty </th>
                        <th> Size </th>
                        <th> Amount </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=0;
                     $total =0;
                
                    while($row_customer_orders=mysqli_fetch_array($run_customer_orders)){
                
                         $pro_name = $row_customer_orders['product_name'];
                
                         $qty = $row_customer_orders['quantity'];  
                         
                         $size = $row_customer_orders['size'];

                         $no =  $row_customer_orders['invoice_no'];

                            $get_amt = "select * from customer_orders where invoice_no ='$no'";

                            $run_amt= mysqli_query($con, $get_amt);
                        
                            $row_amt=mysqli_fetch_array($run_amt);

                                $amt = $row_amt['due_amount'];

                                $total += $amt;
                                $i++;
                     
                              
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>  
                        <td><?php echo $pro_name; ?></td>               
                        <td><?php echo $qty; ?>   </td>
                        <td><?php echo $size; ?>   </td>
                        <td>&#8358; <?php echo $amt; ?>   </td>
                    </tr>
                    <?php }?>
                    
                    <tr>
                        <th> </th>
                        <th colspan="3">Total </th>
                        <th>&#8358; <?php echo $total; ?>  </th>
                    </tr>
                   
                </tbody>
            </table>
                </div><br>
                <div class="thank-you">
                    <h4> Thank you for shoppping with us </h4>
                </div>

    </div>
</div>
<div class="button">
<button class="btn btn-danger" onclick="javascript:window.print()" class="btn-print">Print</button>

</div>
        </div>
        </form>
    </div>

</body>
</html>

<?php } ?>