<?php
        $active ='Contact Us';
        include("includes/header.php");
?>
</nav>
</header>

<div id="content"><!-- content Begin -->
    <div class="container-fluid"><!-- container Begin -->
    <div class="row">
        <div class="col-sm-12"><!-- col-md-12 Begin -->
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb"><!-- breadcrumb Begin -->
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Contact Us
                </li>
            </ol><!-- breadcrumb Finish -->
</nav>
        </div><!-- col-md-12 Finish -->
</div>

<div class="row justify-content-center"><!--row begin -->

        <div class="col-sm-8"><!-- col-sm-9 Begin -->
        
            <div class="box"><!-- box Begin -->

                <div class="box-header"><!-- box-header Begin -->

                    <div class="text-center"><!-- Center Begin -->

                        <h2> Feel free to Contact Us</h2>

                        <p class="text-muted"><!-- text-muted Begin -->

                            If you have any questions, feel free to contact us. Our customer service works <strong>24/7</strong>

                        </p><!-- text-muted finish -->

                    </div><!-- Center Finish  -->

                </div><!-- box-header Finish -->

                    <form action="contactus.php" method="post"><!--form Begin -->

                        <div class="form-group"><!--form-group Begin -->

                            <label for="Name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div><!--form-group Finish -->

                        <div class="form-group"><!--form-group Begin -->

                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div><!--form-group Finish -->

                        <div class="form-group"><!--form-group Begin -->

                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" required>
                        </div><!--form-group Finish -->

                        <div class="form-group"><!--form-group Begin -->

                            <label for="message">Message</label>
                            <textarea name="message" id="" cols="30" rows="10" class="form-control" required></textarea>
                        </div><!--form-group Finish -->

                        <div class="text-center"><!--text-center Begin -->

                            <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i> Send Message
                            </button>
                        </div><!--text-center Finish -->

                    </form><!-- Form  Finish -->
                
                    <?php 
                    
                    if(isset($_POST['submit'])){

                        /// Admin receives messafe with this ///

                        $sender_name = $_POST['name'];

                        $sender_email = $_POST['email'];

                        $sender_subject = $_POST['subject'];

                        $sender_message = $_POST['message'];

                        $receiver_email = "kolawoleolayinka16@gmail.com";

                        mail($receiver_email, $sender_name, $sender_subject, $sender_message, $sender_email);

                        /// Auto reply to sender with this ///

                        $email = $_POST['email'];

                        $subject = "Welcome to my website";

                        $msg = "Thanks for sending us a message. we will reply your messgae ASAP";

                        $from = "kolawoleolayinka16@gmail.com";

                        mail($email, $subject, $msg, $from);

                        echo "<h2 align='center'> Your Message has been sent successfully <h2/>";





                    }
                    
                    ?>

            </div>

            </div><!-- box Begin -->

        </div><!-- container Finish -->
</div><!-- content Finish -->

</div>
                </div>
<?php

        include("includes/footer.php");

        ?>



   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>
