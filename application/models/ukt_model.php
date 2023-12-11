<?php 

class Ukt_model extends CI_Model{
    public function tampil_data($table){
        return $this->db->get($table);
    }

    public function insert_data($data, $table){
        $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function cek_ukt_exists($id_mahasiswa) {
        // Check if the ukt entry exists
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $query = $this->db->get('ukt');

        return $query->num_rows() > 0;
    }

    public function hapus_ukt($id_ukt) {
        // Delete the ukt entry
        $this->db->where('id_ukt', $id_ukt);
        $this->db->delete('ukt');
    }

    public $table = 'ukt';
    public $id = 'id_ukt';

    public function get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    public function get_ukt_by_id($id_mahasiswa) {
        // Retrieve ukt data by ukt ID
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $query = $this->db->get('ukt');

        return $query->row();
    }

    public function update_ukt($id_ukt, $data) {
        // Update the ukt entry
        $this->db->where('id_ukt', $id_ukt);
        $this->db->update('ukt', $data);
    }

    public function update_ukt_user($id_ukt, $data) {
        // Update the ukt entry
        $this->db->where('id_ukt', $id_ukt);
        $this->db->update('ukt', $data);
    }

    public function get_belum_lunas_by_id($id_mahasiswa) {
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->where('status_ukt', 'Belum Lunas');
        return $this->db->get('ukt')->result();
    }
}
