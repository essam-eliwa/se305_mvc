<?php 
class About extends view{

  public function output(){
    $title = $this->model->title;
    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"> $title</h1>
    </div>
  </div>
EOT;
  echo $text;
  require APPROOT . '/views/inc/footer.php';

  }
}
