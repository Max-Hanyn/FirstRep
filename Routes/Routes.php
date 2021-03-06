<?php

Route::set('profile/logout', 'ProfileController.logout', RolesModel::ROLE_USER_ID);
Route::set('/', 'HomeController.index');
Route::set('profile/:id', 'ProfileController.index', RolesModel::ROLE_USER_ID);
Route::set('verify', 'VerifyController.index');
Route::set('users', 'UserListController.index',RolesModel::ROLE_USER_ID);

Route::set('verify/resent', 'VerifyController.resent');
Route::set('verify/:token', 'VerifyController.verify');
Route::set('profile/:id/skills', 'ProfileController.skills', RolesModel::ROLE_USER_ID);
Route::set('profile/:id/skills/add', 'ProfileController.add', RolesModel::ROLE_USER_ID);
Route::set('profile/rere/rere/:id', 'ProfileController.index', RolesModel::ROLE_USER_ID);
Route::set('admin', 'AdminController.index', RolesModel::ROLE_ADMIN_ID);
Route::set('admin/get', 'AdminController.get', RolesModel::ROLE_ADMIN_ID);
Route::set('admin/search', 'AdminController.search', RolesModel::ROLE_ADMIN_ID);
Route::set('admin/edit/:id', 'AdminController.edit', RolesModel::ROLE_ADMIN_ID);
Route::set('admin/changerole', 'AdminController.changeRole', RolesModel::ROLE_ADMIN_ID);
Route::set('profile/:id/skills/add', 'UserSkillsController.add', RolesModel::ROLE_USER_ID);
Route::set('profile/:id/skills/edit', 'UserSkillsController.edit', RolesModel::ROLE_USER_ID);
Route::set('profile/:id/skills/delete', 'UserSkillsController.delete', RolesModel::ROLE_USER_ID);
Route::set('login', 'LoginController.login');
Route::set('forbidden', 'ForbiddenController.index');

Route::set('register', 'RegisterController.registration');

Route::check();