<?php  
// No need to require 'Database.php' here, as it's included in classloader.php
require_once '../classloader.php';

// Check if the user is already logged in for some actions
session_start();

if (isset($_POST['insertNewUserBtn'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password)) {

        if ($password === $confirm_password) {

            if (!$userObj->usernameExists($username)) {

                if ($userObj->registerUser($username, $email, $password)) {
                    $_SESSION['message'] = "Registration successful! You can now log in.";
                    $_SESSION['status'] = '200';
                    header("Location: ../login.php");
                    exit();
                } else {
                    $_SESSION['message'] = "An error occurred with the query!";
                    $_SESSION['status'] = '400';
                    header("Location: ../register.php");
                    exit();
                }
            } else {
                $_SESSION['message'] = $username . " as username is already taken";
                $_SESSION['status'] = '400';
                header("Location: ../register.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "Please make sure both passwords are equal";
            $_SESSION['status'] = '400';
            header("Location: ../register.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Please make sure there are no empty input fields";
        $_SESSION['status'] = '400';
        header("Location: ../register.php");
        exit();
    }
}

if (isset($_POST['loginUserBtn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {

        if ($userObj->loginUser($email, $password)) {
            // Success messages and status are now handled inside the loginUser method
            header("Location: ../index.php");
            exit();
        } else {
            // Error messages and status are now handled inside the loginUser method
            header("Location: ../login.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Please make sure there are no empty input fields";
        $_SESSION['status'] = '400';
        header("Location: ../login.php");
        exit();
    }
}

if (isset($_GET['logoutUserBtn'])) {
    $userObj->logout();
    header("Location: ../index.php");
    exit();
}

if (isset($_POST['insertArticleBtn'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $author_id = $_SESSION['user_id'];
    if ($articleObj->createArticle($title, $description, $author_id)) {
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_POST['editArticleBtn'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $article_id = $_POST['article_id'];
    if ($articleObj->updateArticle($article_id, $title, $description)) {
        header("Location: ../articles_submitted.php");
        exit();
    }
}

if (isset($_POST['deleteArticleBtn'])) {
    $article_id = $_POST['article_id'];
    if ($articleObj->deleteArticle($article_id)) {
        $_SESSION['message'] = "Article deleted successfully.";
        $_SESSION['status'] = '200';
    } else {
        $_SESSION['message'] = "Failed to delete the article.";
        $_SESSION['status'] = '400';
    }
    // No need to redirect here, an AJAX call would handle this better
    // For now, it will simply set a message.
}
?>