<?php
session_start();
include "Views/layouts/header.php";
?>
<body>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="firstName">First name</label>
            <input name="firstName"  type="text" class="form-control" id="firstName">
            <?php
            if($_SESSION['incorrectData']){
                ?>
                <small class = "form-text text-danger"> Name must consist only letters!</small>
                <?php

            }
            ?>
        </div>
        <div class="form-group">
            <label for="secondName">Second name</label>
            <input name="secondName"  type="text" class="form-control" id="secondName">
            <?php
            if($_SESSION['incorrectData']){
                ?>
                <small class = "form-text text-danger"> Second name must consist only letters!</small>
                <?php

            }
            ?>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email"  type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <small class="form-text text-muted">Please, input your email!</small>
            <?php
            if($_SESSION['emailExists']){
                ?>
                <small class = "form-text text-danger"> Email already exists!</small>
                <?php

            }
            $_SESSION=[];
            ?>
                   </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password"  type="password" class="form-control" id="password">
                  </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <a style="text-decoration: none;" href="login">Login</a>
    </form>
</div>

</body>
</html>
