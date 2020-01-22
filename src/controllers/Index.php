<?php
namespace Controllers;

class Index {

    /**
     * Function To Load Initial Landing Page
     * @return View Model
     */
    public function home() { 
        view('Index/home');
    }

}
