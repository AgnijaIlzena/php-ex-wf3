<?php

/**
 * fixtures.php
 * Insertion de fausses données en BDD
 */

 //Chargement de autoloader de Composer
 require_once 'vendor/autoload.php';

 require_once 'connexion.php';

 // creation of insance of Faker
 $faker = Faker\Factory::create();  // if want in french  'fr_FR'

 $db->query('SET FOEIGN_KEY_CHECKS = 0');
 $db->query('TRUNCATE categories');
 $db->query('SET FOEIGN_KEY_CHECKS = 1');
 /**
  * Insertion des données dans la table "categories"
  */

  for($i=0; $i < 10; $i++){
        $query = $db->prepare('INSERT INTO categories (name) VALUES (:name)');
        $query->bindValue(':name', $faker->colorName );
        $query->execute();
  }

  for($i=0; $i<20; $i++) {
      $query = $db->prepare('INSERT INTO users (lastName, firstName, email, password, role) VALUES (:lastName, :firstName, :email, :password, :role)');
      $query-bindValue(':lastName', $faker->firstName);
      $query->execute();
  }

