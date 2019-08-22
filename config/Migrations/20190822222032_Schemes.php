<?php
use Migrations\AbstractMigration;

class Schemes extends AbstractMigration
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
        $table=$this->table('schemes');
        $table->addColumn('name','string',[
            'default' => null,
            'limit' => 50,
            'null' => false
        ])->addColumn('league_id','integer',[
            'default' => null,
            'limit' => 11,
            'null' => false
        ])->addColumn('is_default','boolean',[
            'default' => '0',
            'null' => true
        ])->addColumn('created','timestamp',[
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])->addColumn('modified','timestamp',[
            'default' => null,
            'limit' => null,
            'null' => true
        ])->create();
    }
    public function down()
    {
        $this->dropTable('schemes');
    }
}