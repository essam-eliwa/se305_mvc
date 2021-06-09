<?php
class Index extends view{
  public function output(){
    $title = $this->model->title;
    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"> $title</h1>
      <p class="lead">Example of MVC PHP framework</p>
      <hr class="my-4">
      <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
  </div>
EOT;
  echo $text;
  require APPROOT . '/views/inc/footer.php';

  }
}
