CREATE TABLE `users_info`.`password_reset` ( `email` VARCHAR(255) NOT NULL , `token` VARCHAR(255) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB;
