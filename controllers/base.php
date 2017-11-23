<?php
/**
 * Created by PhpStorm.
 * User: v_ransu
 * Date: 2017/11/3
 * Time: 15:06
 */
namespace  base\controllers;

class base
{

    public $modules;

    public $controllers;

    public $actions;

    public $defaultAction = 'index';

    public $defaultRoute = 'default';

    public $controllerMap = [];

    public $id;

    public $controllerNamespace;

    public function actions()
    {
        return [];
    }

    /**
     * filter
     * 请求数据过滤
     * @access public
     * @param $data 需要过滤的数据
     */
    public static function filter($data)
    {
        $data = is_array($data) ? array_map(array(__CLASS__, 'filter'), $data) : addslashes($data);
        return $data;
    }

    /**
     * autoload
     * 类自动加载
     * @access public
     * @param $class 类名
     */
    /*
    public static function autoload($class){
        $file = __ROOT__.'/controllers/'.$class.'.inc.php';
        echo 'goooo';
        var_dump($file);
        if (is_file($file)){
            include_once $file;
        }
    }
*/



    /* 路径映射 */
    public  static $vendorMap = array(
        'app' => __ROOT__ . DIRECTORY_SEPARATOR . 'modules',
        'base' => __ROOT__,
    );

    /**
     * 自动加载器
     */
    public static function autoload($class)
    {
        $file = self::findFile($class);
        if (file_exists($file)) {
            self::includeFile($file);
        }
    }

    /**
     * 解析文件路径
     */
    private static function findFile($class)
    {
        $vendor = substr($class, 0, strpos($class, '\\')); // 顶级命名空间
        $vendorDir = self::$vendorMap[$vendor]; // 文件基目录
        $filePath = substr($class, strlen($vendor)) . '.php'; // 文件相对路径
        return strtr($vendorDir . $filePath, '\\', DIRECTORY_SEPARATOR); // 文件标准路径
    }

    /**
     * 引入文件
     */
    private static function includeFile($file)
    {
        if (is_file($file)) {
            include $file;
        }
    }

    /**
     * route
     * 初始化路由
     * @access public
     */
    /*
    public static function route()
    {
        $route = isset($_GET['act']) ? $_GET['act'] : 'index';
        $file = __ROOT__ . '/modules/' . $route . '.php';
        if (file_exists($file)) {
            return array(
                'act' => $route,
                'route' => $file
            );
        } else {
            return false;
        }
    }
*/

    public static function route()
    {
        $route = isset($_GET['act']) ? $_GET['act'] : 'index';
        return array(
            'act' => $route,
        );
    }


/*    public function run($route)
    {
        $this->preparePattern($route);
        $this->createAction();
    }*/

    /*根据路由来解析，route的格式为module/controller/act */
    public function run($route, &$action)
    {
        $action = '';
        $controllerNamespace = '';

        if (strpos($route, '/') !== false) {
            list($module, $controller, $action) = explode('/', $route, 3);
            $controllerNamespace = 'app'.'\\'.$module.'\\'.'controllers'.'\\'.$controller;
        }

        return $controllerNamespace;
    }

/*  验证OK
    public function preparePattern()
    {
        $route = isset($_GET['act']) ? $_GET['act'] : 'index';
        if (($pos = strpos($route, '/')) !== false) {//找到第一个/的位置
        //echo ' pos: ' . $pos;
            $this->modules = substr($route, 0, $pos);
        //echo ' modules: ' . $modules;
            if (($pos2 = strpos($route, '/', $pos + 1)) !== false) { //strpos返回的是位于整个字符串的位置，从0开始
                //echo ' pos2: ' . $pos2;
                $this->controllers = substr($route, $pos + 1, $pos2 - $pos - 1);
                //echo ' controllers: ' . $controllers;
                $this->actions = substr($route, $pos2 + 1);
                // echo ' actions: ' . $actions;
            } else {

            }
        }
    }
*/


    public function preparePattern($route)
    {
        if ($route === '') {
            $route = $this->defaultRoute;
        }

        // double slashes or leading/ending slashes may cause substr problem
        $route = trim($route, '/');
        if (strpos($route, '//') !== false) {
            return false;
        }

        if (strpos($route, '/') !== false) {
            list ($this->modules, $this->controllers, $this->actions) = explode('/', $route, 3);
        } else {
            return false;
        }
        return false;
    }



    public function createAction()
    {
        if (preg_match('%^[a-z][a-z0-9\\-_]*$%', $this->controllers)) {
            $methodName = $this->actions;
            if (method_exists($this, $methodName)) {
                $method = new self::$vendorMap['app'] . '\\' . $this->modules . '\\' . $this->controllers;
                return $method->$this->actions;
            }
            return null;
        }
        return null;
    }

/*获取当前的控制器命名空间*/
    public function contrlNamespace()
    {
        if ($this->controllerNamespace === null) {
            $class = get_class($this);
            if (($pos = strrpos($class, '\\')) !== false) {
                $this->controllerNamespace = substr($class, 0, $pos) . '\\controllers';
            }
        }
    }

    public function getControllerPath()
    {
        return str_replace('\\', '/', $this->controllerNamespace);
    }


}

