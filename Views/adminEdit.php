<?php
include "layouts/header.php";
include "layouts/navigataion.php";

?>
<?php if ($massage['edited'])
{

?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Edited</strong>
    </div>
<?php
}
?>
<link rel="stylesheet" href="/Views/styles/adminEdit.css">
<script src="/Views/js/adminEdit.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <header class="panel-title">
                        <div class="text-center">
                            <strong>Коричстувач сайта</strong>
                        </div>
                    </header>
                </div>
                <div class="panel-body">
                    <div class="text-center" id="author">


                        <img src="<?php echo  $path. $avatar['photo_name']; ?>" class="" alt="avatar">


                    </div>
                </div>
                <div class="panel-footer">
                    <form id="photoAddForm" method="post" enctype="multipart/form-data">

                        <input type="file" id="file" name="file" class="input-file">
                        <label for="file">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                            </svg>
                            <span>Choose a file…</span></label>
                        <button type="submit" name="submit" class="btn btn-primary add-button but">Upload</button>
                    </form>
                </div>
            </div>
<form action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">First name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name = "first_name" aria-describedby="emailHelp" value="<?=$user['first_name'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Second name</label>
        <input type="text" class="form-control" id="exampleInputEmail1"  name = "second_name" aria-describedby="emailHelp" value="<?=$user['second_name'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input type="text" class="form-control" id="exampleInputEmail1"  name ="adress" aria-describedby="emailHelp" value="<?=$user['adress'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Number</label>
        <input type="text" class="form-control" id="exampleInputEmail1"  name ="number" aria-describedby="emailHelp" value="<?=$user['number'] ?>">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    <div class="btn"><a href="/admin" class="btn btn-primary"> Back</a></div>
</form>


        </div>
    </div>
</div>
