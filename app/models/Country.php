<?php

/**
 * Dit is de model voor de controller Countries
 */

class Country
{
    //properties
    private $db;

    // Dit is de consttructor van de Richest model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCountries()
    {
        $this->db->query('SELECT * FROM Richestpeople');
        return $this->db->resultSet();
    }

    public function getCountry($id)
    {
        $this -> db->query("SELECT * FROM Richestpeople WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function deleteCountry($id)
    {
       
        $this->db->query("DELETE FROM Richestpeople WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }


}