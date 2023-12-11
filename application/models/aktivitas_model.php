<?php 
class Aktivitas_model extends CI_Model{
    public function tampil_data($table){
        return $this->db->get($table);
    }

    public function ambil_detail_aktivitas_by_id($id){
        $result = $this->db->where('id',$id)->get('mahasiswa');
        if ($result->num_rows() > 0) {
            return $result->result();
        }
    }

    public function ambil_detail_aktivitas_by_nim($nim){
        $result = $this->db->where('nim',$nim)->get('mahasiswa');
        if ($result->num_rows() > 0) {
            return $result->result();
        }
    }

    public function get_aktivitas() {
        return $this->db->get('aktivitas')->result();
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

    public $table = 'aktivitas';
    public $id = 'id';

    public function get_by_id($id){
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    public function aktivitas_hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('aktivitas');
        return $this->db->affected_rows() > 0;
    }

    public function cek_aktivitas_exists($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('aktivitas');
        return $query->num_rows() > 0;
    }

    public function get_aktivitas_by_id($id_aktivitas) {
        $this->db->where('id', $id_aktivitas);
        $query = $this->db->get('aktivitas');

        return $query->row();
    }

    public function aktivitas_update($id, $data) {
        $this->db->where('aktivitas', $id);
        $this->db->update('aktivitas', $data);
    }
}
?>