<?php 
class Bank_model extends CI_Model{
    public function getBank($id = null) {
        if($id != ''){
            return $this->db->get_where('bank', array('id' => $id))->result();
        }else{
            return $this->db->get('bank')->result();
        }
    }
 	public function tambahDataBank($data){
        $this->db->insert('bank', $data);
        return $this->db->affected_rows();
    }
    public function hapusDataBank($id){
        $this->db->where("id = $id");
        return $this->db->delete('bank');
     }
    public function ubahDataBank($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('bank', $data);
    }
}