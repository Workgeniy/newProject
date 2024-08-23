<?php

namespace Routing;

class Route{
    private string $requestUri = '/';

    private array $patUri;

    public function __construct(string $requestUri){

        if (preg_match('/^\/(?<request>[0-9a-zA-Z_\/-]*[0-9a-zA-Z_-]+)/'
        , $requestUri, 
        $match))
        {
        $this->requestUri = $match['request'];
        }
        else{
            $this->requestUri = '/';
        }

        $this -> patUri = explode('/', $this -> requestUri);

        $this -> patUri = array_filter($this -> patUri, fn($item)=> !empty($item));

        

        //echo ($this->requestUri);
        //die();

        /*echo PHP_EOL . "Route construct". PHP_EOL;
        echo $requestUri;
        exit;
        $this->requestUri = $requestUri;*/

        
    }

    public function getParent(): array{
        return array_slice($this -> patUri, 0, -1);
    }


    public function GetBase(): array{
        return array_slice($this -> patUri, -1);
    }
}