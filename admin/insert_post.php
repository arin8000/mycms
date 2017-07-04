<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <style type="text/css">
        td, tr {
            padding: 0px;
            margin: 0px;
        }

    </style>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>

</head>

<body>
<form action="insert_post.php" method="post" enctype="multipart/form-data">

    <table width="800px" align="center" border="2">
        <tr bgcolor="#ff8c00">
            <td colspan="6" align="center"><h1>Insert New Post:</h1></td>
        </tr>

        <tr>
            <td align="left"><strong>Post Title:</strong></td>
            <td><input type="text" name="post_title" size="60"></td>
        </tr>

        <tr>
            <td align="left"><strong>Post Category:</strong></td>
            <td>
                <select name="cat">
                    <option value="null">Select a category</option>
                    <?php
                    require 'includes/databse.php';
                    $get_cats = "select * from categories";
                    $run_cats = mysqli_query($link, $get_cats);

                    while ($cats_row = mysqli_fetch_array($run_cats)) {
                        $cat_id = $cats_row['cat_id'];
                        $cat_title = $cats_row['cat_title'];

                        echo "<option value='$cat_id'>$cat_title</option>";
                    }


                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td align="left"><strong>Post Author:</strong></td>
            <td><input type="text" name="post_author" size="60"></td>
        </tr>

        <tr>
            <td align="left"><strong>Post Keywords:</strong></td>
            <td><input type="text" name="post_keywords" size="60"></td>
        </tr>

        <tr>
            <td align="left"><strong>Post Image:</strong></td>
            <td><input type="file" name="post_image" size="60"></td>
        </tr>

        <tr>
            <td align="left"><strong>Post Content:</strong></td>
            <td><textarea name="post_content" rows="15" cols="60"></textarea></td>
        </tr>

        <tr>
            <td colspan="6" align="center"><input type="submit" name="submit" value="Publish Now"></td>
        </tr>

    </table>


</form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $pst = new DateTimeZone('America/Los_Angeles');
    $three_hours_ago = new DateTime('0 hours', $pst);

    $post_title = $_POST['post_title'];
    $post_date = $three_hours_ago->format('Y-m-d H:i:s');

    $post_cat = $_POST['cat'];
    $post_author = $_POST['post_author'];
    $post_keywords = $_POST['post_keywords'];
    $post_images = $_FILES['post_image']['name'];
    $post_image_tmp = $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];

    if ($post_title == '' OR $post_cat == 'null' OR $post_author == 'null' OR $post_keywords = '' OR $post_images == 'null' OR $post_content == 'null') {
        echo "<script>alert('Please fill all the fileds')</script>";
        exit;
    } else {
    }
    move_uploaded_file($post_image_tmp, "news_images/$post_images");

    $insert_posts = "INSERT INTO posts (category_id, post_title, post_date, post_author, post_keywords, post_image, post_content) VALUES ('$post_cat', '$post_title', '$post_date', '$post_author', '$post_keywords', '$post_images', '$post_content')";

    $run_posts = mysqli_query($link, $insert_posts);

    echo "<script>alert('Post has been published!')</script>";
    echo "<script>window.open('insert_post.php','_self')</script>";

}

?>