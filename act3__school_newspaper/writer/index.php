<?php require_once 'classloader.php'; ?>

<?php 
if (!$userObj->isLoggedIn()) {
  header("Location: login.php");
  exit;
}

if ($userObj->isAdmin()) {
  header("Location: ../admin/index.php");
  exit;
}  
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Google Fonts: Kid-friendly -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Comic+Neue:wght@700&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous" />

  <!-- FontAwesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    body {
      font-family: 'Comic Neue', cursive, Arial, sans-serif;
      background: #f0f8ff; /* Light pastel blue */
      color: #333;
      min-height: 100vh;
      padding-bottom: 50px;
    }
    .header {
      background: #a2d5f2; /* Soft blue */
      padding: 30px 15px;
      text-align: center;
      border-bottom: 5px solid #f9a825; /* Bright yellow accent */
      position: relative;
    }
    .header h1 {
      font-family: 'Fredoka One', cursive;
      font-size: 2.8rem;
      color: #2e7d32; /* Dark green */
      margin-bottom: 10px;
    }
    .header .welcome-text {
      font-size: 1.3rem;
      color: #555;
    }
    .header img.character {
      position: absolute;
      right: 15px;
      top: 10px;
      width: 80px;
      user-select: none;
    }
    .article-form {
      background: #fff;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 8px 15px rgba(0,0,0,0.1);
      margin-top: 30px;
    }
    .article-form .form-control {
      border-radius: 10px;
      font-size: 1.1rem;
      padding: 12px 15px;
    }
    .article-form .btn-submit {
      background: #f9a825;
      border: none;
      font-weight: 700;
      font-size: 1.2rem;
      border-radius: 12px;
      transition: background-color 0.3s ease;
    }
    .article-form .btn-submit:hover {
      background: #c17900;
    }
    .form-icon {
      color: #f9a825;
      margin-right: 8px;
    }
    .articles-list {
      margin-top: 40px;
    }
    .card-article {
      border-radius: 20px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      transition: transform 0.2s ease;
    }
    .card-article:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }
    .card-article h2 {
      font-family: 'Fredoka One', cursive;
      color: #2e7d32;
      font-size: 1.8rem;
    }
    .card-article .admin-badge {
      background-color: #f9a825;
      color: white;
      font-weight: 700;
      padding: 3px 10px;
      border-radius: 12px;
      font-size: 0.85rem;
      display: inline-block;
      margin-bottom: 8px;
    }
    .card-article small {
      color: #666;
      font-style: italic;
    }
    .card-article p {
      font-size: 1.1rem;
      line-height: 1.5;
      margin-top: 10px;
    }
    /* Responsive tweaks */
    @media (max-width: 767px) {
      .header img.character {
        position: static;
        display: block;
        margin: 15px auto 0;
        width: 100px;
      }
      .article-form {
        margin-top: 20px;
      }
    }
  </style>
  <title>School Newspaper - Welcome</title>
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <header class="header">
    <h1>Welcome to the School Newspaper!</h1>
    <p class="welcome-text">Hello there, <span class="text-success font-weight-bold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>! Ready to share your story?</p>
    <img src="images/cartoon-kid.png" alt="Cartoon Kid" class="character" />
  </header>

  <main class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <form action="core/handleForms.php" method="POST" class="article-form" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title" class="font-weight-bold"><i class="fas fa-pencil-alt form-icon"></i>Article Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Input title here" required />
          </div>
          <div class="form-group">
            <label for="description" class="font-weight-bold"><i class="fas fa-book form-icon"></i>Article Content</label>
            <textarea id="description" name="description" class="form-control" placeholder="Write your article here..." rows="5" required></textarea>
          </div>
          <div class="form-group">
            <label for="image" class="font-weight-bold"><i class="fas fa-image form-icon"></i>Upload Image (optional)</label>
            <input type="file" id="image" name="image" class="form-control-file" accept="image/*" />
          </div>
          <button type="submit" name="insertArticleBtn" class="btn btn-submit btn-block mt-3">Submit Article</button>
        </form>

        <section class="articles-list">
          <?php $articles = $articleObj->getActiveArticles(); ?>
          <?php foreach ($articles as $article) { ?>
            <div class="card card-article p-4">
              <h2><?php echo htmlspecialchars($article['title']); ?></h2>
              <?php if ($article['is_admin'] == 1) { ?>
                <div class="admin-badge">Message From Admin</div>
              <?php } ?>
              <small>By <strong><?php echo htmlspecialchars($article['username']); ?></strong> - <?php echo htmlspecialchars($article['created_at']); ?></small>
              <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
              <?php if (!empty($article['image_path'])) { ?>
                <img src="<?php echo htmlspecialchars($article['image_path']); ?>" alt="Article Image" class="img-fluid rounded mt-3" />
              <?php } ?>
            </div>
          <?php } ?>
        </section>
      </div>
    </div>
  </main>

  <!-- Optional Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
