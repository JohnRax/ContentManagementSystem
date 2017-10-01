<?php 
function show_post_category()
{
	global $connection;
	$post_id=$_GET['id'];
    $post="SELECT * FROM post WHERE post_category_id=$post_id and post_status!='draft' order by post_date desc";
    $post_result=mysqli_query($connection,$post);
    if(!$post_result)
    {
        die("no result".mysqli_error($connection));
    }                                                                                         
		
   			
	$count=mysqli_num_rows($post_result);
    if($count==0)
	{
			echo "<h1>No Result Found</h1>";
	}
    while($row=mysqli_fetch_assoc($post_result))
    {

        $post_id=$row["post_id"];
        $post_title=$row["post_title"];
        $post_author=$row["post_author"];
        $post_date=$row["post_date"];
        $post_image=$row["post_image"];
        $post_content=$row["post_content"];

        echo "<h2><a href='post.php?id={$post_id}'>{$post_title}</a></h2>";
        echo "<p class='lead'>by <a href='index.php'>{$post_author}</a></p>";
        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>";
        echo "<hr><img class='img-responsive' src='images/{$post_image}' alt=''><hr>";
        echo "<p>{$post_content}</p>";
        echo "<a class='btn btn-primary' href='post.php?id={$post_id}'>Read More <span class=glyphicon glyphicon-chevron-right></span></a> <hr>";
    } 
    
}
function search_post()
{	
	global $connection;
	if(isset($_POST['submit']))
	{
		$search=$_POST['search'];
        $search=mysqli_real_escape_string($connection,$search);
		$search_query="SELECT * FROM post WHERE post_tags LIKE '%$search%' and post_status!='draft' order by post_date desc";
		$search_result=mysqli_query($connection,$search_query);
		if(!$search_result)
		{
			die("Query Failed".mysqli_error($connection));
		}

		$rows=mysqli_num_rows($search_result);
		if($rows==0)
		{
			echo "<h1>No Result Found For ".$search."</h1>";
		}
		else
		{
            while($row=mysqli_fetch_assoc($search_result))
            {
                $post_id=$row["post_id"];
                $post_title=$row["post_title"];
                $post_author=$row["post_author"];
                $post_date=$row["post_date"];
                $post_image=$row["post_image"];
                $post_content=$row["post_content"];

	            echo "<h2><a href='post.php?id={$post_id}'>{$post_title}</a></h2>";
		        echo "<p class='lead'>by <a href='index.php'>{$post_author}</a></p>";
		        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>";
		        echo "<hr><img class='img-responsive' src='images/{$post_image}' alt=''><hr>";
		        echo "<p>{$post_content}</p>";
		        echo "<a class='btn btn-primary' href='post.php?id={$post_id}'>Read More <span class=glyphicon glyphicon-chevron-right></span></a> <hr>";
	    	}
		}

	}
}
function show_post()
{
	global $connection;	
    $post="SELECT * FROM post where post_status!='draft' order by post_date desc";
    $post_result=mysqli_query($connection,$post);
    if(!$post_result)
    {
        die("no result".mysqli_error($connection));
    }                                                                                         
		 			
	$count=mysqli_num_rows($post_result);
    if($count==0)
	{
			echo "<h1>No Result Found</h1>";
	}
    while($row=mysqli_fetch_assoc($post_result))
    {

        $post_id=$row["post_id"];
        $post_title=$row["post_title"];
        $post_author=$row["post_author"];
        $post_date=$row["post_date"];
        $post_image=$row["post_image"];
        $post_content=substr($row["post_content"],0, 100);

        echo "<h2><a href='post.php?id={$post_id}'>{$post_title}</a></h2>";
        echo "<p class='lead'>by <a href='index.php'>{$post_author}</a></p>";
        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>";
        echo "<hr><img class='img-responsive' src='images/{$post_image}' alt=''><hr>";
        echo "<p>{$post_content}</p>";
        echo "<a class='btn btn-primary' href='post.php?id={$post_id}'>Read More <span class=glyphicon glyphicon-chevron-right></span></a> <hr>";
    } 

}
function show_fullpost()
{
	global $connection;
	$post_id=$_GET['id'];
    $post="SELECT * FROM post WHERE post_id=$post_id and post_status!='draft'";
    $post_result=mysqli_query($connection,$post);
    if(!$post_result)
    {
        die("no result".mysqli_error($connection));
    }                       
    while($row=mysqli_fetch_assoc($post_result))
    {
	     $post_id=$row["post_id"];
	     $post_title=$row["post_title"];
	     $post_author=$row["post_author"];
	     $post_date=$row["post_date"];
	     $post_image=$row["post_image"];
	     $post_content=$row["post_content"]; 
      
        echo "<h1>{$post_title}</h1>";
        echo "<p class='lead'>by <a href='#'>{$post_author}</a></p>";
        echo "<hr><p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p><hr>";            
        echo "<img class='img-responsive' src='images/{$post_image}' alt=''><hr>";
        echo "<p>{$post_content}</p><hr>";     

    }

    if(isset($_POST['submit']))
    {                
        $name=$_POST['name'];
        $email= $_POST['email'];
        $comment=$_POST['comment'];
        $date=date("Y-m-d H:i:s");                        
        $comments_query="INSERT INTO comments(comments_post_id,comments_date,comments_name,comments_email,comments_body) VALUES('$post_id','$date','$name','$email','$comment')";
        $comments_result=mysqli_query($connection,$comments_query);
        if(!$comments_result)
        {
            die("Insert Comment Failed".mysqli_error($connection));
        }

    }
}

function show_comments()
{
	global $connection;
	$post_id=$_GET['id'];
	 $showcomments_query="SELECT * FROM comments where comments_post_id='$post_id' and comments_status!='Unapproved'";
     $showcomments_result=mysqli_query($connection,$showcomments_query);
     if(!$showcomments_result)
     {
        die("Comments Failed to Load".mysqli_error($connection));
     }

     while($row=mysqli_fetch_assoc($showcomments_result))
     {
        $name=$row['comments_name'];
        $date=$row['comments_date'];
        $comment=$row['comments_body']; 

      		echo "<div class='media'>"; 
            echo "<div class='media-body'>";               
      		echo "<a class='pull-left' href='#''><img class='media-object' src='images/commenticon.png' alt=''></a>";
            echo "<h4 class='media-heading'>{$name}  ";
            echo "<small>{$date}</small>";
            echo "</h4>{$comment}";
            echo "</div>";  
            echo "</div>";   
         
    }
}
?>