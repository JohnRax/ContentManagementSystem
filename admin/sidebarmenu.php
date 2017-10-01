 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                       <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-user"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="user.php?source=view_all_user" >View All Users</a>
                            </li>
                            <li>
                                <a href="user.php?source=add_new_user">Add New Users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-file"></i> Post <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post" class="collapse">
                            <li>
                                <a href="post.php?source=view_all_post" >View All Post</a>
                            </li>
                            <li>
                                <a href="post.php?source=add_new_post">Add New Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="category.php"><i class="fa fa-fw fa-file"></i> Category</a>
                    </li>
                    <li>
                        <a href="comments.php"><i class="fa fa-fw fa-comments"></i> Comments</a>
                    </li>                                
                </ul>
            </div>
        <!-- /.navbar-collapse -->
        </nav>