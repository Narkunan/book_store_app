<?php
namespace App\view;
use App\View\ViewDTO;
use Twig\Environment;

class ViewRenderer {

  /**
   * @param \Twig\Environment $twig
   */
  public function __construct(
    protected Environment $twig,
  ) {}

  /**
   * @param \App\View\ViewDTO|null $view
   *
   * @return void
   * @throws \Twig\Error\LoaderError
   * @throws \Twig\Error\RuntimeError
   * @throws \Twig\Error\SyntaxError
   */
  public function render(ViewDto $viewDto ): void {

      echo $this->twig->render( $viewDto->filename, $viewDto->data);
  
  }

}
