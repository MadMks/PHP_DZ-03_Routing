<?php

class Router {
    function __construct()
    {
       $routes = include "routes.php";
       $uri = $_SERVER['REQUEST_URI'];

        foreach ($routes as $pattern => $route){
echo($pattern . ' => ' . $route . '<br>');
echo($uri);
            if(preg_match("~^$pattern$~", $uri)){
                $intRoutes = preg_replace("~$pattern~", $route, $uri, 1);
                $segments = explode('|', $intRoutes);
                // $controller = array_shift($segments);
                // $action = array_shift($segments);
echo('<br> >>> ');                
print_r($segments);
                // $params = [];
                // foreach ($segments as $segment) {
                //     $kv = explode('=', $segment);
                //     if(isset($kv[1])){
                //         $params[$kv[0]] = $kv[1];
                //     } else {
                //         $params[] = $kv[0];
                //     }
                // }

                // $controller = ucfirst($controller) . 'Controller';
                // $action = ucfirst($action);

                // echo 'Controller: '. $controller . '<br>';
                // echo 'Action: '. $action . '<br>';
                // echo 'Params: '; var_dump($params);

                return ;
            }
        }
    }
}