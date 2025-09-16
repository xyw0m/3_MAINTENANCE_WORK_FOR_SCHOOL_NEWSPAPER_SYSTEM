<?php require_once 'writer/classloader.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <style>
    body {
      font-family: 'Comic Sans MS', 'Arial', sans-serif;
      background-color: #f7e1b5; /* Light yellow background */
    }
    .navbar {
      background-color: #ff6f61 !important; /* Bright red-orange */
    }
    .card {
      border-radius: 15px;
      border: 3px solid #6b5b95; /* Purple border */
      box-shadow: 5px 5px 10px rgba(0,0,0,0.2);
    }
    .card-body h1 {
      color: #008744; /* Green headings */
      text-shadow: 1px 1px #fff;
    }
    .btn-primary {
      background-color: #ffb83d; /* Orange-yellow button */
      border-color: #ffb83d;
    }
    .btn-primary:hover {
      background-color: #ff9a00;
      border-color: #ff9a00;
    }
    .welcome-text {
      color: #6b5b95; /* Purple text */
      font-weight: bold;
      text-shadow: 2px 2px #fff;
    }
    .section-title {
      color: #008744;
      font-weight: bold;
      text-shadow: 2px 2px #fff;
    }
    .message-from-admin {
      background-color: #ff6f61 !important; /* Bright red-orange for admin messages */
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark p-4">
    <a class="navbar-brand" href="#">
      <i class="fas fa-pencil-alt"></i> Our School Newspaper!
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>

  <div class="container-fluid py-5">
    <div class="display-4 text-center welcome-text">Hi there, welcome to our awesome newspaper! 👋</div>
    
    <div class="row my-4">
      <div class="col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-body text-center">
            <h1>✍️ Writer</h1>
            <img src="https://images.unsplash.com/photo-1577900258307-26411733b430?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded my-3">
            <p><strong>Writers are storytellers!</strong> They write fun articles and stories for everyone to read.</p>
          </div>
        </div>
      </div>
      
      <div class="col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-body text-center">
            <h1>👑 Admin</h1>
            <img src="https://plus.unsplash.com/premium_photo-1661582394864-ebf82b779eb0?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded my-3">
            <p><strong>Admins are the newspaper leaders!</strong> They help make sure all the stories are ready to be published and look great.</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="display-4 text-center mt-4 section-title">Here are all our awesome articles! 👇</div>
    
    <div class="row justify-content-center">
      <div class="col-md-8">
        <?php 
          // This array is a placeholder. You would normally get this data from a database.
          $articles = [
            [
              'title' => 'The Mystery of the Missing Cookies',
              'username' => 'Detective Dan',
              'created_at' => '2025-09-15',
              'content' => 'A shocking mystery has hit the school! All the cookies from the cafeteria are gone. Our top investigators are on the case. We think it might have been a sneaky squirrel, but we need your help to find the crumbs!',
              'is_admin' => 0
            ],
            [
              'title' => 'Important Message about Fun Time!',
              'username' => 'Principal Pal',
              'created_at' => '2025-09-17',
              'content' => 'Hey everyone! Just a reminder that this Friday will be a special Fun Day in the park. We will have games, face painting, and a bouncy castle. Make sure to bring your best smiles and get ready for a super fun time!',
              'is_admin' => 1
            ],
            [
              'title' => 'How to Make Slime! A Step-by-Step Guide',
              'username' => 'Professor P',
              'created_at' => '2025-09-16',
              'content' => 'Want to make your own bouncy, gooey slime? It\'s easy! All you need is some glue, a little bit of water, and a secret ingredient. Read our special guide to find out how to make the best slime ever and impress your friends!',
              'is_admin' => 0
            ]
          ];
        ?>
        <?php foreach ($articles as $article) { ?>
          <div class="card mt-4 shadow">
            <div class="card-body">
              <h1 class="card-title"><?php echo $article['title']; ?></h1>
              <?php if ($article['is_admin'] == 1) { ?>
                <p><small class="bg-primary text-white p-2 rounded message-from-admin">
                  <i class="fas fa-crown"></i> A message from the leader!
                </small></p>
              <?php } ?>
              <small class="d-block mb-2">
                <strong>By: <?php echo $article['username'] ?></strong> on <?php echo date("F j, Y", strtotime($article['created_at'])); ?> 
              </small>
              <p><?php echo $article['content']; ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>