<?php

class Csv extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('csv_model');
        $this->load->library('csvimport');
        $this->load->helper('form');        
        $this->load->library('form_validation');
    }

    function index() {
        if(isset($this->session->userdata['usuario'])){
            $this->form_validation->set_rules('userfile', 'Archivo', 'trim|requerid');
            if (empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile', 'archivo', 'required');
            }

            $this->form_validation->set_message('required', 'El campo %s es obligatorio');

            if ($this->form_validation->run() == FALSE)
            {                     
                $this->load->view('viewCabeceraLogginDocente');
                $data['addressbook'] = $this->csv_model->get_addressbook();
                $data['error'] = '';
                $this->load->view('csvindex', $data);
                $this->load->view('viewDerecha');
                $this->load->view('viewPiePagina');
            }else{
                $data['addressbook'] = $this->csv_model->get_addressbook();
                $data['error'] = '';    //initialize image upload error array to empty

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'csv';
                $config['max_size'] = '10240';

                $this->load->library('upload', $config);


                // If upload failed, display error
                if (!$this->upload->do_upload()) {
                    $tipo_archivo = $_FILES['userfile']['type']; 
                    if (!(strpos($tipo_archivo, "csv")))
                     {
                        $errores = "El tipo de archivo no es correcto, Ingrese un archivo csv por favor";
                     }
                    else{
                        if ($_FILES['userfile']['size'] > 10485760)
                        {
                            $errores = "EL tamanio permitido es 10Mb.";
                        }
                    }
                    
                       $error = array('error' => $errores);
                       $this->load->view('viewCabeceraLogginDocente');
                       $data['addressbook'] = $this->csv_model->get_addressbook();
                       $data['error'] = $errores;
                       $this->load->view('csvindex', $data);
                       $this->load->view('viewDerecha');
                       $this->load->view('viewPiePagina');
                    /*$data['error'] = $this->upload->display_errors();

                    $this->load->view('viewCabeceraLogginDocente');

                    $this->load->view('viewPiePagina');*/
                }else {
                    $file_data = $this->upload->data();
                    $file_path =  './uploads/'.$file_data['file_name'];
                    
                    $this->load->view('csvindex', $data);
                    try
                    {
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
                                $verificar = $this->csv_model->insert_csv($insert_data);
                                if($verificar){
                                    $this->session->set_flashdata('success', 'Los estudiantes fueron ingresados exitosamente');
                                    redirect(base_url().'csv');
                                }
                                else{
                                    $errores = "EL archivo nos  epudo ingresar, Por favor verifique el ofrmato de los datos y los nombres de columnas.";
                                    $this->load->view('viewCabeceraLogginDocente');
                                    $data['addressbook'] = $this->csv_model->get_addressbook();
                                    $data['error'] = $errores;
                                    $this->load->view('csvindex', $data);
                                    $this->load->view('viewDerecha');
                                    $this->load->view('viewPiePagina');
                                }
                            }
                            /*$this->session->set_flashdata('success', 'Los estudiantes fueron ingresados exitosamente');
                            redirect(base_url().'csv');*/
                            //echo "<pre>"; print_r($insert_data);
                        } else {
                            $data['error'] = "Error occured";
                            $this->load->view('csvindex', $data);
                        }
                    }catch(Exception $ex){
                        echo "0";
                        echo '<script>window.alert("Ocurrio un error al subir el documento");location.href="../SubirDocDocente";</script>';
                    }
                }
            }
        }
    }
}
/*END OF FILE*/