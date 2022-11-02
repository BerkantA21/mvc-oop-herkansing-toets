<?php

/**
 * Dit is de basecontriller waar alle nieuw te maken controllers van erven.
 */
class Controller
{
    public function Model($model)
    {
        //pad naar modelclass bestand opgeven
        require_once '../app/models/' . $model . '.php';

        //nieuw object van de model
        return new $model();
    }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once('../app/views/' . $view . '.php');
        } else {
            echo ('View bestaaat niet');
        }
    }
}