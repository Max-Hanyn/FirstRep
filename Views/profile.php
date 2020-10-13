<?php
session_start();
include "layouts/header.php";
include 'layouts/navigataion.php';
?>
<link rel="stylesheet" href="/Views/styles/profile.css">
<script src="/Views/js/profile.js"></script>
<body>
<br><br><br>

<style>

</style>

<div class="container">

    <div id="massage">

    </div>

    <div id="main">

        <div class="row" id="real-estates-detail">
            <div class="col-lg-4 col-md-4 col-xs-12">
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


                            <img src="<?php echo $path . $avatar['photo_name']; ?>" class="" alt="avatar">
                            <div id="first-second-name"><?= $pageData['first_name'] . " " . $pageData['second_name'] ?></div>

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
            </div>
            <div class="col-lg-8 col-md-8 col-xs-12">
                <div class="panel">
                    <div class="panel-body">
                        <ul id="myTab" class="nav nav-pills">
                            <li class="active"><a href="#detail" data-toggle="tab">Особисті дані </a></li>
                            <li class=""><a href="#contact" data-toggle="tab">Редагувати дані </a></li>
                            <li class=""><a href="logout">Вихід</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <hr>
                            <div class="tab-pane fade active in" id="detail">
                                <h4>История профиля</h4>
                                <table class="table table-th-block">
                                    <tbody id="user-info">
                                    <tr>
                                        <td class="active">Ім'я:</td>
                                        <td id="first-name"><?= $pageData['first_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="active">Фамілія:</td>
                                        <td id="second-name"><?= $pageData['second_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="active">Номер телефону:</td>
                                        <td id="adress"><?= $pageData['adress'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="active">Адрес:</td>
                                        <td id="number"><?= $pageData['number'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact">
                                <h3>Дані профілю</h3>
                                <form role="form" id="changeProfileForm" method="post">
                                    <div class="form-group">
                                        <label>Ім'я</label>
                                        <input type="text" name="first_name" class="form-control rounded"
                                               value="<?= $pageData['first_name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Фамілія</label>
                                        <input type="text" name="second_name" class="form-control rounded"
                                               value="<?= $pageData['second_name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Адрес</label>
                                        <input type="text" name="number" class="form-control rounded"
                                               value="<?= $pageData['number'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Номер</label>
                                        <input type="text" name="adress" class="form-control rounded"
                                               value="<?= $pageData['adress'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" data-original-title="" title="">
                                            Зберегти
                                        </button>
                                    </div>
                                </form>
                                <div>
                                    <h3> Дані акаунту </h3>
                                    <form role="form" id="changeEmailForm" method="post">

                                        <div class="form-group">
                                            <label>Емейл</label>
                                            <input type="email" name="email" class="form-control rounded"
                                                   value="<?= $pageData['email'] ?>">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" data-original-title=""
                                            title="">
                                        Змінити
                                    </button>
                                </div>
                                    </form>
                                    <form role="form" id="changePasswordForm" method="post">

                                        <div class="form-group">
                                            <label>Старий пароль</label>
                                            <input type="password" name="oldPassword" class="form-control rounded"
                                                   value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Новий пароль</label>
                                            <input type="password" name="newPassword" class="form-control rounded"
                                                   value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Новий пароль підтвердження</label>
                                            <input type="password" name="newPasswordConfirm"
                                                   class="form-control rounded"
                                                   value="">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success" data-original-title=""
                                                    title="">
                                                Змінити
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div><!-- /.main -->
</div><!-- /.container -->

</body>
</html>
