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
            'default' => 'null',
            'limit' => 50,
            'null' => false
        ])->addColumn('description','string',[
            'default' =>'null',
            'limit' => 200,
            'null' => false
        ])->addColumn('league_id','integer',[
            'default' => null,
            'limit'=>11,
            'null' => false
        ])->addColumn('status','boolean',[
            'default' => '1',
            'null' => true
        ])->addColumn('date_start','timestamp',[
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])->addColumn('date_end','timestamp',[
            'default' => null,
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
        $this->dropTable('seasons');
    }
}