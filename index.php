<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html" charset="utf-8">
    <title>A news Platform</title>
    <link rel="stylesheet" href="styles/style.css" media="all" />
</head>
<body>
<div class="container">
    <div class="head">
        <img id="logo" src="images/logo.png">
        <img id="banner" src="images/ad_banner.gif">
    </div>

    <div class="navbar">
        <ul id="menu">
            <?php
            require 'admin/includes/database.php';
            $get_cats = "select * from categories";
            $run_cats = mysqli_query($link, $get_cats);

            while ($cats_row = mysqli_fetch_array($run_cats)) {
                $cat_id = $cats_row['cat_id'];
                $cat_title = $cats_row['cat_title'];

                echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
            }



            ?>
        </ul>
        <div id="form">
            <form method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="search_query" />
                <input type="submit" name="search" value="Search Now">

            </form>
        </div>
    </div>

    <div class="post_area">
        <?php
            $get_posts = "select * from posts order by rand() limit 0,5";

            $run_posts = mysqli_query($link, $get_posts);

            while ($row_posts = mysqli_fetch_array($run_posts)) {
                $post_id = $row_posts['post_id'];
                $post_title = $row_posts['post_title'];
                $post_date = $row_posts['post_date'];
                $post_author = $row_posts['post_author'];
                $post_image = $row_posts['post_image'];
                $post_content = $row_posts['post_content'];

                echo "
                    <h2>$post_title</h2>
                    <span>$post_author</span>  <span>$post_date</span>
                    <img src='admin/news_images/$post_image' width='100' height='100'/>
                    
                    <p>$post_content</p>
                
                ";
            }


        ?>

    </div>

    <div class="sidebar">
        Something goes here

    </div>

    <div class="footer_area">
        This is footer
    </div>

</div>



</body>
</html>
