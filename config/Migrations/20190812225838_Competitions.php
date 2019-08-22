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
        $table=$this->table('competitions_users');
        $table->addColumn('date','timestamp',[
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])->addColumn('season_id','integer',[
            'default' => null,
            'null' => false
        ])->addColumn('status','boolean',[
            'default' => '1',
            'null' => true
        ])->addColumn('localitation_id','integer',[
            'default' => null,
            'limit' => 11,
            'null' => false
        ])->create();
    }
    public function down()
    {
        $this->dropTable('competitions_users');
    }
}