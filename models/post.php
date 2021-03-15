<?php

class Post
{
    // database connections details
    private $conn;
    private $table = 'posts';

    // Post properties
    public $id;
    public $category_id;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // contrustor method runs automatically when instantiated

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // methods to get posts
    public function read()
    {
        // create a query
        $query = 'SELECT
        c.name as category_name,
        p.id, p.category_id, p.title, p.body, p.author, p.created_at
                FROM ' . $this->table . ' p
                LEFT JOIN
                categories c ON p.category_id = c.id
                ORDER BY
                p.created_at DESC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();
    }
}
