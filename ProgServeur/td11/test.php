<?php
require 'vendor/autoload.php';
$app = new \Slim\Slim();

$app->get('/souhait/liste',function(){
  echo "Ceci est une liste de souhait";
});

$app->get('/souhait/:id/liste',function($id){
  echo "Ceci est la liste des items de la liste $id";
});

$app->get('/item/:id',function($id){
  echo "Ceci est la description de l'item $id";
});

$app->run();
 ?>
