<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
        $this->load->helper('form');
		$this->load->view('public/home');
	}

    public function login(){

       $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name','User Name', 'trim|required|valid_email');
        $this->form_validation->set_rules('password','Password', 'trim|required');

        if ($this->form_validation->run()==false){
            $data = array('load_error'=>'true');
            $this->load->view('public/home',$data);
        }else{
            $this->load->model('Member');

            if($this->Member->user_login($this->input->post('user_name'),$this->input->post('password'))){
                $this->load->view('admin/home');
            }else{
                $data = array('load_error'=>'true','error_message'=>'invalid Username or password');
                $this->load->view('public/home',$data);
            }
        }


}

    public  function create(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_email','User Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        $this->form_validation->set_rules('password','Retype Password', 'trim|required');

    }
	/*public function Test($name){

	 echo "This is a test for $name";
    }*/

}
