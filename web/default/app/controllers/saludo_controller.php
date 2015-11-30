<?php 

class SaludoController extends AppController {
 
    public $template = 'themecar';
    public function hola() 
    {
        //Ver método select[1]
        View::template('themecar');
        View::select('hola'); //no mostramos la vista, solo el template
    }
}