<?php
require_once '../connexion.php';
require_once '../vendor/autoload.php';

$query = $db->query('SELECT * FROM categories');
$query->execute();
$categories = $query->fetchAll();

//dump($idpost);  here is Info about id:5 only 

$idpost = $_GET['idpost'];
$query = $db->prepare('SELECT posts.id, posts.title, posts.cover, posts.content, categories.name AS categoryName, categories.id AS categoryId FROM posts
INNER JOIN categories ON categories.id = posts.category_id
WHERE posts.id = :idpost
ORDER BY posts.created_at DESC');
$query->bindValue(':idpost', $idpost, PDO::PARAM_INT);
$query->execute();
$post = $query->fetch();
//dump($post); // here is info about 1 particular post  with various information. The one I chose in edit.php with id.

$error = null;
$title = $post['title'];
$category = $post['categoryName'];
$categoryId = $post['categoryId'];
$content = $post['content'];
$image = $post['cover'];
$path = "../Images/thumbs/min_";

$typeExtension = [
  'png' => 'image/png',
  'jpg' => 'image/jpeg',
  'jpeg' => 'image/jpeg',
  'gif' => 'image/gif',
];

$poidsMax = 1 * 1048576;
// USERS ROLE QUERY
$role = 1;
$date = date('Y-m-d', strtotime("now"));


if (!empty($_POST)) {
  $title = htmlspecialchars(strip_tags($_POST['title']));
  $category = htmlspecialchars(strip_tags($_POST['category']));
  $content = htmlspecialchars(strip_tags($_POST['content']));

  if (
    !empty($title)
    && !empty($category)
    && !empty($content)
   ) {
     
     $extension = strtolower(pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION));
      if (!empty($_FILES['cover']) && $_FILES['cover']['error'] === 0) {          
          unlink("Images/upload/{$image}");
          unlink("Images/thumbs/min_{$image}");                      

      if (array_key_exists($extension, $typeExtension) && in_array($_FILES['cover']['type'], $typeExtension)) {
        if ($_FILES['cover']['size'] <= $poidsMax) {
 
          $fileName = explode('.', $_FILES['cover']['name']);
          $newfilename = round(microtime(true)) . '.' . end($fileName);
          $minNewFilename = 'min_' . $newfilename;
  
          // verifiez if image with the same name already exists
          if (!file_exists("Images/upload/$newfilename")) {
            //save a file in upload folder with the new name.
            move_uploaded_file($_FILES['cover']['tmp_name'], "../Images/upload/" . $newfilename);
          }
  
          $imagePath = "../Images/upload/" . $newfilename;
          $minImagePath = "../Images/thumbs/min_" . $newfilename;
  
          // Cretion de la miniature
          require_once 'functions.php';
          $imageSource = "../Images/upload/$newfilename";
          $destImagePath = "../Images/thumbs/min_$newfilename";
          createThumb($imageSource, $destImagePath, $width = 150, $height = null);
        } else {
          $error = 'Max file size 1Mo exceeded';
        }
      } else {
        $error = 'Wrong file extension!';
      }
    } else {
      $error = 'File is required';
    }
  
    // UPDATE SQL query

    $query = $db->prepare('UPDATE posts SET title = :title, content = :content, category_id = :category_id, user_id = :user_id, cover= :cover, created_at= :created_at WHERE id = :idpost');
    $query->bindValue(':title', $title);
    $query->bindValue(':content', $content);
    $query->bindValue(':category_id', $category);
    $query->bindValue(':user_id', $role);
    $query->bindValue(':cover', $newfilename);
    $query->bindValue(':created_at', $date);  
    $query->bindValue(':idpost', $idpost);
    $query->execute();
    header('Location: index.php?successEdit=1');
  } else {
    $error = 'Fields Tile, content category are required ';
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin-Form</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="index.js" defer></script>
</head>

<body>

  <header class="bg-dark py-4">
    <div class="container">

      <!-- Page Titles -->
      <div class="row">
        <div class="col-6 col-lg-12 text-start text-lg-center ">
          <a href="/index.php" title="Sound." class="text-white text-decoration-none h1 sound-title">
            Sound. <span class="text-danger fs-4">Administration</span>
          </a>
        </div>
        <!-- hamburger -->
        <div class="col-6 d-block d-lg-none text-end ">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
        </div>

        <!-- Navigation Bar -->
        <div class="col-12 d-none d-lg-block">
          <nav class="my-3">
            <ul class="nav d-flex align-items-center justify-content-center gap-5">
              <li class="nav-item">
                <a class="nav-link text-secondary" href="../index.php">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary" href="index.php">Articles</a>
              </li>
            </ul>
          </nav>
        </div>


      </div>
    </div>
  </header>
  <div class="gradient"></div>

  <main class="my-5">
    <div class="container">

      <h2 class="py-3">Edit Article: <?php ?> </h2>

      <!-- ERROR message -->
      <?php if ($error !== null) : ?>
        <div class="alert alert-danger">
          <?php echo $error; ?>
        </div>
      <?php endif; ?>


      <form action="" method="post" enctype="multipart/form-data" class="gap-10">

        <div class="mb-3">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Title of article" name="title" value="<?php echo $title; ?>">
          <!-- <small id="emailHelp" class="form-text text-muted">...</small> -->
        </div>

        <div class="col mb-3">
          <label class="form-label" for="category">Category</label>
          <select class="form-select" id="category" name="category">
          <!-- value need to indicate here with empty value, so that system see that it is empty and send an error   -->
          <option value="">Choose the category</option>


            <?php foreach ($categories as $categori) : ?>
              <option value="<?php echo $categori['id']; ?>"><?php echo $categori['name']; ?></option>
            <?php endforeach; ?>

          </select>
        </div>

        <div class="row bm-4">
          <div class="col mb3">
            <label for="cover" class="form-label">Cover</label>
            <input type="file" class="form-control" id="cover" name="cover">
            <div id="coverHelpBlock" class="form-text">
              Image should not exceed 1Mo.
            </div>
          </div>
        </div>

        <div>
          <img src="<?php echo $path . $image ?>" alt="image icon">
        </div>

        <div class="mb3">
          <label for="content" class="form-label">Content</label>
          <textarea class="form-control" name="content" id="content" rows="10"><?php echo $content; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit edited article</button>
      </form>


    </div>
  </main>
  <footer class="bg-dark py-4">
    <div class="container">
      <p class="m-0 text-white">&copy; Copyright Sound 2022</p>
    </div>
  </footer>
</body>

</html>