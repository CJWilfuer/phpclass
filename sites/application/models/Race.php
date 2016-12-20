<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Race extends CI_Model  {


    public function get_races(){

        $this->load->database();


        try {
            $query = $this->db->get('race');
            return $query->result_array();

        } catch (PDOException $e) {

        }
    }


    public function delete_race($id)
    {
        $this->load->database();

        try
        {
            $data = array('raceID'=>$id);
             $this->db->delete('race',$data);
            redirect('admin/manage_marathon',"refresh");

        } catch (PDOException $e) {

        }
    }

    public function add_race($name,$date, $location,$description){

        $this->load->database();
        try {
            $data = array('raceName'=>$name,'raceDateTime'=>$date, 'RaceLocation'=> $location, 'raceDiscription'=>$description) ;
            $query = $this->db->insert('race',$data);
        } catch (PDOException $e) {

        }
    }
}
