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
use Request\Request;
use Request\Server;
use Routing\Route;
use Loading\Autoload;

class Main {

    private Get $get;

    private Post $post;

    private Server $server;

    private Route $route;

    private Request $request;

    public function main(): void{
        $this->init();

        echo 'RUN SUCCESFUL';

        $namespace = $this->route->getParent();

        $base = $this->route->getBase();
        if ($base){
            $class = 'Controllers\\'. implode('\\', $namespace). '\\' . $base[0];

            for ($i=0; $i < strlen($class) - 1; $i++) 
            { 
                if ($class [$i] == null){
                    break;
                }
                if ($class[strlen($class) -1] == '-' || $class[strlen($class) -1 ] == '_')
                {
                    $class = mb_strimwidth ($class, 0, strlen($class)-1, "");
                }
                if ($class[$i] == '-' || $class[$i] == '_')
                {
                   for ($j=$i; $j < strlen($class); $j++) 
                   { 
                    if ($j == strlen($class) - 1)
                    {
                        $class = mb_strimwidth ($class, 0, strlen($class) - 1, "");
                        break;
                    }
                    $class[$j] = $class[$j+1];
                    }

                    $class[$i] = strtoupper($class[$i]);
                }
               if ($class[$i] == '\\' && ctype_lower($class[$i+1]))
               {
                $class[$i+1] = strtoupper($class[$i+1]); 
               
               }
            }

            print_r($class);

            $object = new $class();

            if ($this->server->isGet())
            {
                echo $object->getRequest($this->get);
            }
            elseif ($this->server->isPost())
            {
                print_r($object);
                echo $object->postRequest($this->post);
            } 
        }
    }
    

    private function init(): void{

    include ('../src/Loading/Autoload.php');
    Autoload::registrate();

        $this->request = new Request(
            $this->get = new Get($_GET),
            $this->post = new Post($_POST),
            $this->server = new Server($_SERVER));

        $this->route = new Route($_SERVER['REQUEST_URI']);
    }
}
