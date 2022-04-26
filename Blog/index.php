<?php

require_once 'database/requet.php';


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
          <a href="#" titile="Sound." class="text-white text-decoration-none sound-title">
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
        <!-- Carousel -->
        <div class="col-12">
          <div class="row  d-flex align-items-center ">

            <!-- Arrow left -->
            <div class="col-lg-3  d-none d-lg-block text-end" id="fleshGauche">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-caret-left text-white" viewBox="0 0 16 16">
                <path
                  d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z" />
              </svg>
            </div>

            <!-- Carousel Image -->
            <div class="col-12 col-lg-6 pt-4 pt-lg-0 carousel-container">
              <img src="images/wolfs.jpg" alt="random slide" class="w-100 rounded carousel-img" id="carouselImg">
            </div>

            <!-- Arrow right -->
            <div class="col-lg-3 d-none d-lg-block text-start" id="fleshDroite">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-caret-right text-white" viewBox="0 0 16 16">
                <path
                  d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
              </svg>
            </div>
          </div>
        </div>

      </div>
    </div>
  </header>
  <div class="gradient"></div>

  <!-- MAIN -->
  <main class="py-5">
    <div class="container">

      <div class="row">
        <!-- CARD -->



 <?php  foreach($blogPosts as $blogPost): ?>

    <div class="col-12 col-lg-6 d-flex justify-content-center pb-5">
      <article>

          <?php
            $id=$blogPost['id'];
            $title=$blogPost['title'];
            $cover=$blogPost['cover'];
            $date = $blogPost['date_c'];
            $category = $blogPost['category'];
            $content = $blogPost['content'];
            $authorFname = $blogPost['userFname'];
            $authorLname = $blogPost['userLName'];
          ?>

            <a href="page.php?id=<?php echo $id ?>&title=<?php echo $title ?>&cover=<?php echo $cover ?>&date=<?php echo $date ?>&category=<?php echo $category ?>&content=<?php echo $content ?>" title="titre de mon article" class="text-dark text-decoration-none">
              <img src="Images/upload/<?php echo $cover?>"  alt="image violon" class="w-100 rounded">
              <h1 class="py-2"><?php echo $title ?></h1>
            </a>
            <p class="text-secondary"><?php echo $date ?></p>                
                   
            <p class="py-2"><?php echo substr($content,0,250); ?></p>

            <div class="d-flef align-items-center gap-2">
            <!-- <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
            <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a> -->
            <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none"><?php echo $category?></a>
          </div>
        </article>
      </div>

  <?php endforeach;?>        

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


