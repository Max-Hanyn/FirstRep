<?php
session_start();
include "layouts/header.php";
include 'layouts/navigataion.php';
?>
<p>Before proceeding, please check your email for a verification link
    If you did not receive the email</p>
<form class="d-inline" method="POST" action="verify/resent">

    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
</form>