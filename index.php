<?php
 include "includes/connection.php";
 include "includes/Header.php";
 include "includes/Navigation.php";
 include "function.php";
?>
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    STATICPOINT TUTORIALS
                    <small></small>
                </h1>
                <!-- First Blog Post -->
               
                <?php echo show_post(); ?>
                <hr>
               
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
