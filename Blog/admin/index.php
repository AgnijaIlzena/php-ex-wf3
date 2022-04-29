<?php
require_once '../vendor/autoload.php';
require_once '../connexion.php';


$query = $db->query('SELECT * FROM posts');
$blogPosts = $query->fetchAll();
dump($blogPosts);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin space</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper --> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/delete.js" defer></script>
</head>

<body>

  <header class="bg-dark py-4">
    <div class="container">

      <!-- Page Titles -->
      <div class="row ">
        <div class="col-6 col-lg-12 text-start text-lg-center ">
          <a href="index.php" titile="Sound." class="text-white text-decoration-none h1 sound-title">
            Sound. <span class="text-danger fs-4">Administration</span>
          </a>
        </div>
        <!-- hamburger -->
        <div class="col-6 d-block d-lg-none text-end ">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
        </div>

        <div class="col-12 d-none d-lg-block">
          <!-- Navigation Bar -->
          <nav>
            <ul class="nav d-flex align-items-center justify-content-center gap-5 pt-3 m-0">
              <li>
                <a class="nav-link text-secondary" href="../index.php">Blog</a>
              </li>
              <li>
                <a class="nav-link text-secondary" href="index.php">Articles</a>
              </li>
            </ul>
          </nav>
        </div>


      </div>
    </div>
  </header>
  <div class="gradient"></div>
  <!-- MODAL BUTTON -->




  <!-- end ModalButton -->

  <main class="py-5">
    <div class="container">

      <div class="d-flex align-items-center justify-content-between pb-4">
        <h3 class="pb-3">Edit Articles</h3>
        <a href="./add.php" title="Ajouter un article" class="btn btn-success">
          New article
        </a>
      </div>

      <?php
      if (isset($_GET['successAd'])) : ?>
        <div class="alert alert-success mb-4">
          Article is succesfully added !
        </div>
      <?php endif; ?>




      <table class="table table-striped table-hover">
        <thead>
          <tr class="table-dark">
            <th>#</th>
            <th>TITLE</th>
            <th>CREATED AT</th>
            <th>OPTIONS</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($blogPosts as $blogPost) : ?>

            <tr>
              <td class="py-4" scope="row"><?php echo $blogPost['id'] ?></td>
              <td class="py-4"><?php echo $blogPost['title'] ?></td>
              <td class="py-4"><?php echo $blogPost['created_at'] ?></td>
              <td class="py-3">

                <a href="edit.php?idpost=<?php echo $blogPost['id'] ?>" title="Edit" class="btn btn-secondary">
                  Edit
                </a>
                <a href="deleteimage.php?idpost=<?php echo $blogPost['id'] ?>" title="Delete" class="ps-2 btn btn-outline-danger btnDelete" data-bs-toggle="modal" data-bs-target="#confirmDelete">
                  Delete this article
                </a>

              </td>
            </tr>

          <?php endforeach; ?>
        </tbody>

      </table>

    <!-- Modal -->
   
<div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Delete article ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="#" class="btn btn-outline-danger btnDeleteModal">Delete article</button>
      </div>
    </div>
  </div>
</div>        

<!-- end modal -->

    </div>
  </main>

  <footer class="bg-dark py-4">
    <div class="container">
      <p class="m-0 text-white">&copy; Copyright Sound 2022</p>
    </div>
  </footer>

</body>

</html>