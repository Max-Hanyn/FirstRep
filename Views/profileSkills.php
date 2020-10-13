<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Table with Add and Delete Row Feature</title>
    <link rel="stylesheet" href="/Views/styles/profile.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
<?php include "layouts/navigataion.php"?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Profile
                    <?php
                    if(AuthService::currentUser($id) || Roles::checkRole(RolesModel::ROLE_MODERATOR_ID)){

                    ?>
                    <button type="button" class="add-button btn btn-primary" data-toggle="modal" data-target="#profileModal">Add new skill</button>
                        <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <table class="table" id="profileTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Language</th>
                            <?php
                            if(AuthService::currentUser($id) || Roles::checkRole(RolesModel::ROLE_MODERATOR_ID)){

                            ?>
                            <th>Actions</th>
                                <?php
                            }
                            ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($skills as $skill){
                        ?>
                        <tr id="skill<?=$skill['id']?>">
                            <td><?=$skill['name']?></td>
                            <td><?=$skill['level']?></td>
                            <td><?=$skill['language']?></td>
                            <?php
                            if(AuthService::currentUser($id) || Roles::checkRole(RolesModel::ROLE_MODERATOR_ID)){

                            ?>
                            <td>
                                <div>
                                <button type="button" class="edit btn btn-info" data-toggle="modal" value="<?=$skill['id'] ?>" ><i class="material-icons">&#xE254;</i></button>
                                <button type="button" class="delete btn btn-danger" data-toggle="modal" value="<?=$skill['id'] ?>" ><i class="material-icons">&#xE872;</i></button>


                                </div></td>
                            <?php
                            }
                            ?>

                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="profileForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="text" name="level" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="language">Language</label>
                        <input type="text" name="language" class="form-control">
                    </div>

                    <button type="submit" name="submit" class="btn btn-success">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="profileEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="profileEditForm">

                        <input id="hiddenId" type="hidden" name="id" class="form-control">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input  type="text" name="name" class="name1 form-control">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="text"  name="level" class="level1 form-control">
                    </div>
                    <div class="form-group">
                        <label for="language">Language</label>
                        <input type="text"   name="language" class="language1 form-control">
                    </div>

                    <button type="submit" name="submit" class="btn btn-success">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="/Views/js/skills.js"></script>

</body>
</html>