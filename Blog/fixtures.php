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

 $db->query('SET FOREIGN_KEY_CHECKS = 0');
 $db->query('TRUNCATE categories');
 $db->query('TRUNCATE users');
 $db->query('TRUNCATE posts');
 $db->query('SET FOREIGN_KEY_CHECKS = 1');
 /**
  * Insertion des données dans la table "categories"
  */

  for($i=0; $i < 10; $i++){
        $query = $db->prepare('INSERT INTO categories (name) VALUES (:name)');
        $query->bindValue(':name', $faker->colorName );
        $query->execute();
  }

  for($i=0; $i<20; $i++) {
      $createdAt = $faker->dateTimeBetween('-3 years');

      $query = $db->prepare('INSERT INTO users (lastName, firstName, email, password, role, created_at) VALUES (:lastName, :firstName, :email, :password, :role, :created_at)');
      $query->bindValue(':lastName', $faker->lastName);
      $query->bindValue(':firstName', $faker->firstName);
      $query->bindValue(':email', $faker->unique()->email);
      $query->bindValue(':password', password_hash('secret', PASSWORD_ARGON2I));
      $query->bindValue(':role', $i===0 ? 'ROLE_ADMIN' : 'ROLE_USER');
      $query->bindValue(':created_at', $createdAt->format('Y-m-d'));
      $query->execute();
  }

  for($i=0; $i<15; $i++) {
    $createdAt = $faker->dateTimeBetween('-3 years');
    $random10 = rand(1, 10);
    $random20 = rand(1, 20);

      $query = $db->prepare('INSERT INTO posts (title, content, cover, created_at, category_id, user_id) VALUES (:title, :content, :cover, :created_at, :category_id, :user_id)');
     
     $query->bindValue(':title', $faker->realText(10, 1));
    //$query->bindValue(':title', $faker->sentence($nbWords = 4, $variableNbWords = true));
      $query->bindValue(':content', $faker->realText($maxNbChars = 400, $indexSize = 5));
     // $query->bindValue(':content', $faker->paragraph(3));
      $query->bindValue(':cover', '2.jpg');
      $query->bindValue(':created_at', $createdAt->format('Y-m-d'));
      $query->bindValue(':category_id', $random10, PDO::PARAM_INT);
      $query->bindValue(':user_id', $random20, PDO::PARAM_INT);
      $query->execute();
  }

