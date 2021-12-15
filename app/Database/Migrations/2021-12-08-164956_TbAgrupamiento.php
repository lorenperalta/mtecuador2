<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbAgrupamiento extends Migration
{
    public function up()
	{
		$this->forge->addField([
			'idAgrupamiento' => [
				'type' => 'INT',
				'constraint' => 12,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'NombreAgrupamiento' => [
				'type' => 'VARCHAR',
				'constraint' => '300',
			],
			'DescripcionAgrupamiento' => [
				'type' => 'VARCHAR',
				'constraint' => '300',
			],
			'TipoAgrup' => [
				'type' => 'INT',
				'constraint' => 12,
			],
			'idUsuarioCreo' => [
				'type' => 'INT',
				'constraint' => 12,
			],
			'idUsuarioMod' => [
				'type' => 'INT',
				'constraint' => 12,
			],
			'Borrado' => [
				'type' => 'INT',
				'constraint' => 2,
			],
			'Precio' => [
				'type' => 'INT',
				'constraint' => 15,
			],
            'Imagen' => [
				'type' => 'VARCHAR',
				'constraint' => '300',
			],
		]);
		$this->forge->addKey('idAgrupamiento', true);
		$this->forge->createTable('tb_Agrupamiento');
	}

	public function down()
	{
			$this->forge->dropTable('tb_Agrupamiento');
	}
}
