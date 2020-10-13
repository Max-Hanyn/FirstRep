<?php
include "layouts/header.php";
include "layouts/navigataion.php";

?>
<head>
    <link rel="stylesheet" href="/Views/styles/adminPage.css">
</head>
<script src="/Views/js/adminPage.js"> </script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="search">
                        <label for="search">Search</label>
                        <input type="text"  id="search">
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Image</th>
                            <th scope="col">email</th>
                            <th scope="col">verification</th>
                            <th scope="col">role</th>
                        </tr>
                        </thead>

                        <tbody>



                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>