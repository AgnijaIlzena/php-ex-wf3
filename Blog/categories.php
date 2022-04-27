<?php

require_once 'database/requet.php';
require_once 'vendor/autoload.php';

//if (!isset($categoryId) && !empty($categoryId)) 

$categoryId = htmlspecialchars(strip_tags($_GET['categoryId']));  // this comes from link in index file tranfering data with Global GET variable.
$query = $db->prepare('SELECT posts.id, posts.title, posts.content, posts.cover, posts.created_at, posts.category_id AS categoryId, categories.name AS category, users.lastName AS userLName, users.firstName AS userFname, DATE_FORMAT(posts.created_at, "%d %M %Y") AS date_c
FROM posts 
INNER JOIN categories ON categories.id = posts.category_id 
INNER JOIN users ON users.id = posts.user_id 
WHERE posts.category_id = :idcategory
ORDER BY posts.created_at DESC');
   $query->bindValue(':idcategory', $categoryId, PDO::PARAM_INT);
   $query->execute();
   $categoryArticles = $query->fetchAll();

     if (!$categoryArticles) {
     header('Location: error.php');
   }

   dump($categoryArticles);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="index.js" defer></script>
</head>

<body>
  <header class="bg-dark py-4">
    <div class="container">

      <!-- Page Titles -->
      <div class="row d-flex align-items-end">
        <div class="col-6 col-lg-12 text-start text-lg-center ">
          <a href="#" titile="Sound. Category name" class="text-white text-decoration-none sound-title">
            Sound.
          </a>
        </div>

        <!-- hamburger -->
        <div class="col-6 d-block d-lg-none text-end ">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
            class="bi bi-list text-white" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
        </div>

        <div class="col-12 d-none d-lg-block">
          <!-- Navigation Bar -->
          <nav class="my-3">
            <ul class="nav d-flex align-items-center justify-content-center gap-5">
              <li class="nav-item">
                <a class="nav-link text-secondary" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary" href="#">Categories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary" href="#">Styles</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary" href="#">Contact</a>
              </li>
            </ul>
          </nav>
        </div>

        <!-- List of categories. -->
 <!-- TO FILL -->


      </div>
    </div>
  </header>
  <div class="gradient"></div>

  <!-- MAIN -->
  <main class="py-5">


    <div class="container">

    <h3 class="pb-3 border-bottom">Category: <?php echo $categoryArticles[0]['category']?></h3>

       <div class="row">
        <!-- CARD -->



 <?php 
foreach($categoryArticles as $categoryArticle): ?>



    <div class="col-12 col-lg-6 d-flex justify-content-center pb-5">
      <article>



            <a href="page.php?id=<?php echo $categoryArticle['id']; ?>" title="titre de mon article" class="text-dark text-decoration-none">
              <img src="Images/upload/<?php echo $categoryArticle['cover']?>"  alt="cover image" class="w-100 rounded">
              <h1 class="py-2"><?php echo $categoryArticle['title']?></h1>
            </a>
            <p class="text-secondary"><?php echo $categoryArticle['date_c']?></p>                
                   
            <p class="py-2"><?php echo substr("{$categoryArticle['content']}",0,250); ?></p>

            <div class="d-flef align-items-center gap-2">
            <!-- <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
            <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a> -->
            <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none"><?php echo $categoryArticle['category']?></a>
          </div>
        </article>
      </div>


  <?php endforeach;  
  ?>        

      </div>
    </div>
  </main>

  <footer class="bg-dark py-4">
    <div class="container">
      <p class="m-0 text-white">&copy; Copyright Sound 2022</p>
    </div>
  </footer>

</body>

</html>
