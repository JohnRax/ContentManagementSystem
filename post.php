<?php 
 include "includes/connection.php";
 include "includes/Header.php";
 include "includes/Navigation.php";
 include "function.php";
 ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <?php echo show_fullpost(); ?>

                <!-- Blog Post -->
              
                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h3>Leave a Comment:</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control"/>
                            <label for="email">Email</label>
                            <input name="email" type="text" class="form-control"/>
                            <label for="comment">Comment</label>
                            <textarea name="comment"class="form-control" rows="3"></textarea>
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->              
                <?php echo show_comments();?>
                    
           
        </div>

<?php 

include "includes/SideBar.php";
include "includes/Footer.php";

?>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
