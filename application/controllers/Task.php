<?php


class Task extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_regenerate_id();

        $this->load->model('task_model');
        $this->load->model('api_model');

        if (!$this->session->userdata('user_id')) {
            redirect('login/logout');
        }

    }

    public function index()
    {
        $type = intval($this->uri->segment(3));

        // API call
        $url = $this->config->item('api_url') . 'get_tasks/' . $type;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($curl);

        // Check for errors
        if ($response === FALSE) {
            $error_message = curl_error($curl);
            // Handle error
            echo "cURL Error: " . $error_message;
        } else {
            // Request was successful, handle response
            $response = json_decode($response, true);
            if (isset($response['tasks'])) {
                $data['task_arr'] = $response['tasks'];
            } else {
                $data['task_arr'] = [];
            }

        }
        curl_close($curl);

        $subTitle = 'All';
        $task_status_arr = $this->config->item('task_status_arr');
        switch ($type) {
            case 1:
                $subTitle = $task_status_arr[0];
                break;
            case 2:
                $subTitle = $task_status_arr[1];
                break;
            case 3:
                $subTitle = $task_status_arr[2];
                break;
        }

        $data['title'] = 'Task List (' . $subTitle . ')';
        $data['module_name'] = 'Task';

        $this->load->view('templates/header', $data);
        $this->load->view('task/index', $data);
        $this->load->view('templates/footer');

    } // index

    public function create()
    {
        $data['title'] = 'Add Task';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[To Do,In Progress,Done]');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {

            // API call to get Users
            $url = $this->config->item('api_url') . 'get_users';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($curl);


            // Check for errors
            if ($response === FALSE) {
                $error_message = curl_error($curl);
                // Handle error
                echo "cURL Error: " . $error_message;
            } else {
                // Request was successful, handle response
                $response = json_decode($response, true);
                if (isset($response['users'])) {
                    $data['users_arr'] = $response['users'];
                } else {
                    $data['users_arr'] = [];
                }

            }
            curl_close($curl);
            $this->load->view('templates/header', $data);
            $this->load->view('task/create', $data);
            $this->load->view('templates/footer');

        } else {

            // API Call to create task

            $url = $this->config->item('api_url') . 'create_task';
            $post_data = array(
                'title' => trim(addslashes(strip_tags($this->input->post('title')))),
                'description' => trim(addslashes(strip_tags($this->input->post('description')))),
                'status' => trim(addslashes(strip_tags($this->input->post('status')))),
                'assigned_to' => intval($this->input->post('assigned_to'))
            );

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($curl);


            // Check for errors
            if ($response === FALSE) {
                $error_message = curl_error($curl);
                // Handle error
                echo "cURL Error: " . $error_message;
            } else {
                // Request was successful, handle response
                $response = json_decode($response, true);
                if ($response['status'] == 'success' && $response['task_id'] > 0) {
                    $this->session->set_flashdata('task_success', 'Task Created Successfully');
                } else {
                    $this->session->set_flashdata('task_error', 'Error! while creating Task');
                }

            }
            curl_close($curl);
            redirect(base_url() . 'task');
        }

    } // create

    public function edit()
    {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $data['title'] = 'Edit Task';
        $data['task_arr'] = $this->task_model->get_task_by_id($id);
        $data['taskId'] = $id;

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[To Do,In Progress,Done]');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {

            // API call to get Users
            $url = $this->config->item('api_url') . 'get_users';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($curl);

            // Check for errors
            if ($response === FALSE) {
                $error_message = curl_error($curl);
                // Handle error
                echo "cURL Error: " . $error_message;
            } else {
                // Request was successful, handle response
                $response = json_decode($response, true);
                if (isset($response['users'])) {
                    $data['users_arr'] = $response['users'];
                } else {
                    $data['users_arr'] = [];
                }

            }
            curl_close($curl);


            $this->load->view('templates/header', $data);
            $this->load->view('task/edit', $data);
            $this->load->view('templates/footer');


        } else {
            // API Call to create task

            $url = $this->config->item('api_url') . 'update_task';
            $post_data = array(
                'title' => trim(addslashes(strip_tags($this->input->post('title')))),
                'description' => trim(addslashes(strip_tags($this->input->post('description')))),
                'status' => trim(addslashes(strip_tags($this->input->post('status')))),
                'assigned_to' => intval($this->input->post('assigned_to')),
                'id' => $id
            );

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($curl);


            // Check for errors
            if ($response === FALSE) {
                $error_message = curl_error($curl);
                // Handle error
                echo "cURL Error: " . $error_message;
            } else {
                // Request was successful, handle response
                $response = json_decode($response, true);
                if ($response['status'] == 'success' && $response['task_id'] > 0) {
                    $this->session->set_flashdata('task_success', 'Task Updated Successfully');
                } else {
                    $this->session->set_flashdata('task_error', 'Error! while updating Task');
                }

            }
            curl_close($curl);
            redirect(base_url() . 'task');
        }
    } // edit

    public function delete()
    {
        $id = intval($this->uri->segment(3));
        if (empty($id)) {
            show_404();
        }

        if ($id > 0) {

            // API call
            $url = $this->config->item('api_url') . 'delete_task/';
            $post_data = array(
                'id' => $id,
                'param2' => 'value2'
            );

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($curl);


            // Check for errors
            if ($response === FALSE) {
                $error_message = curl_error($curl);
                // Handle error
                echo "cURL Error: " . $error_message;
            } else {
                // Request was successful, handle response
                $response = json_decode($response, true);
                if ($response['status'] == 'success' && $response['deleted_rows'] > 0) {
                    $this->session->set_flashdata('task_success', 'Task Deleted Successfully');
                } else {
                    $this->session->set_flashdata('task_error', 'Error! while deleting Task');
                }

            }
            curl_close($curl);



        } else {
            $this->session->set_flashdata('task_error', 'Error! while deleting Task');
        }

        redirect(base_url() . 'task');

    } // delete


}