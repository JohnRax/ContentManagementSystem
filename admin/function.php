<?php 

function show_post()
{
	  global $connection;
	  $post_query="SELECT * FROM post";
    $post_result=mysqli_query($connection,$post_query);
    if(!$post_result)
    {
        die("Something Went Wrong.....");
    }
    while($row=mysqli_fetch_assoc($post_result))
    {
           $post_id=$row['post_id'];
           $post_category_id=$row['post_category_id'];
           $post_title=$row['post_title'];
           $post_author=$row['post_author'];
           $post_content=$row['post_content'];
           $post_date=$row['post_date'];
           $post_image=$row['post_image'];
           $post_tags=$row['post_tags'];
           $post_comment_count=$row['post_comment_counts'];
           $post_status=$row['post_status'];

            $category_title="";
            $category_query="SELECT * FROM category where Category_ID='$post_category_id'";
            $category_result=mysqli_query($connection,$category_query);
            if(!$category_result)
            {
                die("Something Went Wrong.....");
            } 
            while($row=mysqli_fetch_assoc($category_result))
            {
              $category_title=$row['Category_Title'];
            }

           echo "<tr>";
           echo "<td>".$post_id."</td>";       
           echo "<td><img width='100' src='../images/{$post_image}' alt=''></td>";     
           echo "<td>".$category_title."</td>";     
           echo "<td>".$post_title."</td>";
           echo "<td>".$post_author."</td>";
           echo "<td>".$post_date."</td>";
              
           echo "<td>".$post_tags."</td>";
           echo "<td>".$post_comment_count."</td>";
           echo "<td>".$post_status."</td>";
           echo "<td><a href='post.php?source=view_all_post&postapproved=".$post_id."' class='fa fa-check'></a></td>";
           echo "<td><a href='post.php?source=edit_post&postedit=".$post_id."' class='fa fa-edit'></a></td>";
           echo "<td><a href='post.php?source=view_all_post&postdelete=".$post_id."' class='fa fa-remove'></a></td>";
           echo "</tr>";  
    }
}
function show_users()
{
  global $connection;
  $user_query="SELECT * FROM users";
  $user_result=mysqli_query($connection,$user_query);
  if(!$user_result)
  {
    die("something went wrong...");
  }

  while($row=mysqli_fetch_assoc($user_result))
  {
    $user_image=$row['user_image'];
    $user_id=$row['user_id'];
    $user_firstname=$row['user_firstname'];
    $user_lastname=$row['user_lastname'];
    $user_email=$row['user_email'];
    $user_role=$row['user_role'];

     echo "<tr>";
     echo "<td>".$user_id."</td>";  
     echo "<td><img width='100' src='../images/{$user_image}' alt=''></td>";          
     echo "<td>".$user_firstname."</td>";     
     echo "<td>".$user_lastname."</td>";
     echo "<td>".$user_email."</td>";
     echo "<td>".$user_role."</td>";
     echo "<td><a href='user.php?source=edit_user&useredit=".$user_id."' class='fa fa-edit'></a></td>";
     echo "<td><a href='user.php?source=view_all_user&userdelete=".$user_id."' class='fa fa-remove'></a></td>";
     echo "</tr>";
  }

}
function add_user()
{
  global $connection;
  if(isset($_POST['submit']))
  {
    $user_role=$_POST['user_role'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_email=$_POST['user_email'];
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $user_role=$_POST['user_role'];
    $user_image=$_FILES['user_image']['name'];
    $user_imagetemp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_imagetemp,"../images/{$user_image}");

    $insertuser_query="INSERT INTO users(username,userpassword,user_firstname,user_lastname,user_email,user_image,user_role) values('$user_username','$user_password','$user_firstname','$user_lastname','$user_email','$user_image','$user_role')";
    $insertuser_result=mysqli_query($connection,$insertuser_query);
    if(!$insertuser_result)
    {
      die("Something went wrong....".mysqli_error($connection));
    }
    else
    {
        echo "<div class='alert alert-success'>";
        echo "<label><strong>Success!</strong> Add User Complete</label><br>";
        echo "</div>";
    }
  }
}
function delete_user()
{
  global $connection;
  if(isset($_GET['userdelete']))
  {
    $user_id=$_GET['userdelete'];
    $deleteuser_query="DELETE FROM users where user_id='$user_id'";
    $deleteuser_result=mysqli_query($connection,$deleteuser_query);
    if(!$deleteuser_result)
    {
      die("Something went wrong....".mysqli_error($connection));
    }
    
    header("Location:user.php?source=view_all_post");
  }
}
function approved_delete_post()
{	
	global $connection;
	if(isset($_GET['postapproved']))
	{
	    $approved_id=$_GET['postapproved'];
	    $approved_query="UPDATE post set post_status='Published' where post_id='$approved_id'";
	    $approved_result=mysqli_query($connection,$approved_query);
	    if(!$approved_result)
	    {
	        die("Something Went Wrong.....");
	    }
	    header("Location:post.php?source=view_all_post");
     
	}

   

	if(isset($_GET['postdelete']))
	{
	    $approved_id=$_GET['postdelete'];
	    $approved_query="DELETE FROM post where post_id='$approved_id'";
	    $approved_result=mysqli_query($connection,$approved_query);
	    if(!$approved_result)
	    {
	        die("Something Went Wrong....awefawef.");
	    }
	    header("Location:post.php?source=view_all_post");
	}  

}

function show_category()
{
	global $connection;
	$category_query="SELECT * FROM category";
    $category_result=mysqli_query($connection,$category_query);
    if(!$category_result)
     {
         die("Something Went Wrong.....");
     }
     while($row=mysqli_fetch_assoc($category_result))
     {
        $category_id=$row['Category_ID'];
        $category_title=$row['Category_Title'];

        echo "<tr>";
        echo "<td>".$category_id."</td>";
        echo "<td>".$category_title."</td>";
        echo "<td><a href='category.php?delete=".$category_id."'>Delete</a></td>";
        echo "<td><a href='category.php?edit=".$category_id."'>Edit</a></td>";
        echo "</tr>";  
     }

}
function add_category()
{
	global $connection;
	if(isset($_POST['submit']))
    {
        if(!$_POST['category_title']=="")
        {
            $category_title=$_POST['category_title'];
            $insertcategory_query="INSERT INTO category(Category_Title) values('$category_title')";
            $insertcategory_result=mysqli_query($connection,$insertcategory_query);
            if(!$insertcategory_result)
            {
               die("Something went wrong....".mysqli_error($connection));
            }
            

            echo "<div class='alert alert-success'>";
            echo "<label><strong>Success!</strong> Add Category Complete</label><br>";
            echo "</div>";
        }
        else
        {
            echo "<div class='alert alert-danger'>";
            echo "<label>Category Field Should not be Empty</label><br>";
            echo "</div>";
        }
   }
}

function edit_category()
{
	global $connection;	
  	$category_id=$_GET['edit'];                       
    $edit_query="SELECT * FROM category WHERE Category_ID='$category_id'";
    $edit_result=mysqli_query($connection,$edit_query);
    if(!$edit_result)
    {
        die("Something went wrong...");
    }

    while($row=mysqli_fetch_assoc($edit_result))
    {
        $category_id=$row['Category_ID'];
        $category_title=$row['Category_Title'];
        echo "<label for='category_id'>Category id</label>"; 
        echo "<input type='text' name='category_id' class='form-control' value=".$category_id." readonly>";  
        echo "<label for='category_title'>Category Title</label>";                                             
        echo "<input type='text' name='category_title' class='form-control' value=".$category_title."><br>";                                           

    }   

	if(isset($_POST['edit']))
	{
	    if(!$_POST['category_title']=="")
	    {
	        $category_id=$_POST['category_id'];
	        $category_title=$_POST['category_title'];
	        $edit_query="UPDATE category SET Category_Title='$category_title' WHERE Category_ID='$category_id'";
	        $edit_result=mysqli_query($connection,$edit_query);
	        if(!$edit_result)
	        {
	            die("something went wrong...");
	        }

	        header("Location: category.php");
	    }
	    else
	    {
	         echo "<div class='alert alert-danger'>";
	         echo "<label>Category Title Field Should not be Empty</label><br>";
	         echo "</div>";
	    }
	}      
}

function delete_category()
{
	global $connection;
	 if(isset($_GET['delete']))
     {
        $delete_id=$_GET['delete'];
        $delete_query="DELETE FROM category where Category_ID='$delete_id'";
        $delete_result=mysqli_query($connection,$delete_query);
        if(!$delete_result)
        {
            die("something went wrong...");
        }
        header("Location: category.php");
     }
}
function show_comments()
{
  global $connection;
  $category_query="SELECT * FROM comments ORDER BY comments_id desc";
  $category_result=mysqli_query($connection,$category_query);
  if(!$category_result)
  {
      die("Something Went Wrong.....");
  }

  while($row=mysqli_fetch_assoc($category_result))
      {
         $comments_id=$row['comments_id'];
         $comments_post_id=$row['comments_post_id'];
         $comments_date=$row['comments_date'];
         $comments_name=$row['comments_name'];
         $comments_email=$row['comments_email'];
         $comments_body=$row['comments_body'];
         $comments_status=$row['comments_status'];

         $response_query="SELECT * FROM post where post_id='$comments_post_id'";
         $response_result=mysqli_query($connection,$response_query);
         if(!$response_result)
         {
            die("Something went wrong..");
         }
         while($row=mysqli_fetch_assoc($response_result))
         {
           $post_title=$row['post_title'];
           echo "<tr>";
           echo "<td>".$comments_id."</td>";
           echo "<td>".$post_title."</td>";
           echo "<td>".$comments_date."</td>";
           echo "<td>".$comments_name."</td>";
           echo "<td>".$comments_email."</td>";
           echo "<td>".$comments_body."</td>";
           echo "<td>".$comments_status."</td>";
           echo "<td><a href='comments.php?approved=".$comments_id."&postid=".$comments_post_id."'>Approved</a></td>";
           echo "<td><a href='comments.php?commentsdelete=".$comments_id."&postiddelete=".$comments_post_id."'>Delete</a></td>";
           echo "</tr>";  
         }
       
      }
}

function approved_comments()
{
  global $connection;
  if(isset($_GET['approved']) && isset($_GET['postid'])  )
    {
        $approved_id=$_GET['approved'];
        $post_id=$_GET['postid'];

        $checkcomment="SELECT * FROM comments where comments_id='$approved_id'";
        $checkcomment_result=mysqli_query($connection,$checkcomment);
        if(!$checkcomment_result)
        {
              die("Something Went Wrong.....".mysqli_error($connection));
        }
        while($row=mysqli_fetch_assoc($checkcomment_result))
        {
          if($row['comments_status']=='Unapproved')
          {
            $approved_query="UPDATE comments set comments_status='Approved' where comments_id='$approved_id' ";
            $approved_result=mysqli_query($connection,$approved_query);
            if(!$approved_result)
            {
                die("Something Went Wrong.....".mysqli_error($connection));
            }
         
            $count_query="UPDATE post SET post_comment_counts=post_comment_counts+1 where post_id='$post_id'";
            $count_result=mysqli_query($connection,$count_query);
            if(!$count_result)
            {
                die("Something Went Wrong.....".mysqli_error($count_result));
            }                           
          }
        }                        
        header("Location:comments.php");

    }
}

function delete_comments()
{
   global $connection;
   if(isset($_GET['commentsdelete']))
    {
        $approved_id=$_GET['commentsdelete'];
        $post_id=$_GET['postiddelete'];
        $checkcomment="SELECT * FROM comments where comments_id='$approved_id'";
        $checkcomment_result=mysqli_query($connection,$checkcomment);
        if(!$checkcomment_result)
        {
            die("Something Went Wrong.....[dawdaw]");
        }

        while($row=mysqli_fetch_assoc($checkcomment_result))
        {
          if($row['comments_status']=='Approved')
          {
            $count_query="UPDATE post SET post_comment_counts=post_comment_counts-1 where post_id='$post_id'";
            $count_result=mysqli_query($connection,$count_query);
            if(!$count_result)
            {
                die("Something Went Wrong.....".mysqli_error($count_result));
            }   
          }     
        }

          $approved_query="DELETE FROM comments where comments_id='$approved_id'";
          $approved_result=mysqli_query($connection,$approved_query);
          if(!$approved_result)
          {
              die("Something Went Wrong.....");
          }
        header("Location:comments.php");
    }
}
 ?>

