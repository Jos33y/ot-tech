<?php


include("includes/dbcon.php");
include("functions/functions.php");

?>
<?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$firstname = $row_customer['firstname'];

$lastname = $row_customer['lastname'];

$customer_email = $row_customer['customer_email'];

$customer_phone = $row_customer['customer_phone'];

$customer_address = $row_customer['customer_address'];

$customer_city = $row_customer['customer_city'];

$customer_state = $row_customer['customer_state'];

$customer_country = $row_customer['customer_country'];

$customer_zip = $row_customer['customer_zip'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OT-Tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link rel="stylesheet" href="styles/style.css">

</head>


<body>

<nav class="navbar navbar-light navbar-expand-sm"><!-- navbar navber-default begin-->
      <?php  
       $get_logo = "select * from logo";
       $run_logo = mysqli_query($con, $get_logo);

       while($row_logo = mysqli_fetch_array($run_logo)){

                $logo_id = $row_logo['logo_id'];
                $logo = $row_logo['b_logo'];
                $b_name = $row_logo['b_name'];
       }

      ?>
         <div class="container-fluid"><!-- container-fluid begin-->
            <a class="navbar-brand ml-3" href="index.php">
              <img src="images/<?php echo $logo; ?>" width="60" height="60" class="logo">
              <span class="logo-head"><?php echo $b_name; ?></span>
            </a>
            </div>   
                    
                    </div><!-- container-fluid finish -->
                  </nav><!-- navbar navber-default finish -->

<div id="content"><!-- content Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row checkout">


            <div class="col-sm-8"><!-- col-sm-9 Begin -->

<div class="box"><!-- box Begin -->

<div class="box-header"><!-- box-header Begin -->

    <h6><strong> <i class="fa fa-check-circle"></i> ADDRESS DETAILS</strong></h6>

</div><!-- box-header Finish -->

    <form action="checkout.php" method="post"><!--form Begin -->

        <div class="form-group"><!--form-group Begin -->

        <div class="form-row">
            <div class="col">
            <input type="text" class="form-control" placeholder="First name" value="<?php echo $firstname; ?>" readonly>
            </div>
            <div class="col">
            <input type="text" class="form-control" placeholder="Last name" value="<?php echo $lastname; ?>" readonly>
            </div>
        </div>

        </div><!--form-group Finish -->

        <div class="form-group"><!--form-group Begin -->
        
        <label for="email" class="sr-only"> Email: </label>

        <input type="text" name="c_email" id="c_email" class="form-control" placeholder="Email"  value="<?php echo $customer_email; ?>" readonly>
    
    </div><!--form-group Finish -->


        <div class="form-group"><!--form-group Begin -->

                <label for="Phone" class="sr-only"> Phone: </label>

                <input type="text" name="c_phone" class="form-control" placeholder="Phone number"  value="<?php echo $customer_phone; ?>" readonly>

        </div><!--form-group Finish -->

        

        <div class="form-group"><!--form-group Begin -->

                <label for="Address" class="control-label"> Address: </label>

                <textarea name="c_address" id="c_address" cols="20" rows="5"class="form-control" placeholder="Street Name / Building / Apartment No. / Floor" required><?php echo $customer_address; ?></textarea>

            </div><!--form-group Finish -->

            <div class="form-group"><!--form-group Begin -->

                <label for="City" class="sr-only"> City: </label>

                <input type="text" name="c_city" class="form-control" placeholder="City" value="<?php echo $customer_city; ?>" required>

                </div><!--form-group Finish -->



            <div class="form-group">
        <label for="state" class="sr-only">State</label>
            <select type="text" name="c_state" class="form-control">
                <option value="<?php echo $customer_state; ?>"><?php echo $customer_state; ?></option>
                <option value="Abia">Abia</option>
                <option value="Adamawa">Adamawa</option>
                <option value="Akwa Ibom">Akwa Ibom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="Cross Rive">Cross River</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Ekiti">Ekiti</option>
                <option value="Enugu">Enugu</option>
                <option value="FCT">Federal Capital Territory</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Kano">Kano</option>
                <option value="Katsina">Katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">Lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ogun">Ogun</option>
                <option value="Ondo">Ondo</option>
                <option value="Osun">Osun</option>
                <option value="Oyo">Oyo</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Yobe">Yobe</option>
                <option value="Zamfara">Zamfara</option>
            </select>
        </div>


        <div class="form-group"><!--form-group Begin -->

        <div class="form-row">
            <div class="col">
            <label for="Country" class="sr-only"> Country </label>
                         <select name="c_country" id="c_country" class="form-control " required>

                                    <option value="<?php echo $customer_country; ?>"><?php echo $customer_country; ?></option>
                                    <option value="Nigeria" selected>Nigeria</option>
                        </select>
            </div>
            <div class="col">
            <input type="text" name="c_zip" id="c_zip" class="form-control" placeholder="Zip code" value="<?php echo $customer_zip; ?>">

            </div>
        </div>

        </div><!--form-group Finish -->

<br>

 <div class="text-center"><!--text-center Begin -->

                            <button  name="save" class="btn btn-primary col-sm-6">
                            <i class="fa fa-user-md"></i>   SAVE AND CONTINUE
                            </button>
                        </div><!--text-center Finish -->
                        
        

    </form><!-- Form  Finish -->

</div><!-- box Finish -->

            </div>



<div class="col-sm-4"><!-- col-sm-3 Begin -->
<?php

   include("includes/order_summary.php");

   ?>

</div><!-- col-sm-3 Finish -->
<?php 
if(isset($_POST['save'])){

$update_id = $customer_id;

$c_email = $_POST['c_email'];

$c_phone = $_POST['c_phone'];    

$c_address = $_POST['c_address']; 

$c_city = $_POST['c_city'];    

$c_state = $_POST['c_state'];   

$c_country = $_POST['c_country'];    

$c_zip = $_POST['c_zip'];    

$update_customer = "update customers set 
customer_address='$c_address', customer_city='$c_city', customer_state='$c_state', 
customer_country='$c_country', customer_zip='$c_zip'  where customer_id = '$update_id'";

$run_customer = mysqli_query($con, $update_customer);

if($run_customer){

    echo "<script>alert('Address Saved Successfully')</script>";

    echo "<script>window.open('payment_options.php', '_self')</script>";
}
}
