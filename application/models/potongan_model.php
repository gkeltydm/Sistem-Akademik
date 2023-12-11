<?php 

class Potongan_model extends CI_Model{
    public function tampil_data($table){
        return $this->db->get($table);
}

public function insert_data($data,$table){
$this->db->insert($table, $data);
}

public function update_data($where,$data,$table){

$this->db->where($where);
$this->db->update($table,$data);
}

public function cek_potongan_exists($id_mahasiswa) {
    // Check if the potongan entry exists
    $this->db->where('id_mahasiswa', $id_mahasiswa);
    $query = $this->db->get('potongan');

    return $query->num_rows() > 0;
}

public function hapus_potongan($id_mahasiswa) {
    // Delete the potongan entry
    $this->db->where('id_mahasiswa', $id_mahasiswa);
    $this->db->delete('potongan');
}

public $table = 'potongan';
public $id = 'potongan';

public function get_by_id($id){
    $this->db->where($this->id,$id);
    return $this->db->get($this->table)->row();
}

public function get_potongan_by_id($id_mahasiswa) {
    // Retrieve potongan data by potongan ID
    $this->db->where('id_mahasiswa', $id_mahasiswa);
    $query = $this->db->get('potongan');

    return $query->row();
}

public function update_potongan($id_mahasiswa, $data) {
    // Update the potongan entry
    $this->db->where('id_mahasiswa', $id_mahasiswa);
    $this->db->update('potongan', $data);
}

public function update_potongan_user($id_potongan, $data) {
    // Update the potongan entry
    $this->db->where('id_potongan', $id_potongan);
    $this->db->update('potongan', $data);
}
public function get_belum_lunas_by_id($id_mahasiswa) {
    $this->db->where('id_mahasiswa', $id_mahasiswa);
    $this->db->where('status_potongan', 'UKT BERHASIL DIPOTONG ');
    return $this->db->get('potongan ')->result();
}

}

?>