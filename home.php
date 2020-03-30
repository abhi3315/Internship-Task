<?php
if (isset($_POST["comment"])) {
    if (file_exists('comment.json')) {
        $current_data = file_get_contents('comment.json');
        $array_data = json_decode($current_data);
        $extra = array(
            'comment' => $_POST['comment_text'],
            'user' => 'admin',
            'time' => date("Y-m-d h:i:s"),
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        if (file_put_contents('comment.json', $final_data)) {
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="navbar">
        <h3>Advanced Security</h3>
        <ul>
            <li onclick="myfunc()">Welcome, admin &#9660;</li>
        </ul>
    </div>
    <div class="dropdown" id="drop">
        <ul>
            <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
            <li><a href="index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
        </ul>
    </div>
    <section>
        <nav>
            <ul>
                <li><a class="active" href="home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
                <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i>Users</a></li>
                <li><a href="#"><i class="fa fa-user-secret" aria-hidden="true"></i>User Roles</a></li>
            </ul>
        </nav>

        <article>
            <?php
            if (file_exists('comment.json')) {
                $comment_data = file_get_contents('comment.json');
                $comments = json_decode($comment_data);
                $comments = array_reverse($comments);
            }
            ?>
            <h1>Comment Wall</h1><label>last <?php echo count($comments); ?> posts</label>
            <?php
            foreach ($comments as $comment) {

            ?>
                <div class="comment">
                    <p><?php echo $comment->comment; ?></p>
                    <h5>&mdash; <?php echo $comment->user; ?></h5><label style="font-size: 12px"><i>at <?php echo $comment->time; ?></i></label>
                </div>
            <?php
            }
            ?>
            <h3>Leave Comment</h3>
            <form action="" method="POST">
                <textarea cols="30" name="comment_text" rows="5"></textarea>
                <button name="comment"><i class="fa fa-comment-o" aria-hidden="true"></i>Comment</button>
            </form>
        </article>
    </section>

    <footer>
        <p>Copyright © Abhishek</p>
    </footer>
    <script src="https://use.fontawesome.com/ecdd4f2c7c.js"></script>
    <script>
        function myfunc() {
            if (document.getElementById("drop").style.display == "none") {
                document.getElementById("drop").style.display = "flex"
            } else {
                document.getElementById("drop").style.display = "none"
            }
        }
    </script>
</body>

</html>