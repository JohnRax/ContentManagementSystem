<?php 
    session_start();
    if (isset($_SESSION['user_role'])) 
    {
         if ($_SESSION['user_role']!=="Administrator") 
         {
             header("Location:../index.php");
         }
    } 
    else
    {
        header("Location:../index.php");
    }
    include "Header.php";
    include "Navigation.php";
    include "sidebarmenu.php";
    
 ?>
           

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Back Admin <?php echo $_SESSION['user_firstname'] ?>
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
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
