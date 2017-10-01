
<div class="row">
<div class="col-lg-12">
    <h1 class="page-header">
        VIEW ALL USER
        
    </h1>
    <?php echo delete_user(); ?>
   <div class="col-xl-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>                     
                <th>ID</th> 
                <th>IMAGE</th> 
                <th>FIRSTNAME</th>  
                <th>LASTNAME</th> 
                <th>EMAIL</th>             
                <th>ROLE</th>                                               
            </tr>
        </thead>
        <tbody>       
            <?php echo show_users(); ?>                                                                                                                
        </tbody>
    </table>
</div>
    
</div>
</div>
             


        
