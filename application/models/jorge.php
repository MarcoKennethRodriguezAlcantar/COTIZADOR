<<?php

function crearproductos()
    {
        $this->load->model("p_model");
        if ($this->input->post("submit")) {

            //Para subir imagen
            $mi_archivo = 'upload';
            $config['upload_path'] = "assets/img/productos/";
            $config['allowed_types'] = "*";
            $config['max_size'] = "50000";
            $config['max_width'] = "2000";
            $config['max_height'] = "2000";

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($mi_archivo)) {
                //* ocurrio un error
                $data['uploadError'] = $this->upload->display_errors();
                echo $this->upload->display_errors();
                return;
            }

            $data['uploadSuccess'] = $this->upload->data();

            //Se consigue en una variable el nombre del archivo que se subio al servidor
            $img = $data['uploadSuccess']['file_name'];
            //llamo al metodo add
            $añadir = $this->p_model->crearproductos(
                $this->input->post("titulo_producto"),
                $this->input->post("des_producto"),
                $this->input->post("correo_producto"),
                $this->input->post("telefono_producto"),
                $img
            );
        }
        if ($añadir == true) {
            //Sesion de una sola ejecución
            //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Empresa Añadida Correctamente.</div>');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Muy bien! </strong>  <br>El producto se creo correctamente. </div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Error! </strong>  <br>El producto no se ha añadido. </div>');
            // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Empresa no se ha añadido o ya existe.</div>');
        }

        //redirecciono la pagina a la url por defecto
        redirect(base_url('user/productos'));
    }


?>