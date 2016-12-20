<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function index()
	{

	    $data=array('dashboard'=>'true');
		$this->load->view('admin/dashboard',$data);
	}
    public function manage_marathon()
    {
        $this->load->model('Race');
        $data=array('manage_marathon'=>'true');
        $data['races']= $this->Race->get_races();
        $this->load->view('admin/manage_marathon',$data);
    }
    public function add_race()
    {
        $this->load->model('Race');
        $this->Race->add_race($this->input->Post('txtName'),($this->input->Post('txtDate')),($this->input->Post('txtLocation')),($this->input->Post('txtDescription')));

        redirect('admin/manage_marathon',"refresh");
    }

    public function delete_race($id)
    {
        $this->load->model('Race');
        $this->Race->delete_race($id);
        redirect('admin/manage_marathon',"refresh");
    }

    public function add_marathons()
    {
        $data=array('add_marathons'=>'true');
        $this->load->view('admin/add_marathons',$data);
    }
    public function manage_runners()
    {
        $data=array('manage_runners'=>'true');
        $this->load->view('admin/manage_runners',$data);
    }
    public function registration_form()
    {
        $data=array('registration_form'=>'true');
        $this->load->view('admin/registration_form',$data);
    }

}
