<?php


namespace App\Services;


class Router
{
    private static $list=[];

    public static function get($url,$page_name){
        self::$list[] = [
          'url' => $url ,
          'page_name' => $page_name ,
          'get' => true
        ];
    }

    public static function post($url,$class,$method,$request = false){
        self::$list[] = [
            'url' => $url ,
            'class' => $class ,
            'method' => $method,
            'post' => true,
            'request' => $request
        ];
    }

    public static function run(){
        $query = $_GET['q'];

        foreach (self::$list as $route){
            if($route['url'] === '/'.$query){
                if($route['post'] && $_SERVER['REQUEST_METHOD'] === 'POST'){
                    $action = new $route['class'];
                    $method = $route['method'];
                    if($route['request']){
                        $action->$method($_POST);
                    }else{
                        $action->$method();
                    }
                }elseif ($route['get']){
                    require_once 'views/'.$route['page_name'].'.php';
                    die();
                }

            }
        }
    }
}