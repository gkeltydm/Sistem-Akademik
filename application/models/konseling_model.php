<?php 
class Konseling_model extends CI_Model{
    public function tampil_data($table){
        return $this->db->get($table);
    }

    public function ambil_detail_konseling_by_id($id) {
        $result = $this->db->where('id', $id)->get('mahasiswa');
        if ($result->num_rows() > 0) {
            return $result->result();
        }
    }    
    

    public function get_konseling() {
        return $this->db->get('konseling')->result();
    }

    public function get_profil_mahasiswa($id_mahasiswa) {
        $query = $this->db->query("SELECT * FROM mahasiswa WHERE id = $id_mahasiswa");
        var_dump($query->result());
        return $query->row();
    }

    public function insert_data($data,$table){
        $this->db->insert($table, $data);
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public $table = 'konseling';
    public $id = 'id';

    public function get_by_id($id){
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    public function konseling_hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('konseling');
        return $this->db->affected_rows() > 0;
    }
    

    public function cek_konseling_exists($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('konseling');
        return $query->num_rows() > 0;
    }

    public function get_konseling_by_id($id_konseling) {
        $this->db->where('id', $id_konseling);
        $query = $this->db->get('konseling');
        return $query->row();
    }

    public function konseling_update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update('konseling', $data);
    }
    
}
?>