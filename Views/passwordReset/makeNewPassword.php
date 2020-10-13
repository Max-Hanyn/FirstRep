<?php
include "./Views/layouts/header.php";
?>

<div class="container">

    <form action="" method="post">

        <div class="form-group">

            <label for="newPassword">New password</label>

            <input name="newPassword"  type="password" class="form-control" id="newPassword" aria-describedby="emailHelp">
        </div>

        <div class="form-group">

            <label for="newPasswordConfirm">New password confirm</label>

            <input name="newPasswordConfirm"  type="password" class="form-control" id="newPasswordConfirm" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

    </form>

</div>

