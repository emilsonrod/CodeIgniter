<?php

class Csv extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('csv_model');
        $this->load->library('csvimport');
    }

    function index() {
        if(isset($this->session->userdata['usuario'])){
            $data2['tareas']=$this->session->userdata('tareas');
            $this->load->view('viewCabeceraLogginDocente');
            $data['addressbook'] = $this->csv_model->get_addressbook();
            $this->load->view('csvindex', $data);
            $this->load->view('viewDerecha');
            $this->load->view('viewPiePagina');
        }
    }

    function importcsv() {
        $data['addressbook'] = $this->csv_model->get_addressbook();
        $data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '100';

        $this->load->library('upload', $config);


        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('viewCabecera');
            $this->load->view('viewPiePagina');
        } else {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
            
            $this->load->view('csvindex', $data);
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'nombre'=>$row['nombre'],
                        'apellidoM'=>$row['apellidoM'],
                        'apellidoP'=>$row['apellidoP'],
                        'loggin'=>$row['loggin'],
                        'passw'=>'AAaa11',
                    );
                    $this->csv_model->insert_csv($insert_data);
                }
                $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
                redirect(base_url().'csv');
                //echo "<pre>"; print_r($insert_data);
            } else 
                $data['error'] = "Error occured";
                $this->load->view('csvindex', $data);
            }
            
        } 

}
/*END OF FILE*/
