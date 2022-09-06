<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'firstname' => [
                'type' => 'TEXT'
            ],
            'lastname' => [
                'type' => 'TEXT'
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'age' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'password' => [
                'type' => 'TEXT'
            ],
            'salt' => [
                'type' => 'TEXT'
            ],
            'avatar' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'role' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 1
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
