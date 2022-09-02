<?php



class Route{

private $validRoutes = array();


public function register(String $requestMethod,String $routes,callable|array $action): self
{

    $this->validRoutes[$requestMethod][$routes]=$action;
  return $this;
}


public function get(String $routes,callable|array $action): self
{

     return $this->register('GET',$routes,$action);
}

public function post(String $routes,callable|array $action): self
{

     return $this->register('POST',$routes,$action);
}

public function routes(): array
{
  return $this->validRoutes;
}

public function resolve(String $requestUri,String $requestMethod){
  $routes = explode('?',$requestUri)[0];////invoice
  $action = $this->validRoutes[$requestMethod][$routes]?? null;

  if(!$action){
     throw new RouteNotFoundException();//\Exception(, 1);
     
  }
//if function passed
  if(is_callable($action)){
    return call_user_func($action);
  }
  
//if classed passed
  if(is_array($action)){
   
    [$class,$method,$array_data]=$action;

    if(class_exists($class)){
        $class=new $class();
        if(method_exists($class,$method)){
          return call_user_func_array([$class,$method],[$array_data]);
        }
    }

  }
  throw new RouteNotFoundException();


}
   

       

}

?> 