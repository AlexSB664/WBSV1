<?php

use Migrations\AbstractMigration;

class AddColumnCompetitions3 extends AbstractMigration
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
        $table = $this->table('competitions');
        $table->addColumn('bonus','integer',[
            'default' => 1,
            'limit' => 11,
            'null' => false
        ]);
        $table->update();
    }
}
