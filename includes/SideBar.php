 <div class="col-md-4">
 <!-- Blog Sidebar Widgets Column -->
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>

                    <form action="Search.php" method="post">
                        
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">                        
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </form>
                        </div>                   
                    <!-- /.input-group -->
                </div>

                 <!-- Login -->
                <div class="well">
                    <h4>Login</h4> 

                    <form action="includes/login.php" method="post"> 
                        <h5>Username</h5>
                        <input name="username" type="text" class="form-control" placeholder="Enter Username here">   
                        <h5>Password</h5> 
                        <input name="password" type="password" class="form-control" placeholder="Enter Password here"><br>
                        <input name="login" type="submit" class="btn btn-primary"></input>
                    </form>                  
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">                   
                    <h4>Recent Blogs</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                    <?php
                                     
                                       $getcategory_sidebar_query="SELECT * FROM post order by post_id desc LIMIT 10";
                                       $result=mysqli_query($connection,$getcategory_sidebar_query);

                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $post_title=$row["post_title"];
                                            $post_id=$row["post_id"];                                        
                                            echo "<li><a href='post.php?id={$post_id}'>{$post_title}</a></li>";

                                        }

                                    ?>  
                                                        
                            </ul>
                        </div>
                      
                    </div>
                   
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->