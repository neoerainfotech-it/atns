<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{

	public function insertData($table,$data=array())
	{
      $query = $this->db->table($table);
	  $query->insert($data);
	  return $this->db->insertID();
	}
	
		public function batchInsertData($table,$datas=array())
	{
	     $query = $this->db->table($table);
            $query->insertBatch($datas);
             return $this->db->insertID();

	}
	
			public function batchUpdateData($table,$datas=array())
	{
	     $query = $this->db->table($table);
          return  $query->updateBatch($datas,'part_no');
             

	}

	public function updateData($table,$data =array(),$condition= array())
	{
			$query = $this->db->table($table);
			return  $query->update($data, $condition);
		 
	}

	public function deleteData($table,$condition =array())
	{
			$query= $this->db->table($table);
			return  $query->delete($condition);  
	}
	
	// fetch single record
	public function fs($table,$condition= array())
	{
		$query= $this->db->table($table);
		return $query->getWhere($condition)->getrow();
	}


	public function all_fetch($table,$condition= array(),$column = 'id',$sort_order = 'asc',$limit = NULL,$offset = NULL)
	{		
		$query= $this->db->table($table);
		return $query->orderBy($column,$sort_order)->getWhere($condition,$limit,$offset)->getResult();
		
	}

	public function allCount($table,$condition= array())
	{
		$query= $this->db->table($table);
		return $query->where($condition)->countAllResults();
		
	}


	function hasPermission($menu_id){
		$user = $this->fs('admin',array('id'=>session()->get('adminID')));
		$ug = $this->fs('admin_group',array('id'=>$user->user_group_id));
		$permission = json_decode($ug->permission);
		$result = in_array($menu_id,$permission);
		   if($result){
			   return true;
		   }else{
			   return false;
		   }
	   }
	   
	   
	   function permission($url){
	   $link = 'admin/'.$url;
	   $row = $this->fs('menu',array('link'=>$link));    
	   $result = $this->hasPermission($row->id);
		   if($result){
			   return true;
		   }else{
			   return false;
		   }
	   }


}
