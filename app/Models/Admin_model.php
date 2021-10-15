<?php namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model{
	protected $table 		= 'admin';
	protected $primaryKey 	= 'id';
	protected $allowedFields = ['email'];

	// Listing
	public function listing(){
		$this->select('*');
		$this->orderBy('id','DESC');
		$query = $this->get();
		return $query->getResultArray();
	}

	//Tambah
	public function tambah($data){
		$this->save($data);
	}

	//Detail
	public function detail($id){
		$this->select('*');
		$this->where(array('id' => $id));
		$query = $this->get();
		return $query->getRowArray();
	}

	// Edit
	public function edit($data){
		$this->where('id',$data['id']);
		$this->replace($data);
	}

	// Delete
	public function hapus($id){
		$this->where('id',$id);
		$this->delete();
	}

    // Check Email
	public function check_user($username){
		$this->select('*');
		$this->where(['username' => $username]);
		$query = $this->get();
		return $query->getRowArray();
	}
}