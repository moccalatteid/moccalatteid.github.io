<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'slug'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			],
			'nim' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'jurusan' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'gambar' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'created_at' => [
				'type' => 'datetime',
				'null' => TRUE,
			],
			'updated_at' => [
				'type' => 'datetime',
				'null' => TRUE,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('mahasiswa');
	}

	public function down()
	{
		$this->forge->dropTable('mahasiswa');
		//
	}
}
