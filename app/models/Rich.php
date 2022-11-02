<?php

/**
 * Dit is de model voor de controller Countries
 */

class Rich
{
    //properties
    private $db;

    // Dit is de consttructor van de Richest model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getRichest()
    {
        $this->db->query('SELECT * FROM Richest');
        return $this->db->resultSet();
    }

    public function getRichest($id)
    {
        $this -> db->query("SELECT * FROM Richest WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function deleteRichest($id)
    {
       
        $this->db->query("DELETE FROM Richest WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }


}