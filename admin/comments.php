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
                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            PENDING COMMENTS                           
                        </h1>
                           
                    </div>
                </div>
                <?php                   
                   echo approved_comments();
                   echo delete_comments();                 
                ?>
                  <div class="col-xl-6">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>                     
                                <th>ID</th>
                                <th>RESPONSE TO</th> 
                                <th>DATE</th> 
                                <th>NAME</th> 
                                <th>EMAIL</th>
                                <th>CONTENT</th>
                                <th>STATUS</th>   
                                <th>APPROVED</th>     
                                <th>DELETE</th>                          
                            </tr>
                        </thead>
                        <tbody>       
                        <?php  echo show_comments();?>                                                                                                                                    
                        </tbody>
                    </table>
                </div>
                
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
