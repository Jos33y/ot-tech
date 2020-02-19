<?php

if(!isset($_SESSION['email'])){

    echo "<script>window.open('https://e-acez.com/sign-in.php', '_self')</script>";
 
 }else{


?>

<?php

    $get_account = "select * from bank_details";

    $run_edit = mysqli_query($con, $get_account);

    $row_edit = mysqli_fetch_array($run_edit);

    $bank_id = $row_edit['bank_id'];

    $bank_name = $row_edit['bank_name'];                                      

    $account_name = $row_edit['account_name'];

    $account_no = $row_edit['account_no'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> View Bank Account Details </title>
    
    
   
</head>
<body>   
    <div class="row"><!-- row Begin -->

        <div class="col-lg-12">

            <ol class="breadcrumb">

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Bank Account Details

                </li>


            </ol>

        </div>

    </div><!--row Finish -->
    <div class="row">

        <div class="col-lg-12 ">
        

            <div class="panel panel-default">

                <div class="panel-heading">
                   
                    <h3 class="panel-title">

                        <i class="fa fa-tags fa-fw"></i> View Bank Account Details

                    </h3>

                </div>

                <div class="panel-body">

                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!--form Begin --> 

                    <div class="form-group">

                        <label for="business_name" class="col-md-3 control-label">Bank Name:</label>

                            <div class="col-md-6"><!--col-md-6 Begin --> 

                                <input type="text" class="form-control" name="bank_name" value="<?php echo $bank_name; ?>" readonly>

                            </div>

                        </div>

                    <div class="form-group">

                        <label for="email" class="col-md-3 control-label">Account Name:</label>

                            <div class="col-md-6"><!--col-md-6 Begin --> 

                                <input type="text" name="acct_name" class="form-control" value="<?php echo $account_name; ?>" readonly>

                            </div>

                    </div>
                     <div class="form-group">

                        <label for="email" class="col-md-3 control-label">Account No:</label>

                            <div class="col-md-6"><!--col-md-6 Begin --> 

                                <input type="text" name="acct_no" class="form-control" value="<?php echo $account_no; ?>" readonly>

                            </div>

                    </div>
                      <div class="form-group"><!-- form-group Begin -->  

                        <label  class="col-md-3 control-label"></label>

                            <div class="col-md-6"><!--col-md-6 Begin --> 
                            
                                <input value="Edit" name="edit" type="submit" class="btn btn-primary form-control">

                            </div><!--col-md-6 Finish --> 

                    </div><!-- form-group Finish -->

        </form><!-- form Finish --> 

             </div>

        </div>

    </div>

</div>

</body>
</html>

<?php

if(isset($_POST['edit'])){

    echo "<script>window.open('index.php?edit_account', '_self')</script>"; 
}  

    ?>

<?php } ?> 
