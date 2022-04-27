<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Form</title>
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
          <a href="/index.php" titile="Sound." class="text-white text-decoration-none sound-title">
            Administrator Space
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
                <a class="nav-link text-secondary" href="/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary" href="/categories.php">Articles</a>
              </li>
            </ul>
          </nav>
        </div>


      </div>
    </div>
  </header>
  <div class="gradient"></div>

<main class="my-5">
<div class="row">
    <div class="col-4 container">
        <h2 class="py-3">Add New Article</h2>
        <form action="add.php" method="post" enctype="multipart/form-data" class="gap-10">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title of article" name="title">
                <!-- <small id="emailHelp" class="form-text text-muted">...</small> -->
            </div>

            <div class="form-group">
            <label class="mr-sm-2" for="category">Category</label>
                <select class="custom-select mr-sm-2" id="category" name="category">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>            
            </div>

            <div class="form-group">
                <label for="img">Cover</label>
                <input type="file" class="form-control-file" id="img" name="cover">
            </div>

            <div class="form-group">
                <textarea name="content" id="content" cols="70" rows="10" placeholder="Input text" ></textarea>
                <!-- <label for="content">Content</label>                -->
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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