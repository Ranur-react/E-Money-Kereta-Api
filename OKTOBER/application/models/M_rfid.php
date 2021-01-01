<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_rfid extends CI_Model
{
    private $_table = "tb_angka";
    public $tgl;
    public $no;
    public $id_card;
    public $nama;
    public $value;


    function get_data()
    {
        return $this->db->query("SELECT * FROM tb_angka");
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no" => $id])->row();
    }

    /*public function save()
    {
        
        $post = $this->input->post();
        $this->tgl = tgl('Y-m-d');
        $this->id_card = $post["id_card"];
        $this->nama = $post["nama"];
        $this->value = $post["value"];
        $this->db->insert($this->_table, $this);
    }
*/
    public function update()
    {
        $post = $this->input->post();
        $this->tgl = date('Y-m-d');
        $this->id_card = $post["id_card"];
        $this->nama = $post["nama"];
        $this->value = $post["value"];
        $this->db->update($this->_table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_card" => $id));
    }
}