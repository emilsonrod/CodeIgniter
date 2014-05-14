<?php
class Formularios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->view("formulario_view.php");
    }
}
?>
