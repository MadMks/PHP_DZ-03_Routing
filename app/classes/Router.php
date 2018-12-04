<?php

    class Router{

        private $routes;

        public function __construct()
        {
            $routesPath = 'app/config/routes.php';
            $this->routes = include($routesPath);

            $this->run();
        }

        public function run()
        {
            $uri = $this->getURI();
//            echo "uri = $uri<br>";
            // Проверим наличие такого запроса в routes.php
            foreach ($this->routes as $pattern => $route){
//echo "pattern = $pattern <br>";

                if (preg_match("~$pattern~", $uri)){
                    $intRoutes = preg_replace("~$pattern~", $route, $uri, 1);
//                    print_r($intRoutes);
                    $segments = explode('|', $intRoutes);
                    print_r($segments);
                }
            }
        }

        private function getURI()
        {
            if (!empty($_SERVER['REQUEST_URI'])){
                return trim($_SERVER['REQUEST_URI'], '/');
            }
        }
    }