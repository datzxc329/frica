<?php
class Category
{
    public $idLSP;
    public $name;


    function __construct($idLSP, $name)
    {
        $this->idLSP = $idLSP;
        $this->name = $name;
    }

    static function searchWithCategoryName($name)
    {
        try {
            $db = DB::getInstance();
            $sql = 'SELECT p.* 
              FROM product p
              INNER JOIN category c ON p.idLSP = c.idLSP
              WHERE c.name LIKE :name';
            $req = $db->prepare($sql);
            $req->execute(array('name' => $name));
            $items = $req->fetchAll();
            return $items;
        } catch (PDOException $e) {
            throw $e;
        }
    }

}





