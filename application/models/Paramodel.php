<?php

class Paramodel extends CI_MODEL {

	public function insert( $table , $data )
	{
		return $this->db->insert($table,$data);
	}

	public function select($table , $column = ('*') , $wh=NULL, $order=NULL,$limit=NULL )
	{
		$this->db->select($column);
		$this->db->from($table);

		if(isset($wh))
		{
			$this->db->WHERE($wh);
		}

		if(isset($order))
		{
			$this->db->order_by('id',$order);
		}

		if(isset($limit))
		{
			$this->db->limit($limit);
		}

		return $this->db->get()->result();
		// $this->db->last_query();
	}

	public function select_setord($table , $column = ('*') , $wh=NULL, $order=NULL )
	{
		$this->db->select($column);
		$this->db->from($table);

		if(isset($wh))
		{
			$this->db->WHERE($wh);
		}

		if(isset($order))
		{
			$this->db->order_by('setord',$order);
		}

		return $this->db->get()->result();
	}

	public function select_asc($table,$order,$wh=NULL)
	{
		$this->db->select('*');
		$this->db->from($table);
		if(isset($wh))
		{
			$this->db->where($wh);
		}
		if($order == "ASC")
		{
			$this->db->order_by('id','ASC');
		}
		return $this->db->get()->result();
	}

	public function query($qry)
	{
		return $this->db->query($qry)->result();
	}

	public function update($table,$data,$wh)
	{
		return $this->db->update($table ,$data, $wh);
	}

	public function delete($table,$wh)
	{
		return $this->db->delete($table,$wh);
	}

	public function wh_select($table,$wh)
	{
		return $this->db->select('*')->where($wh)->get($table)->result();
	}

	public function max($table,$column)
	{
		return $this->db->query("SELECT MAX($column) as max_ord FROM $table")->result();
	}

	public function left_join()
	{
		return $this->db->select('access.*, access-model.m_id')
						 ->from('access')
						 ->join('access-model','access.id = access-model.a_id','left')
						 ->order_by('id','DESC')
						 ->get()->result();
						 
	}

	public function left_join_where($column,$table,$j_table,$match_column,$order,$limit=NULL,$wh=NULL)
	{
		$this->db->select($column)
					 ->from($table)
					 ->join($j_table,$match_column,'left')
					 ->order_by('id',$order);
		if(isset($wh))
		{
			$this->db->where($wh);
		}
		if(isset($limit))
		{
			$this->db->limit($limit);
		}


			return $this->db->get()->result();
			// print_r($this->db->last_query());   
	}

	public function get_one($table,$column,$wh)
	{
		$record = $this->db->select($column)
							->from($table)
							->where($wh)
							->get()
							->result();
		return $record[0]->$column;
		
	}

	public function innerJoin()
	{
		$res = $this->db->select('brand.*')
						->distinct()
						->from('brand')
						->join('access', 'brand.id = access.brand_id')
						->get()
						->result();
		return $res;
	}
}

?>