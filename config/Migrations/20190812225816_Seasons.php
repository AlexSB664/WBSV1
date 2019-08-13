<?php
use Migrations\AbstractMigration;

class Seasons extends AbstractMigration
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
        $table=$this->table('seasons');
        $table->addColumn('name','string',[
            'default' => 'Sin nombre',
            'limit' => 50,
            'null' => false
        ])->addColumn('date_start','timestamp',[
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])->addColumn('date_end','timestamp',[
            'default' => null,
            'null' => true
        ])->addColumn('leagues','integer',[
            'default' => null,
            'limit'=>11,
            'null' => false
        ])->addColumn('champion','integer',[
            'default' => 0,
            'null' => true
        ])->addColumn('active','boolean',[
            'default' => '1',
            'null' => true
        ])->create();
    }
    public function down()
    {
        $this->dropTable('seasons');
    }
}