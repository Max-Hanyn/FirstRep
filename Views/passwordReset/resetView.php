<?php
include "./Views/layouts/header.php";
session_start();
// print_r($_SESSION);
 if (!empty($_SESSION['msg']))
 {
?>
     <div class="alert alert-warning alert-block">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <strong><?=$_SESSION['msg'] ?></strong>
     </div>


<?php }
$_SESSION['msg']= '';
 ?>

<div class="container">

    <form action="/reset/send" method="post">

        <div class="form-group">

            <label for="email">Email address</label>

            <input name="email"  type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

    </form>

</div>

