<?php

class Route {
   public string $url;
   public mixed $classname;
   public string $method;
   public array $request_method;
  public function __construct(string $url,mixed $classname,string $method,array $request_method ) {
    $this->url = $url;
    $this->classname = $classname;
    $this->method = $method;
    $this->request_method = $request_method;
  }

  /**
   * @return string
   */
  public function getUrl(): string {
    return $this->url;
  }

  /**
   * @return
   */
  public function getClassname(){
    return $this->classname;
  }

  /**
   * @return string
   */
  public function getMethod(): string {
    return $this->method;
  }

    /**
     * Get the value of method
     */ 
    public function getRequest_Method()
    {
        return $this->request_method;
    }
}