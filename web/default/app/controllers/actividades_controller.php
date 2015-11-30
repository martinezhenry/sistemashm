<?php

class ActividadesController extends AppController {
 
    public function index() 
    {
        //Ver método select[1]
        View::select('main'); //no mostramos la vista, solo el template
    }
}