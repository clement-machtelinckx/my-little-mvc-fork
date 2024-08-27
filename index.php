<?php

require_once 'vendor/autoload.php';

use App\Category;
use App\Clothing;

// $clothing = new Clothing(2, 'aspirateur', ['aspi.jpg'], 150, 'A nice aspi', 10, 3, new \DateTime(), new \DateTime(), 'NC', 'blue', 'plastoc', 1);
// $clothing->create();
// var_dump($clothing);

// $category = new Category(2, "Electronique", "electromenager ect", new \DateTime());

// $clothing->create();

$clothing = new Clothing();
echo($clothing->findOneById(15));
echo("prout");
