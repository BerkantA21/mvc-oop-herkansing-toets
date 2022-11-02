<?php

class Richest extends Controller
{
    // properties
    private $richestModel;

    // dit is de constructor van de controller
    public function __construct()
    {
        $this->richModel = $this->model('Rich');
    }

    public function index()
    {
        $records = $this->richModel->getRichest();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>$items->Name</td>
                        <td>$items->Networth</td>
                        <td>$items->MyAge</td>
                        <td>$items->Company</td>
                        <td><a href='" . URLROOT . "/richest/delete/$items->Id'>Delete</a></td>
                    </tr>";
        }

        $data = [
            'title' => "De vijf rijkste mensen ter wereld",
            'rows' => $rows,
            'Hallo' => "",
            'description' => "Hier zijn de top 5 rijkste mensen ter wereld",
            'onzin' => ""
        ];

        $this->view('richest/index', $data);
    }

    public function update($id = null)
    {

        //Controleer of er gepost wordt vanuit de view update.php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Maak het $_POST array schoon
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->richModel->updaterich($_POST);

            header("Location: " . URLROOT . "/rich/index");
        }


        $record = $this->richestModel->getRichest($id);
        var_dump($record);


        $data = [
                'title' => 'Update Landen',
                'Id' => $record->Id,
                'name'=> $record->Name,
                'Networth'=> $record->Networth,
                'MyAge'=> $record->Myage,
                'Company'=> $record->Company
        ];
        
        $this->view('richest/update', $data);
    }

    public function delete($id)
    {
        $result = $this->richModel->deleterich($id);
        //var_dump($result);
        if ($result) {
            echo "Het record is verwijderd uit de database";
            header("Refresh: 3; URL=" . URLROOT . "/richest/index");
        } else {
            echo "Internal servererror, het record is niet verwijderd";
            header("Refresh: 3; URL=" . URLROOT . "/richest/index");
        }
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            // $_POST array schoonmaken
            filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->richModel->createrich($_POST);

            if ($result) {
                echo "Het invoeren is gelukt";
                header("Refresh:3; ULR=" . URLROOT . "/richest/index");    
            } else {
                echo "Het invoeren is NIET gelukt";
                header("Refresh:3; ULR=" . URLROOT . "/richest/index");  
            }

        }

        $data = [
            'title' => 'Voeg een nieuw rijk persoon toe',
        ];
        $this->view('richest/create', $data);
    }
}