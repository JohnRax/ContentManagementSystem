<?php 
    include "../includes/connection.php";
    include "Header.php";
    include "Navigation.php";
    include "sidebarmenu.php";
    include "function.php";

 ?>       
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->          
                <?php delete_category(); ?>      
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            CATEGORY                            
                        </h1>
                            <div class="col-xs-6">
                            <form action="" method="post" > 
                              <div class="form-group" >
                                <label for="category_title">Add New Category</label><br>
                                <input type="text" name="category_title" class="form-control"/><br> 
                                <?php echo add_category(); ?>
                                <input type="submit" name="submit" class="btn btn-primary" value="Add Category"/>
                               
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
                  <div class="col-xs-6">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>                     
                                <th>ID</th>
                                <th>CATEGORY TITLE</th>                            
                            </tr>
                        </thead>
                        <tbody>       
                        <?php echo show_category(); ?>                                                                                                                                   
                        </tbody>
                        </table>     
                         <?php 
                            if(isset($_GET['edit']))
                            {
                            ?>
                            <form action="" method="post" > 
                              <div class="form-group" >
                                <label for="edit_category_title">Edit Category</label><br>
                                <?php echo edit_category(); ?>
                                <input type="submit" name="edit" class="btn btn-primary" value="Update Category"/>
                              </div>
                            </form>
                        </div>
                        <?php } ?>                              
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
