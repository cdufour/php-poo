<?php

class Transform
{
  protected $arr = []; // propriété $arr initialisée avec un tableau vide

  public function __construct($arr)
  {
    // hydration de la propriété $arr à l'instanciation de la classe
    // le tableau passé en entrée du constructeur alimente la propriété $arr
    $this->arr = $arr;
  }

  public function format()
  {
    $list = '<ul>'; // variable locale $list servant à construire la liste html.
    // variable initialisée avec la balise d'ouverture <ul> avant l'entrée dans une boucle
    foreach($this->arr as $value) { // boucle dans la propriété $arr
      $list .= '<li>'.$value.'</li>'; // à chaque itération : concaténation de balises <li></li> avec la valeur extraite du tableau
    }
    $list .= '</ul>'; // sortie de boucle: ajout de la balise de fermeture </ul> à la variable $list
    return $list; // retourne la variable $list
  }
}

$arr = [1,2,3]; // tableau de trois valeurs numériques
$list = new Transform($arr); // instanciation de la classe Transform. La tableau $arr est passé en entrée du constructeur
echo $list->format(); // affichage du retour de la méthode format();

?>
