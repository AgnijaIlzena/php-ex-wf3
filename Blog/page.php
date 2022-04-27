<?php 

require_once 'vendor/autoload.php';
require_once 'connexion.php';

$idnew = htmlspecialchars(strip_tags($_GET['id']));   // this comes from link in index file normaly.

   $query = $db->prepare('SELECT posts.id, posts.title, posts.content, posts.cover, posts.created_at, posts.category_id AS categoryId, categories.name AS category, users.lastName AS userLName, users.firstName AS userFname, DATE_FORMAT(posts.created_at, "%d %M %Y") AS date_c
   FROM posts 
   INNER JOIN categories ON categories.id = posts.category_id 
   INNER JOIN users ON users.id = posts.user_id
   WHERE posts.id = :id
   ORDER BY posts.created_at DESC');
   
   //$idnew = $_GET['id'];
   $query->bindValue(':id', $idnew, PDO::PARAM_INT);
   $query->execute();
   $article = $query->fetch();

   if (!$article) {
    header('Location: error.php');
}

dump($article);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog article: <?php $article['titre']?></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="bg-dark py-4">
        <div class="container">

            <!-- Page Titles -->
            <div class="row d-flex align-items-center">
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
            </div>
        </div>
    </header>
    <div class="gradient"></div>

    <!-- MAIN -->
    <main>
        <div class="container">

            <div class="row">

                <!-- ARTICLE SECTION -->
                <div class="col-12 d-flex justify-content-center mb-5">
                    <article class="page-article">
                        <div class="inner-container w-75 mx-auto ">
                            <a href="#" title="titre de mon article" class="text-dark text-decoration-none ">
                                <h1 class="py-2"><?php echo $article['title']?></h1>
                            </a>

                            <p class="text-secondary small date"><?php echo $article['date_c']?></p>

                            <div class="d-flex align-items-center gap-2 mb-4 justify-content-center  ">
                                <a href="categories.php?categoryId=<?php echo $article['categoryId']?>" title="Design"
                                    class="badge rounded-pill bg-primary text-decoration-none"><?php echo $article['category']?></a>

                                <p> Author : <?php echo $article['userFname'] . ' ' .  $article['userLName'];?> </p>

                                <!-- <a href="#" title="Photography"
                                    class="badge rounded-pill bg-primary text-decoration-none">Photography</a> -->
                            </div>
                        </div>
                        <img src="images/upload/<?php echo $article['cover']?>" alt="image violon" class="w-100 rounded">
                        <div class="inner-container w-75 mx-auto">
                            <p class="mt-4"><strong> <?php echo $article['content']?></strong></p>
                            <p class="py-2"><?php echo $article['content']?></p>
                        </div>
                    </article>

                    
                </div>
            </div>
        </div>

        <div class="w-100 bg-light">
            <div class="container ">
                <!-- COMMENTS SECTION -->
                <div class="row">
                    <div class=" py-4 mt-5 ">
                        <div class="col-12">
                            <section>
                                <div class="row">
                                    <!-- TITLE -->
                                    <div class="col-12">
                                        <h1 class="py-5">Comments</h1>
                                    </div>

                                    <!-- COMMENT-card -->
                                    <div class="col-12">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-6">
                                                <h2>John Doe</h2>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="text-secondary">January 1, 2021</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, cupiditate
                                            nostrum,
                                            at id nesciunt molestias similique consequuntur molestiae ipsam architecto
                                            officia repellat quam voluptates saepe dolore quas tenetur iusto voluptatum!
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-6">
                                                <h2>John Doe</h2>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="text-secondary">January 1, 2021</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, cupiditate
                                            nostrum,
                                            at id nesciunt molestias similique consequuntur molestiae ipsam architecto
                                            officia repellat quam voluptates saepe dolore quas tenetur iusto voluptatum!
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-6">
                                                <h2>John Doe</h2>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="text-secondary">January 1, 2021</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, cupiditate
                                            nostrum,
                                            at id nesciunt molestias similique consequuntur molestiae ipsam architecto
                                            officia repellat quam voluptates saepe dolore quas tenetur iusto voluptatum!
                                        </p>
                                    </div>

                                    <!-- Add comments' section -->
                                    <div class="col-12">
                                        <form action="#">
                                            <h3 class="py-5">Add a comment</h3>
                                            <div class="form-group">
                                                <label for="author">Author</label>
                                                <input type="text"
                                                    class=" form-control border-bottom border-secondary rounded-0 bg-light my-3"
                                                    id="author">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email"
                                                    class="form-control border-bottom border-secondary rounded-0 bg-light my-3"
                                                    id="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="comment">Comment</label>
                                                <textarea
                                                    class="form-control border-bottom border-secondary rounded-0 bg-light my-3"
                                                    rows="3"></textarea>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-dark w-100 text-uppercase rounded-0">submit</button>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </main>
    <!-- footer -->
    <footer class="bg-dark py-4">
        <div class="container">
            <p class="m-0 text-white">&copy; Copyright Sound 2022</p>
        </div>
    </footer>
</body>

</html>