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
                require 'includes/databse.php';
                $get_cats = "select * from categories";
                $run_cats = mysqli_query($link, $get_cats);

                while ($cats_row = mysqli_fetch_array($run_cats)) {
                    $cat_id = $cats_row['cat_id'];
                    $cat_title = $cats_row['cat_title'];

                    echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
                }



            ?>
        </ul>
    </div>

    <div class="post_area">
        Something goes here

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
