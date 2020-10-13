<?php


class Roles
{
    /**
     * @param int $roleId
     * @return array
     * function return array with current role permissions
     */
    private static function getRole(int $roleId)
    {
        $roles = [
            RolesModel::ROLE_GUEST_ID => [RolesModel::ROLE_GUEST_ID],
            RolesModel::ROLE_ADMIN_ID => [RolesModel::ROLE_ADMIN_ID, RolesModel::ROLE_USER_ID, RolesModel::ROLE_GUEST_ID,RolesModel::ROLE_MODERATOR_ID],
            RolesModel::ROLE_USER_ID => [RolesModel::ROLE_USER_ID, RolesModel::ROLE_GUEST_ID],
            RolesModel::ROLE_MODERATOR_ID => [RolesModel::ROLE_MODERATOR_ID, RolesModel::ROLE_USER_ID, RolesModel::ROLE_GUEST_ID],
        ];
        return $roles[$roleId];
    }

    /**
     * @param int $role
     * @return bool
     * return true if current auth user has necessary role
     */
    static public function checkRole(int $role)
    {
        $roles = self::getRole($_SESSION['user']['roleId']);

        return in_array($role, $roles);

    }

}