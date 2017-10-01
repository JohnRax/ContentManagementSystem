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
            <div class="col-md-8">
                <h1 class="page-header">
                    STATICPOINT TUTORIALS
                    <small></small>
                </h1>
                <?php echo show_post_category();?>                
                                         
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

                                       
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
