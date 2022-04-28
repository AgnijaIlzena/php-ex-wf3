<?php
require_once '../connexion.php';
require_once '../vendor/autoload.php';

$query = $db->query('SELECT categories.name AS categoryname, categories.id AS categoryId FROM categories');
$categories = $query->fetchAll();

$error = null;
$title = null;
$category = null;
$content = null;

$typeExtension = [
  'png' => 'image/png',
  'jpg' => 'image/jpeg',
  'jpeg' => 'image/jpeg',
  'gif' => 'image/gif',
];
$extension = strtolower(pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION));
$poidsMax = 1 * 1048576;
// USERS ROLE QUERY
$role = 1;
// CATEGORY DATA are provided in FORM
$categoryId = $_POST['category'];
// POSTS requete
//should verify correct user_id of admin in data base
$date = date('Y-m-d', strtotime("now")); 

if(!empty($_POST)){
  $title = htmlspecialchars(strip_tags($_POST['title']));
  $category = htmlspecialchars(strip_tags($_POST['category']));
  $content = htmlspecialchars(strip_tags($_POST['content']));
}

if (!empty($title)
&& !empty($category)
&& !empty($content)
&& !empty($_FILES['cover'])
&& !empty($_FILES['cover']['error']=== 0)
) {

  if (!empty($_FILES['cover']) && $_FILES['cover']['error'] === 0) {
    if (array_key_exists($extension, $typeExtension) && in_array($_FILES['cover']['type'], $typeExtension)) {
        if ($_FILES['cover']['size'] <= $poidsMax){
            //move_uploaded_file($_FILES['cover']['tmp_name'], "uploads/{$_FILES['cover']['name']}"); // original first  upload method version, saves file with original filename.
            
          //  $newFileName = (!empty($_POST['userFileName'])) ? "{$_POST['userFileName']}.$extension" : $_FILES['cover']['name']; // uploads method with providing new file name for uploaded file when added via POST method form
  
  
          // create new file name to downloaded file. 
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
            $destImagePath ="../Images/thumbs/min_$newfilename";  
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
  //------------------------------

  $query = $db->prepare('INSERT INTO posts (title, content, category_id, user_id, cover, created_at) VALUES (:title, :content, :category_id, :user_id, :cover, :created_at)');
  $query->bindValue(':title', $title);
  $query->bindValue(':content', $content);
  $query->bindValue(':category_id', $categoryId); 
  $query->bindValue(':user_id', $role); 
  $query->bindValue(':cover', $newfilename); 
  $query->bindValue(':created_at', $date); 
  $query->execute();
  //CREATE INSERT SQL REQUET
} else {
  $error = 'All fields are required!';
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

        <!-- ERROR message -->
        <?php if ($error !== null): ?>
          <div class="alert alert-danger">
              <?php echo $error; ?>
          </div>
       <?php endif; ?>


        <form action="" method="post" enctype="multipart/form-data" class="gap-10">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title of article" name="title" value="<?php echo $title; ?>">
                <!-- <small id="emailHelp" class="form-text text-muted">...</small> -->
            </div>

            <div class="form-group">
            <label class="mr-sm-2" for="category">Category</label>
           
                <select class="custom-select mr-sm-2" id="category" name="category">
                    <option selected>Choose...</option>
                    <?php foreach($categories as $categori): ?>
                    <option value="<?php echo $categori['categoryId'];?>" <?php echo ($category !== null && $category == $categori['categoryId']) ? 'selected' : null; ?>><?php echo $categori['categoryname'];?></option>
                    <?php endforeach; ?>    
                </select>     
                  
               
            </div>

            <div class="form-group">
                <label for="img">Cover</label>
                <input type="file" class="form-control-file" id="img" name="cover">
            </div>

            <div class="form-group">
                <textarea name="content" id="content" cols="70" rows="10" placeholder="Input text" ><?php echo $content; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div>
          <img src="<?php echo $minImagePath ?>" alt="image icon">
        </div>
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