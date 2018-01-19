<?php
require 'vendor/autoload.php';

use mywishlist\models\Liste as Liste;
use mywishlist\models\Item as Item;
use Illuminate\Database\Capsule\Manager as DB;


$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();
$q1=Liste::get();
echo "-----Table Liste------<br/>";
foreach ($q1 as $liste) {
  echo $liste."<br/>";
}
echo "-----Table Item------<br/>";
$q2=Item::get();
foreach ($q2 as $item) {
  echo $item."<br/>";
}
echo "----Item d'id dans l'url-------<br/>";
$q3=Item::where('id','=',$_GET['id'])->get();;
foreach ($q3 as $item) {
  echo $item."<br/>";
}

$i=new Item();
$i->liste_id = 3;
$i->nom = "Chaussure";
$i->descr ="C'est une chaussure";

$i->save();
$i->delete();

echo "<br/>---Nom de la liste----<br/>";
$q3=Item::get();
foreach ($q3 as $item) {
  $c=Item::where('id','=',$item->liste_id)->first();
  $v = $c->liste()->first();
  echo $item."<br/> Liste:".$v."<br/>";
}


echo "<br/>----Liste d'item---<br/>";
$l=$v->items()->where('liste_id','=',$_GET['id'])->get();
foreach ($l as $item) {
  echo $item."<br/>";
}


 ?>
