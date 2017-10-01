
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            VIEW ALL POST                           
        </h1>     
    </div>
</div>
<?php echo approved_delete_post(); ?>
  <div class="col-xl-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>                     
                <th>ID</th> 
                <th>IMAGE</th>  
                <th>CATEGORY</th> 
                <th>TITLE</th> 
                <th>AUTHOR</th> 
                <th>DATE</th>                         
                <th>TAGS</th>
                <th>COMMENT COUNTS</th>
                <th>STATUS</th>                            
            </tr>
        </thead>
        <tbody>       
        <?php echo show_post(); ?>                                                                                                                                    
        </tbody>
    </table>
</div>
                
      
  


