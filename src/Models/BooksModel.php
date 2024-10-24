<?php

namespace App\Models;

use PDO;

class BooksModel
{

    protected PDO $db;

   public function __construct(PDO $db)
   {
       $this->db = $db;
   }


    public function getBooks(): array
    {
        $query = $this->db->prepare("SELECT * FROM `books` INNER JOIN `authors` ON `books`.`author_id` = `authors`.`id`");
        $query->execute();

        $books = $query->fetchAll();
        return $books;
    }
}