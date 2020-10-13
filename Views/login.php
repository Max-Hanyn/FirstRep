<?php
session_start();

include "Views/layouts/header.php";
?>

<body>

<div class="container">
    <?php
    if($_SESSION['registersuccessful']){
        ?>
        <p class = "form-text text-success"> Register competed successful </p>
        <?php
        $_SESSION['registersuccessful'] = false;
    }
    ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email"  type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <small class="form-text text-muted">Please, input your email!</small>
            <?php
            if($_SESSION['wrongData']){
                ?>
                <small class = "form-text text-danger"> Your email is invalid!</small>
                <?php
            }

            ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password"  type="password" class="form-control" id="password">
            <?php
            if($_SESSION['wrongData']){                    ?>
                <small class = "form-text text-danger"> Your password is invalid!</small>
                <?php
                $_SESSION['wrongData'] = false;
            }
            ?>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <a style="text-decoration: none;" href="register">Registration</a>
        <a style="text-decoration: none;" href="/reset">Forgot Password</a>
    </form>
</div>

</body>
</html>

