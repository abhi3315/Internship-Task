<?php
if (isset($_POST["submit"])) {
    if (file_exists('login_data.json')) {
        $login_data = file_get_contents('login_data.json');
        $login = json_decode($login_data);
        if ($login[0]->username == $_POST["username"] && $login[0]->password == $_POST["password"]) {
            echo "<script type='text/javascript'> document.location ='home.php'; </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 150px auto;
            width: 500px;
            height: auto;
            text-align: center;
        }

        .loginbox {
            margin: 50px auto 10px auto;
            width: 250px;
            height: auto;
            border: 1px solid rgb(216, 208, 208);
            border-radius: 5px;
            text-align: left;
            padding: 0 50px;
        }

        .loginbox h5 {
            margin: 40px 0;
        }

        .loginbox label {
            color: rgb(109, 109, 109);
        }

        .loginbox input {
            margin: 10px 0;
            border: 1px solid rgb(216, 208, 208);
            width: 100%;
            height: 30px;
            border-radius: 5px;
        }

        .loginbox input[type="submit"] {
            border: rgb(1, 156, 1);
            background-color: rgb(1, 156, 1);
            cursor: pointer;
            margin: 30px 0;
            color: white;
        }

        .icon {
            width: 25px;
            height: auto;
            margin: 5px;
        }

        .login-with {
            text-align: center;
            margin-bottom: 30px;
        }

        a{
            color: blue;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Advanced Security</h2>
        <div class="loginbox">
            <h5>LOGIN</h5>
            <form action="" method="POST">
                <label>Username</label><br>
                <input type="text" name="username"><br>
                <label>Password</label><br>
                <input type="password" name="password">
                <label><a style="text-decoration: none" href="#">Forgot Password</a>?</label>
                <input type="submit" name="submit" value="LOGIN">
            </form>
            <div class="login-with">
                <label>or connect with</label><br>
                <img class="icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAAB6CAMAAABHh7fWAAAAYFBMVEU6VZ////83U540UZ1fc60tTJsjRpiMmcLu7/VCW6IyT53p6/Pf4u0aQJapstAqSpqgqsuCkL1zg7bCyN3R1eXW2ui4v9hKYqVTaan3+Puvt9MJOZObpclnerHHzeB7irkwPJhlAAABe0lEQVRoge3Y226DMBBFUWoXAyaOubaQNO3//2UfC8RgNJoBVTn7GWkFROwxSYIQQgihF00tOga13qf2KXFcWWeaW9tdlnVGGPYm69+C5U5U9rYKu+K0qfNVWZRW+mMdFqV1ctmSBWmVlpuyIO0ishxt2ogsRvssJkvR+nM8izabfytJWg/xmxaizTUuS9Eb66csrZsdsgydrm9Xk0YJ2nUr99ndrn9VXoC+h9/vqnBmkoScmKDcuAMmQRWSa+FRbJ3uRZ7vLvrrPPqhT6PfQYMGDRr0fvlAWtl0mvcBejDpIsti19m8AF1lyx4cQ0uxZ+x+/jEpBx07SgerOZ44jWZ58Wg0y3xKonkOHyS6vJ9Gf7PM5ST6yjIdk+iMZTUj0T8sizqFHnn2ExLNAdNops8ZFLo/j255jtsUmulLCoVm2TJpdMMzqxV9Pi9ALa4omcZE5c28AD24+SVCX5Ne8ggAGjRo0KBBgwYNGjRo0KBBgwYNGjRo0P+Z/gV/YBv5jxSpaQAAAABJRU5ErkJggg==" class="icon">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIkAAACJCAMAAAAv+uv7AAAAS1BMVEVQq/H///9KqfFEp/A7pPDy+P7o8/3O5frW6fuBv/T6/P9zufOFwfSz1/j2+v5ls/Lg7vzE4Pm72/lcsPKn0feUyPWdzPaNxPV4vPO1Q8ngAAAD+klEQVR4nO2a2bKjOgxFQbIxs5nh/7/0miT0ScIkGdOn+pbXUx4SakezLYLA4/F4PB6Px+PxeDye/wlg+G0NAaDANssy3ZoPv6kD9BBHskzTUkaqb3FDzN/Qh6KPww/UKL7cBKLXtwuBUYYrouTNBiDaoYyYTw24IYeBWuuYqZfoRWwbo7VguQd02vKkiKncFmLMotEEkICX63jPxTjkGVH06Z6QMJSJ0Ll6faFjKYHM/KQSDOX5vg5Dqf5EUMVLHVE/Ap9cnh7KSUim0/H5F2KylIgoJNU8k8CULqYkSRENVciEjyrckpV0y08jyn8ATXWNRiNDDxE5kfHnP8rp/EewU0i+qUxBybqqNF4nCgnw/dHDWQpRTRIPTfyIP0mvmvjRPdRJzyJHyQup6enzqSSMjj0E1MR5kTHSB78dX29190VIdlBd1/DyGFf2LgfYewAOHCGkZHx7eLfxiGyntrDCJGKWWEi2nqKm76nnqYSYw49HsMdb3Bh5DHG+4SNRkYUU/Dn72QE3qHr4dhJdiWI094Wj3trk+OElEe9/97qS4wIum0TjH9Ps2s+RkpOBQ6pOC2HkQIDFrUpIuVk1Q64DMd6rhDr8mAMWudg3dkpws6Zcgne8eDJHI/aulQwWSpJ5EOB2+1N6vhKsog4EupYy8m8yHvNJ1U0tOUEppJOFklexkvSWQkBa3BHQixWHyOKayX3azNg1QNZASKSzuUwS2/PJNTKbS8A7AqUkH0HfoZ/96dAPfp9GYQynRGy6TsA4dNOxCpPghqYTWg4nc+9xK8RyOAlm/7jN5MT+Ih+dhgrzOvhbikMHWRXYHykB+QBxCvM8vELkjsxSX15gICSxi25oW0wWABDnu8LLhuFcd28Kmbo+T8a+a5j3Vyss5sZPJa76oLocJUC+BjiGcdm4w8mGgkpxMUpmGPdF+8jrOuaYdaDE4ui3gdi4hWRSO/DNzOXhLWWvNncAuBgqo7NFNVB3Jtu4yJsfKRc6cux2dS+2duMkJG17RwexsOo8nE0OFdH2FpFL2NxZAALGolYcP90jZMbMKiN9bErd5e8KWG+gDshvEwIiYbim5Gz7eDpQc8pKdJcQEAHrRqW66WUkwIx3Xi8213SXVaApJbw9bOLKILCAQoisU8zzztnKnU7WT9nMlA8NzxgzMnfnmbZLw1LK3fefDmlal6GKvDx5Q2mH08hTS1tbzAHx3pb9EkIX3EBNDt6CuAKs32E8ICraO0rIAoIuIoJlonoK7vDLOyAwG44tExV5cKc53sSY8qa7ulpHcFqpYkJxtzW+1GDQ6mnsmlqpOI5V0/VJps3k9CsvBT+L/4vHGt/j8Xg8Ho/H4/F4PP8W/wG+OywmYIX6rwAAAABJRU5ErkJggg==" class="icon">
            </div>
        </div>
        <p>Don`t have an account? <a>Sign up</a></p>
    </div>
</body>

</html>