<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Documento extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Documento_model');
    }

    public function procesar_subida()
    {
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'tipoDocumento',
                'label' => 'Tipo de Documento',
                'rules' => 'required'
            ),
            array(
                'field' => 'titulo',
                'label' => 'Título del Documento',
                'rules' => 'required'
            ),
            array(
                'field' => 'maestro',
                'label' => 'Maestro',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);

        
        $data['maestros'] = $this->Documento_model->obtener_maestros();

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            
            $tipoDocumento = $this->input->post('tipoDocumento');
            $titulo = $this->input->post('titulo');
            $maestro_id = $this->input->post('maestro');

            // Configuración de subida de archivo
            $config['upload_path'] = './uploads/documentos/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['file_name'] = $titulo . '_' . time(); // Cambia el nombre del archivo según tus necesidades

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('archivo')) {
                echo $this->upload->display_errors();
            } else {
                $data = $this->upload->data();
                $nombreArchivo = $data['file_name'];

                $this->Documento_model->guardar_documento($tipoDocumento, $titulo, $nombreArchivo, $maestro_id);

            }
        }

        redirect('Alumno/Dashboard_A/Dashboard');
    }


    public function mostrar_documentos()
    {
        $data['archivos'] = $this->Documento_model->obtener_todos_archivos();
        $this->load->view('Alumno/Archivos', $data);
    }

    public function mostrarModalRechazo($idDocumento)
    {
        $data['documento'] = $this->Documento_model->obtener_documento_por_id($idDocumento);
        $this->load->view('modal_rechazo', $data);
    }

    public function procesar_rechazo()
    {
        $idDocumento = $this->input->post('idDocumento');
        $motivoRechazo = $this->input->post('motivo');

        if (empty($motivoRechazo)) {
            echo 'Por favor, proporciona un motivo de rechazo.';
            return;
        }

        $this->load->model('Documento_model');
        $this->Documento_model->procesar_rechazo_documento($idDocumento, $motivoRechazo);

        redirect('Maestro/Dashboard_M/InicioA');
    }

    public function resumen()
    {
        $this->load->model('Documentos_model');

        $data['nombreUsuario'] = $this->session->userdata('nombre_usuario');

        $data['resumenGeneral'] = $this->Documentos_model->obtenerResumenGeneral();

        $data['documentosRecientes'] = $this->Documentos_model->obtenerDocumentosRecientes();

        $this->load->view('Inicio', $data);
    }

    public function eliminar($documento_id)
    {

        $documento_id = (int) $documento_id;
        $this->load->model('Documento_model');
        $documento = $this->Documento_model->obtener_documento_por_id($documento_id);
        if ($documento) {
            $ruta_del_archivo = FCPATH . 'uploads/documentos/' . $documento['archivo_path'];
            if (file_exists($ruta_del_archivo)) {

                unlink($ruta_del_archivo);
            }
            $this->Documento_model->eliminarDocumento($documento_id);
            redirect('Alumno/Dashboard_A/Dashboard');
        } else {

        }
    }

    public function aceptarDocumento($idDocumento)
    {
        $comentario = $this->input->post('motivo');

        $this->load->model('Documento_model');
        $this->Documento_model->aceptarDocumento($idDocumento, $comentario);

        redirect('Maestro/Dashboard_M/InicioA');
    }

    public function agregar_tipo_documento() {
        $nombreTipoDocumento = $this->input->post('nombreTipoDocumento');

       
        $this->Documento_model->agregarTipoDocumento($nombreTipoDocumento);

        
    }

}
