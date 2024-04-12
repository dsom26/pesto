<?php
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        $this->CI =& get_instance();
        $this->CI->load->model('Api_Model');
    }

    public function testGetAllTasks()
    {
        $tasks = $this->CI->Api_Model->get_all_tasks();
        $this->assertIsArray($tasks);
        // Add additional assertions as needed
    }

    public function testCreateTask()
    {
        $data = array(
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'status' => 'To Do',
            'assigned_to' => 20
        );
        $id = $this->CI->Api_Model->create_task($data);
        $this->assertIsInt($id);
        // Add additional assertions as needed
    }

    public function testUpdateTask()
    {
        $taskId = 1; // Assuming a task with ID 1 exists in the database
        $data = array(
            'title' => 'Updated Task',
            'description' => 'This task has been updated',
            'status' => 'Done',
            'assigned_to' => 20,
            'id' => 11
        );
        $result = $this->CI->Api_Model->update_task($taskId, $data);
        $this->assertEquals(1, $result);
        // Add additional assertions as needed
    }

    public function testDeleteTask()
    {
        $taskId = 1; // Assuming a task with ID 1 exists in the database
        $result = $this->CI->Api_Model->delete_task($taskId);
        $this->assertEquals(1, $result);
        // Add additional assertions as needed
    }
}