<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voucher extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Voucher_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'voucher?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'voucher?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'voucher';
            $config['first_url'] = base_url() . 'voucher';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Voucher_model->total_rows($q);
        $voucher = $this->Voucher_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'voucher_data' => $voucher,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Voucher';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Voucher' => '',
        ];

        $data['page'] = 'voucher/voucher_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Voucher_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_voucher' => $row->id_voucher,
                'username' => $row->username,
                'password' => $row->password,
                'status' => $row->status,
                'masa_aktif' => $row->masa_aktif,
            );
            $data['title'] = 'Voucher';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'voucher/voucher_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('voucher'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('voucher/create_action'),
            'id_voucher' => set_value('id_voucher'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'status' => set_value('status'),
            'masa_aktif' => set_value('masa_aktif'),
        );
        $data['title'] = 'Voucher';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'voucher/voucher_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        // $this->_rules();


        $username = 'user' . random_string('alnum', 8);
        $password = random_string('alnum', 10);
        $date = date('Y-m-d H:i:s');
        $date1 = str_replace('-', '/', $date);
        $tomorrow = date('Y-m-d H:i:s', strtotime($date1 . "+1 days"));
        // var_dump($date);
        // exit;
        $data = array(
            'username' => $username,
            'password' => $password,
            'status' => 1,
            'masa_aktif' => $tomorrow,
        );

        $this->Voucher_model->insert($data);
        $this->session->set_flashdata('success', 'Create Record Success');
        redirect(site_url('voucher'));
    }

    public function update($id)
    {
        $row = $this->Voucher_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('voucher/update_action'),
                'id_voucher' => set_value('id_voucher', $row->id_voucher),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'status' => set_value('status', $row->status),
                'masa_aktif' => set_value('masa_aktif', $row->masa_aktif),
            );
            $data['title'] = 'Voucher';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'voucher/voucher_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('voucher'));
        }
    }

    public function update_action($id)
    {

        $data = array(
            'status' => 0,
        );

        $this->Voucher_model->update($id, $data);
        $this->session->set_flashdata('success', 'Update Record Success');
        redirect(site_url('voucher'));
    }

    public function delete($id)
    {
        $row = $this->Voucher_model->get_by_id($id);

        if ($row) {
            $this->Voucher_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('voucher'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('voucher'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Voucher_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('masa_aktif', 'masa aktif', 'trim|required');

        $this->form_validation->set_rules('id_voucher', 'id_voucher', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function printdoc()
    {
        $data = array(
            'voucher_data' => $this->Voucher_model->get_all(),
            'start' => 0
        );
        $this->load->view('voucher/voucher_print', $data);
    }

    public function cetak($id)
    {
        $row = $this->Voucher_model->get_by_id($id);

        $data = array(
            'id_voucher' => $row->id_voucher,
            'username' => $row->username,
            'password' => $row->password,
            'status' => $row->status,
            'masa_aktif' => $row->masa_aktif,
        );
        $data['title'] = 'Voucher';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $this->load->view('cetak_voucher', $data);
    }
}

/* End of file Voucher.php */
/* Location: ./application/controllers/Voucher.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-06 08:06:27 */
/* http://harviacode.com */