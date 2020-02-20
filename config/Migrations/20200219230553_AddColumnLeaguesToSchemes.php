<?php

use Migrations\AbstractMigration;

class AddColumnLeaguesToSchemes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('schemes');
        $table->changeColumn('league_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true
        ]);
        $table->update();
    }
}
