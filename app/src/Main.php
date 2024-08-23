<?php 
/*class Main {
    public $public = 'var1';
    protected $protected = 'var1';
    private $private = 'var1';

    public static $ps = 'public static';

    public function func(): string{
        return $this -> private;
    }

    public static function statFunc(int &$int): int{
        $int++;
        return $int;
    }
}*/
use Shop\Customer\Order;
use Request\Get;
use Request\Post;
use Request\Server;
use Routing\Route;
//use Controllers\Api\Login;

class Main {

    private Get $get;

    private Post $post;

    private Server $server;

    private Route $route;

    private Request $request;

    public function main(): void{
        $this->init();

        echo 'RUN SUCCESFUL';

        //$order = new Order();

        //print_r($this->get);
        //print_r($this->post);

        $namespace = $this->route->getParent();

        $base = $this->route->getBase();
        if ($base){
            $class = 'Controllers\\'. implode('\\', $namespace). '\\' . $base[0];

            $object = new $class();

            if ($this->server->isGet()){
                echo $object->getRequest($this->get);}
            elseif ($this->server->isPost()){
                echo $object->postRequest($this->post);} 
        }
    }

    private function init(): void{
        spl_autoload_register(function($class){
            $file = __DIR__.'/'.str_replace('\\', '/', $class) . '.php';

            if (file_exists($file)){
                include($file);
                return true;
            }

            return false;
            
        });

        //$this->request = new Request($_GET, $_POST, $_SERVER);

        $this -> get = new Get($_GET);
        $this -> post = new Post($_POST);
        $this->server = new Server($_SERVER);

        $this->route = new Route($_SERVER['REQUEST_URI']);
    }
}