<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbFavoritos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_favorito'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_suscriptor'       => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'idLey'       => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
        ]);
        $this->forge->addKey('id_favorito', true);
        $this->forge->createTable('tb_Favoritos');
    }

    public function down()
    {
        $this->forge->dropTable('tb_Favoritos');
    }
}
