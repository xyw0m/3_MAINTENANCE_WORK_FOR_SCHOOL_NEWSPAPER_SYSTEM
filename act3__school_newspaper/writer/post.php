<?php
// Post.php - Represents a single blog post.

class Post {
    private $id;
    private $title;
    private $content;
    private $image_url;
    private $username;
    private $is_admin;
    private $created_at;

    public function __construct(
        $id,
        $title,
        $content,
        $image_url,
        $username,
        $is_admin,
        $created_at
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image_url = $image_url;
        $this->username = $username;
        $this->is_admin = $is_admin;
        $this->created_at = $created_at;
    }

    // Getter methods for all properties.
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return htmlspecialchars($this->title);
    }

    public function getContent() {
        return htmlspecialchars($this->content);
    }

    public function getImageUrl() {
        return htmlspecialchars($this->image_url);
    }

    public function getUsername() {
        return htmlspecialchars($this->username);
    }

    public function isAdmin() {
        return $this->is_admin;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }
}