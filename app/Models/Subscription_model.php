<?php namespace App\Models;

use CodeIgniter\Model;

class Subscription_model extends Model{
	protected $table 		= 'subscription';
	protected $primaryKey 	= 'id_user';
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
	public function check_email($email){
		$this->select('*');
		$this->where(['email' => $email]);
		$query = $this->get();
		return $query->getRowArray();
	}
}