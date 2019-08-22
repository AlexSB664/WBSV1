<?php
use Migrations\AbstractMigration;

class Matches extends AbstractMigration
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
        $table=$this->table('matches');
        $table->addColumn('competition_id','integer',[
            'default' => null,
            'limit' => 11,
            'null' => false
        ])->addColumn('stage','string',[
            'default' => '0',
            'limit' => 50,
            'null' => true
        ])->addColumn('points','integer',[
            'default' => '0',
            'limit' => 11,
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
        $this->dropTable('matches');
    }
}