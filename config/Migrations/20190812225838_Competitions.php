<?php
use Migrations\AbstractMigration;

class Competitions extends AbstractMigration
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
        $table=$this->table('competitions');
        $table->addColumn('flyer','string',[
            'default' => null,
            'limit' => 250,
            'null' => true
        ])->addColumn('name','string',[
            'default' => 'null',
            'limit' => 50,
            'null' => false
        ])->addColumn('date','timestamp',[
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])->addColumn('season_id','integer',[
            'default' => null,
            'null' => false
        ])->addColumn('scheme_id','integer',[
            'default' => null,
            'null' => false
        ])->addColumn('status','boolean',[
            'default' => '1',
            'null' => true
        ])->addColumn('location_id','integer',[
            'default' => null,
            'limit' => 11,
            'null' => false
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
        $this->dropTable('competitions');
    }
}