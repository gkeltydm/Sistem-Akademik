<?php 
class Pelanggaran_model extends CI_Model{
    public function tampil_data($table){
        return $this->db->get($table);
    }

    public function ambil_detail_pelanggaran_by_id($id){
        $result = $this->db->where('id',$id)->get('mahasiswa');
        if ($result->num_rows() > 0) {
            return $result->result();
        }
    }

    public function ambil_detail_pelanggaran_by_nim($nim){
        $result = $this->db->where('nim',$nim)->get('mahasiswa');
        if ($result->num_rows() > 0) {
            return $result->result();
        }
    }

    public function get_pelanggaran() {
        return $this->db->get('pelanggaran')->result();
    }

    public function get_profil_mahasiswa($id_mahasiswa) {
        $query = $this->db->query("SELECT * FROM mahasiswa WHERE id = $id_mahasiswa");
        var_dump($query->result());
        return $query->row();
    }

    public function insert_data($data,$table){
        $this->db->insert($table, $data);
    }

    public $table = 'pelanggaran';
    public $id = 'id';

    public function get_by_id($id){
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    public function pelanggaran_hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('pelanggaran');
        return $this->db->affected_rows() > 0;
    }

    public function cek_pelanggaran_exists($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pelanggaran');
        return $query->num_rows() > 0;
    }

    public function get_pelanggaran_by_id($id_pelanggaran) {
        $this->db->where('id', $id_pelanggaran);
        $query = $this->db->get('pelanggaran');

        return $query->row();
    }

    public function pelanggaran_update($id, $data) {
        $this->db->where('pelanggaran', $id);
        $this->db->update('pelanggaran', $data);
    }
}
?>