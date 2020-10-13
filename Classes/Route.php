<?php
session_start();

class Route
{
    public static $configurations = [];

    public static $routes = [];

    /**
     * @param string $routeToChange
     * @return array|bool
     * check if route have parameters, if true return array with this route and list of his parameters,
     * else return false
     */
    private static function checkParams(string $routeToChange)
    {
        self::$configurations = parse_ini_file("./config/routes.ini");
        $parameters = [];
        if (preg_match('/:.+/', $routeToChange)) {

            $routeAndParams = explode('/', $routeToChange);

            for ($i = 0; $i < count($routeAndParams); $i++) {

                foreach (self::$configurations as $param) {

                    $key = ':' . array_search($param, self::$configurations);
                    $routeAndParams[$i] = str_replace("$key", $param, $routeAndParams[$i], $count);
                    if ($count > 0) {
                        array_push($parameters, $i);
                    }
                }
            }
            $route = implode('/', $routeAndParams);
            $routeWithParams = [];
            array_push($routeWithParams, $route, $parameters);
            return $routeWithParams;

        }
        return false;
    }

    /**
     * @param string $routeToAdd
     * @param string $controller
     * @param int $roleId
     * add route to list of routes with controller, action, and necessary parameters
     */
    public static function set(string $routeToAdd, string $controller, int $roleId = RolesModel::ROLE_GUEST_ID)
    {

        $routeAndParams = self::checkParams($routeToAdd);
        $action = explode('.', $controller);
        if (!$routeAndParams) {
            $route = [
                $routeToAdd =>
                    [
                        'controller' => $action[0],
                        'action' => $action[1],
                        'roleId' => $roleId,
                        'params' => []
                    ]
            ];
            self::$routes[] = $route;
        } else {

            $route = [
                $routeAndParams[0] =>
                    [
                        'controller' => $action[0],
                        'action' => $action[1],
                        'roleId' => $roleId,
                        'params' => $routeAndParams[1]
                    ]
            ];
            self::$routes[$routeToAdd] = $route;
        }


    }

    /**
     * check if current url address is in list of routes if true redirect to this url, else redirect to error page
     */
    public static function check()
    {

        foreach (self::$routes as $route) {
            $key = key($route);

            if (preg_match("#\A$key\z#", $_GET['url'])) {


                if (Roles::checkRole($route[$key]['roleId']) || $_SESSION['user']['roleId'] == RolesModel::ROLE_ADMIN_ID) {

                    $params = self::parseUrl($route[$key]['params']);
                    $controller = new $route[$key]['controller'];
                    $action = $route[$key]['action'];
                    $controller->$action($params[0], $params[1]);
                    return;
                }
            }
        }
        
        self::redirect('forbidden');
    }

    /**
     * @param array $params
     * @return array
     * get from url address necessary parameters
     */
    public static function parseUrl(array $params)
    {
        $url = explode('/', $_GET['url']);
        $parameters = [];
        foreach ($params as $param) {
            $parameters[] = $url[$param];
        }
        return $parameters;
    }

    /**
     * @param string $path
     * redirect user to specified url
     */
    public static function redirect(string $path)
    {
        header("Location:/$path");
        exit();
    }
}