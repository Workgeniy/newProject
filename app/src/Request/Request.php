<?php

namespace Request;

use Exeption;

class Post{
    private Get $get;

    private Post $post;

    private Server $server; 

    public function __construct (Get $get, Post $post, Server $server){

        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }

  
    public function getGet(){
    return $this->$get;}
        
    public function getPost(){
    return $this->$post;}

    public function getServer(){
    return $this->$server;}


}