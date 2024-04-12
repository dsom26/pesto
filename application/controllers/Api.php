<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_Model'); // Load the model for tasks
    }

    // API endpoint to get all tasks
    public function get_tasks()
    {
        $type = intval($this->uri->segment(3));
        if ($type < 0 || $type > 3) {
            $response = array(
                'status' => 'error',
                'message' => 'Task Type should be within 0 to 3'
            );
        } else {
            $task_status_arr = $this->config->item('task_status_arr');

            $status = '';
            switch ($type) {
                case 1:
                    $status = $task_status_arr[0];
                    break;
                case 2:
                    $status = $task_status_arr[1];
                    break;
                case 3:
                    $status = $task_status_arr[2];
                    break;
            }
            $tasks = $this->Api_Model->get_all_tasks($status);
            if (count($tasks) > 0) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Task list retrieved successfully',
                    'tasks' => $tasks
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'No Task Data Found'
                );
            }
        }

        echo json_encode($response);
    } // get_tasks

    // API endpoint to create a new task
    public function create_task()
    {
        // Set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[To Do,In Progress,Done]');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Return validation errors
            $errors = validation_errors();
            $response = array(
                'status' => 'error',
                'message' => $errors
            );
            echo json_encode($response);
            return;
        }

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
            'assigned_to' => $this->input->post('assigned_to'),
            'ip_address' => $this->input->ip_address(),
            'insert_date_time' => date('Y-m-d H:i:s')
        );
        $result = $this->Api_Model->create_task($data);

        if ($result !== false) {
            // Task created successfully
            $response = array(
                'status' => 'success',
                'message' => 'Task created successfully',
                'task_id' => $result
            );

        } else {
            // Error occurred while creating task
            $response = array(
                'status' => 'error',
                'message' => 'Failed to create task'
            );

        }
        echo json_encode($response);
    } // create_task

    // API endpoint to update an existing task
    public function update_task()
    {
        $id = intval($this->input->post('id'));
        if ($id > 0) {

            // Set validation rules
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required|in_list[To Do,In Progress,Done]');
            $this->form_validation->set_rules('assigned_to', 'Assigned To', 'required|numeric');

            if ($this->form_validation->run() == FALSE) {
                // Return validation errors
                $errors = validation_errors();
                $response = array(
                    'status' => 'error',
                    'message' => $errors
                );
                echo json_encode($response);
                return;
            }

            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status'),
                'assigned_to' => $this->input->post('assigned_to')
            );
            $result = $this->Api_Model->update_task($id, $data);

            if ($result !== false) {
                // Task updated successfully
                $response = array(
                    'status' => 'success',
                    'message' => 'Task updated successfully',
                    'task_id' => $result
                );

            } else {
                // Error occurred while creating task
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to update task'
                );
            }

        } else {
            $response = [];
        }

        echo json_encode($response);
    } // update_task

    // API endpoint to delete a task
    public function delete_task()
    {
        $id = intval($this->input->post('id'));
        if ($id > 0) {
            $result = $this->Api_Model->delete_task($id);

            // Task updated successfully
            $response = array(
                'status' => 'success',
                'message' => 'Task deleted successfully',
                'deleted_rows' => $result
            );

        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Task deletion failed'
            );

        }
        echo json_encode($response);

    } // delete_task

    // API endpoint to get all users
    public function get_users()
    {
        $users = $this->Api_Model->get_all_users();
        if (count($users) > 0) {
            $response = array(
                'status' => 'success',
                'message' => 'User list retrieved successfully',
                'users' => $users
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'No User Data Found'
            );
        }
        echo json_encode($response);
    } // get_users
}