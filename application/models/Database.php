<?php

class Database extends CI_MODEL 
{

	// CREATE DATABASE FOR PARAGON.
	public function cr_database( $db_name )
	{
		// SQL String: CREATE DATABASE IF NOT EXISTS Library;
		$this->dbforge->create_database($db_name, TRUE);
	}

	// CREATE TABLE FOR USER REGISTRATION FROM
	public function registration($tbl_name,$db_name)
	{
		// switch over to Library DB
		$this->db->query("use $db_name");

		// define table fields
		$fields = array(
		  'id' => array(
		    'type' => 'INT',
		    'constraint' => '',
		    'unsigned' => TRUE,
		    'auto_increment' => TRUE
		  ),
		  'u_name' => array(
		    'type' => 'VARCHAR',
		    'constraint' => 100
		  ),
		  'u_email' => array(
		    'type' => 'VARCHAR',
		    'constraint' => 100,
		    'unique' => TRUE
		  ),
		  'u_password' => array(
		    'type' => 'VARCHAR',
		    'constraint' => 100,
		  ),
		  'u_phone' => array(
		    'type' => 'VARCHAR',
		    'constraint' => 10
		  ),
		  'u_address' => array(
		    'type' => 'text',
		    'constraint' => 300
		  ),
		  'u_pincode' => array(
		    'type' => 'INT',
		    'constraint' => 6
		  ),
		  'u_status' => array(
		    'type' => 'VARCHAR',
		    'asBool' => TRUE,
		    'constraint' => 1
		  ),
		  'u_create_date datetime default current_timestamp',
		);

		$this->dbforge->add_field($fields);

		// define primary key
		$this->dbforge->add_key('id', TRUE);

		// create table
		return $this->dbforge->create_table($tbl_name, TRUE);
	}

	public function add_new_brand($tbl_name,$db_name)
	{
		// switch over to Library DB
		$this->db->query("use $db_name");

		// define table fields
		$fields = array(
		  'id' => array(
		    'type' => 'INT',
		    'constraint' => '',
		    'unsigned' => TRUE,
		    'auto_increment' => TRUE
		  ),
		  'brand_name' => array(
		    'type' => 'VARCHAR',
		    'constraint' => 255
		  ),
		  'brand_description' => array(
		    'type' => 'text',
		  ),
		  'brand_image' => array(
		    'type' => 'text',
		    'constraint' => 50
		  ),
		  'image_path' => array(
		    'type' => 'text',
		    'constraint' => 100
		  ),
		  'slug' => array(
		    'type' => 'VARCHAR',
		    'constraint' => 255
		  ),
		  'setord' => array(
		    'type' => 'INT',
		    'constraint' => 10
		  ),
		  'status' => array(
		    'type' => 'VARCHAR',
		    'asBool' => TRUE,
		    'constraint' => 1
		  ),
		  'u_create_date datetime default current_timestamp',
		);

		$this->dbforge->add_field($fields);

		// define primary key
		$this->dbforge->add_key('id', TRUE);

		// create table
		return $this->dbforge->create_table($tbl_name, TRUE);
	}

	public function add_new_model($tbl_name,$db_name)
	{
		// switch over to Library DB
		$this->db->query("use $db_name");

		// define table fields
		$fields = array(
		  'id' => array(
		    'type' => 'INT',
		    'constraint' => '',
		    'unsigned' => TRUE,
		    'auto_increment' => TRUE
		  ),
		  'brand_id' => array(
		    'type' => 'INT',
		    'constraint' => 11
		  ),
		  'model_type' => array(
		    'type' => 'INT',
		    'constraint' => 11
		  ),
		  'model_name' => array(
		    'type' => 'VARCHAR',
		    'constraint' => 255
		  ),
		  'model_description' => array(
		    'type' => 'text',
		  ),
		  'model_display_image' => array(
		    'type' => 'text',
		  ),
		  'status' => array(
		    'type' => 'VARCHAR',
		    'asBool' => TRUE,
		    'constraint' => 1
		  ),
		  'slug' => array(
		    'type' => 'VARCHAR',
		    'constraint' => 255
		  ),
		  'setord' => array(
		    'type' => 'INT',
		    'constraint' => 10
		  ),
		  'meta_title' => array(
		  	'type' => 'text'
		  ),
		  'meta_descryption' => array(
		  	'type' => 'text'
		  ),
		  'meta_keywords' => array(
		  	'type' => 'text'
		  ),
		'u_create_date datetime default current_timestamp',
		);

		$this->dbforge->add_field($fields);

		// define primary key
		$this->dbforge->add_key('id', TRUE);

		// create table
		return $this->dbforge->create_table($tbl_name, TRUE);
	}

	public function model_image($table)
	{
		$this->db->query("use para");

		$fields = [
			'id'=>['type'=>'INT','constraint' => 11,'unsigned' => TRUE,'auto_increment' => TRUE ],
			'model_id'=>['type'=>'INT','constraint' => 11 ],
			'model_image'=>['type'=>'text' ],
			'u_create_date datetime default current_timestamp',
		];

		$this->dbforge->add_field($fields);

		// define primary key
		$this->dbforge->add_key('id', TRUE);

		// create table
		return $this->dbforge->create_table($table, TRUE);
	}

	public function add_new_access($tbl_name)
	{
		// switch over to Library DB
		$this->db->query("use para");

		// define table fields
		$fields = array(
		  'id' => array(
		    'type' => 'INT',
		    'constraint' => '',
		    'unsigned' => TRUE,
		    'auto_increment' => TRUE
		  ),
		  'brand_id' => array(
		    'type' => 'INT',
		    'constraint' => 11
		  ),
		  'a_type' => array(
		    'type' => 'INT',
		    'constraint' => 11
		  ),
		  'a_name' => array(
		    'type' => 'VARCHAR',
		    'constraint' => 255
		  ),
		  'a_description' => array(
		    'type' => 'text'
		  ),

		  'a_original' => array(
		    'type' => 'float',
		    'constraint' => 10,2
		  ),
		  'a_price' => array(
		    'type' => 'FLOAT',
		    'constraint' => 10,2
		  ),
		  'a_discount' => array(
		    'type' => 'INT',
		    'constraint' => 11
		  ),
		  'a_picture' => array(
		    'type' => 'text',
		  ),
		  'a_kit' => array(
		    'type' => 'TINYINT',
		    'asBool' => TRUE,
		    'constraint' => 1
		  ),
		  'status' => array(
		    'type' => 'VARCHAR',
		    'asBool' => TRUE,
		    'constraint' => 1
		  ),
		  'slug' => array(
		    'type' => 'text',
		    'constraint' => 255
		  ),
		  'setord' => array(
		    'type' => 'INT',
		    'constraint' => 10
		  ),
		  'meta_title' => array(
		  	'type' => 'VARCHAR',
		  	'constraint' => 255
		  ),
		  'meta_descryption' => array(
		  	'type' => 'text'
		  ),
		  'meta_keywords' => array(
		  	'type' => 'text'
		  ),
		'u_create_date datetime default current_timestamp',
		);

		$this->dbforge->add_field($fields);

		// define primary key
		$this->dbforge->add_key('id', TRUE);

		// create table
		return $this->dbforge->create_table($tbl_name, TRUE);
	}

	public function access_image($table)
	{
		$this->db->query("use para");

		$fields = [
			'id'=>['type'=>'INT','constraint' => 11,'unsigned' => TRUE,'auto_increment' => TRUE ],
			'a_id'=>['type'=>'INT','constraint' => 11 ],
			'a_image'=>['type'=>'text' ],
			'u_create_date datetime default current_timestamp',
		];

		$this->dbforge->add_field($fields);

		// define primary key
		$this->dbforge->add_key('id', TRUE);

		// create table
		return $this->dbforge->create_table($table, TRUE);
	}

	public function access_model($table)
	{
		$fields = [
			'id' => [ 'type' => 'INT' , 'constraint' => 11 , 'unsigned'=>TRUE,'auto_increment'=>TRUE ],
			'a_id' => [ 'type' => 'INT' , 'constraint' => 11 ],
			'm_id' => [ 'type' => 'INT' , 'constraint' => 11 ],
			'u_create_date datetime default current_timestamp',
		];

		// add field
		$this->dbforge->add_field($fields);

		// define primary key
		$this->dbforge->add_key('id', TRUE);

		// Create table with if not exist
		return $this->dbforge->create_table($table, TRUE);
	}

	public function add_gst($table)
	{
		$this->db->query('use para');

		$field = [
			'id' => [ 'type' => 'INT','constraint'=> 11 , 'auto_increment' => TRUE, 'unsigned' => TRUE ],
			'tax_per' => [ 'type' => 'INT' , 'constraint' => 11 ],
			'tax_no' =>  [ 'type' => 'VARCHAR' , 'constraint' => 255 ]
		];

		// add field
		$this->dbforge->add_field($field);

		// define primary key
		$this->dbforge->add_key( 'id' , TRUE );

		// Create table with if not exist
		return $this->dbforge->create_table($table,TRUE);
	}

	public function add_user($table)
	{
		// Database Select
		$this->db->query('use para');

		// Field array
		$fields = [
			'id' 		=> ['type' => 'INT' , 'constraint' => 11 , 'unsigned' => TRUE , 'auto_increment' => TRUE ],
			'u_name' 	=> ['type' => 'VARCHAR' , 'constraint' => 255 ],
			'u_email' 	=> ['type' => 'TEXT' ],
			'u_password'=> ['type' => 'TEXT' ],
			'u_phone' 	=> ['type' => 'VARCHAR' , 'constraint' => 10 ],
			'u_address' => ['type' => 'TEXT' ],
			'u_city' 	=> ['type' => 'VARCHAR' , 'constraint' => 255 ],
			'u_state' 	=> ['type' => 'VARCHAR' , 'constraint' => 255 ],
			'status' 	=> ['type' => 'VARCHAR' , 'asBool' => TRUE , 'constraint' => 1 ],
			'u_create_date datetime default current_timestamp',
		];

		// add Fields
		$this->dbforge->add_field($fields);

		// column define primary key
		$this->dbforge->add_key( 'id' , TRUE );

		// create table if not exist
		return $this->dbforge->create_table($table,TRUE);
	}

	public function contact_us($table)
	{
		// database select
		$this->db->query('use para');

		// add field array
		$field = [
			'id' => ['type' => 'INT', 'constraint' => 11 , 'unsigned' => TRUE, 'auto_increment' => TRUE],
			'c_name' => ['type' => 'VARCHAR', 'constraint' => 255 ],
			'cc_name' => ['type' => 'VARCHAR', 'constraint' => 255],
			'c_email' => ['type' => 'VARCHAR', 'constraint' => 255],
			'c_mobile' => ['type' => 'VARCHAR', 'constraint' => 10],
			'c_phone' => ['type' => 'VARCHAR', 'constraint' => 15],
			'c_subject' => ['type' => 'VARCHAR', 'constraint' => 255],
			'country' => ['type' => 'VARCHAR', 'constraint' => 255],
			'state' => ['type' => 'VARCHAR', 'constraint' => 255],
			'city' => ['type' => 'VARCHAR', 'constraint' => 255],
			'zip_pincode' => ['type' =>'VARCHAR', 'constraint' => 6],
			'message' => ['type' => 'TEXT' ],
			'u_create_date datetime default current_timestamp',
		];

		// add fields
		$this->dbforge->add_field($field);

		// coumn define primary key
		$this->dbforge->add_key('id',TRUE);

		// Create tabel if not exist
		return $this->dbforge->create_table($table,TRUE);
	}

	public function order($table)
	{
		// select database
		$this->db->query('use para');

		// add field array
		$field = [
			'id' 				=>['type' => 'INT', 'constraint' => 11 , 'unsigned' => TRUE, 'auto_increment' => TRUE],
			'billing_name'	 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'billing_email' 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'billing_tel' 		=>['type' => 'VARCHAR', 'constraint' => 15],
			'billing_address' 	=>['type' => 'TEXT'],
			'billing_city' 		=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'billing_state' 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'billing_zip' 		=>['type' => 'VARCHAR', 'constraint' => 7],
			'billing_country' 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'delivery_name' 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'delivery_tel' 		=>['type' => 'VARCHAR', 'constraint' => 15],
			'delivery_address' 	=>['type' => 'TEXT'],
			'delivery_city' 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'delivery_state' 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'delivery_zip' 		=>['type' => 'VARCHAR', 'constraint' => 7],
			'delivery_country' 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'user_id' 			=>['type' => 'INT', 'constraint' => 11 ],
			'tid' 				=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'order_id' 			=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'amount' 			=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'currency' 			=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'order_gst_per' 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'order_gst_charges' =>['type' => 'VARCHAR', 'constraint' => 255 ],
			'order_sub_total' 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'order_total' 		=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'u_order_date datetime default current_timestamp',
		];

		// add all fild
		$this->dbforge->add_field($field);

		// add primory key 
		$this->dbforge->add_key('id',TRUE);

		// Create table with if not exist
		return $this->dbforge->create_table($table,TRUE);
	}

	public function order_item($table)
	{
		// select database
		$this->db->query('use para');

		// add field array
		$field = [
			'id' 			=>['type' => 'INT', 'constraint' => 11 , 'unsigned' => TRUE, 'auto_increment' => TRUE],
			'order_id'	 	=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'item_id' 		=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'item_name' 	=>['type' => 'VARCHAR', 'constraint' => 15],
			'item_price' 	=>['type' => 'TEXT'],
			'item_qty' 		=>['type' => 'VARCHAR', 'constraint' => 255 ],
			'u_order_date datetime default current_timestamp',
		];

		// add all fild
		$this->dbforge->add_field($field);

		// add primory key 
		$this->dbforge->add_key('id',TRUE);

		// Create table with if not exist
		return $this->dbforge->create_table($table,TRUE);
	}


}

?>