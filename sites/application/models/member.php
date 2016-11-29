<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member extends CI_Model  {


	public function user_login($email,$pwd){

        $this->load->database();
        $this->load->library('session');

        try {
            $db = new PDO($this->db->dsn, $this->db->username, $this->db->password, $this->db->options);
            $sql = $db->prepare("select * from memberLogin where memberEmail = :Email and RoleID=2");
            $sql->bindValue(":Email", $email);
            $sql->execute();
            $row = $sql->fetch();

            if ($row != null) {
                $hashedPassword = md5($pwd . $row["memberKey"]);

                if ($hashedPassword == $row["memberPassword"]) {
                   $this ->session->set_userdata(array("UID"=>$row["memberID"]));
                   return false;
                } else {
                    return false;
                }
            } else {
                return false;
            }

            $sql = null;
            $db = null;
        } catch (PDOException $e) {
           return false;
        }
    }

}
