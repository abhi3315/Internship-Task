<?php
if (isset($_POST["update"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $user[0]['username'] = "abhishek";
    $user[0]['password'] = "12345678";
    $user[0]['fname'] = $fname;
    $user[0]['lname'] = $lname;
    $user[0]['address'] = $address;
    $user[0]['phone'] = $phone;
    $newdata = json_encode($user);
    file_put_contents('login_data.json', $newdata);
    $msg="Details updated successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
                <li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                <li><a class="active" href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
                <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i>Users</a></li>
                <li><a href="#"><i class="fa fa-user-secret" aria-hidden="true"></i>User Roles</a></li>
            </ul>
        </nav>

        <article>
            <div class="msg">
                <p><span style="font-weight: bold">Note!</span> Administrator password can not be changed in demo mode.</p>
            </div>
            <div class="form">
                <div class="info">
                    <p>Your Details</p>
                </div>
                <form method="POST">
                    <?php
                    $user_data = file_get_contents('login_data.json');
                    $user = json_decode($user_data);
                    $fname = $user[0]->fname;
                    $lname = $user[0]->lname;
                    $address = $user[0]->address;
                    $phone = $user[0]->phone;
                    if(isset($msg)){
                    ?>
                    <div class="success"><p><?php echo $msg; ?></p></div>
                    <?php } ?>
                    <label>First Name</label><br>
                    <input type="text" name="fname" value="<?= $fname ?>" id=""><br>
                    <label>Last Name</label><br>
                    <input type="text" name="lname" value="<?= $lname ?>" id=""><br>
                    <label>Address</label><br>
                    <input type="text" name="address" value="<?= $address ?>" id=""><br>
                    <label>Phone</label><br>
                    <input type="text" name="phone" value="<?= $phone ?>" id=""><br>
                    <input type="submit" name="update" value="Update">
                </form>
            </div>
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