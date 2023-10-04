<?php

class Route {

  public function __construct(
    public string $path,
    public $controller,
    public string $action,
    public array $method
  ) {
  }

  /**
   * @return string
   */
  public function getPath(): string {
    return $this->path;
  }

  /**
   * @return
   */
  public function getController(){
    return $this->controller;
  }

  /**
   * @return string
   */
  public function getAction(): string {
    return $this->action;
  }

    /**
     * Get the value of method
     */ 
    public function getMethod()
    {
        return $this->method;
    }
}