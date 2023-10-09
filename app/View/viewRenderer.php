<?php
namespace App\view;
use App\View\ViewDTO;
use Twig\Environment;

class ViewRenderer {

public Environment $twig;
  public function __construct(Environment $twig) {
             $this->twig = $twig;
  }
  public function render(ViewDto $viewDto ): void {

      echo $this->twig->render( $viewDto->filename, $viewDto->data);
  
  }

}
