<?php

class MY_Loader extends CI_Loader {

    public function template($template_name, $vars = array(), $return = FALSE)
    {
        $this->view('templates/header', $vars, $return);
        $this->view($template_name, $vars, $return);
        $this->view('templates/footer', $vars, $return);
    }
}