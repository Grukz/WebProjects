<?php
class users extends CI_Model{
	function create(){
		if ($this->dbforge->create_database('my_db'))
{
        echo 'Database created!';
}
	}
	
	$fields = array(
        'user_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
        ),
        'user_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
        ),
		        'user_pass' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
        ),
        'user_type' => array(
                'type' =>'VARCHAR',
                'constraint' => '100',
        ),
);
$this->dbforge->add_field($fields);
$this->dbforge->create_table('users');
	$fields = array(
        'blog_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
        ),
        'blog_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
        ),
        'blog_author' => array(
                'type' =>'VARCHAR',
                'constraint' => '100',
        ),
        'blog_description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
        ),
);
$this->dbforge->add_field($fields);
$this->dbforge->create_table('posts');
}
?>