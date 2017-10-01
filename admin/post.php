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
                            POST                           
                        </h1>     
                    </div>
                </div>

			<?php 
				
				if(isset($_GET['source']))
				{
					$source=$_GET['source'];
				}
				else
				{
					$source='';
				}
					
					switch ($source) 
					{
						case 'view_all_post':
							include "post_viewall.php";						
							break;
						case 'add_new_post':
							include "post_addnew.php";						
							break;
						case 'edit_post':
							include "post_edit.php";						
							break;
						default:
							include "post_viewall.php";	
							break;
					}				
			 ?>
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