<?php
use Migrations\AbstractMigration;

class Participants extends AbstractMigration
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
        $table=$this->table('participants');
        $table->addColumn('user','integer',[
            'default' => null,
            'limit' => 11,
            'null' => false
        ])->addColumn('points','integer',[
            'default' => 0,
            'null' => false
        ])->addColumn('best_season','integer',[
            'default' => null,
            'limit'=>11,
            'null' => true
        ])->addColumn('hig_score','integer',[
            'default' => 0,
            'null' => false
        ])->create();
    }
    public function down()
    {
        $this->dropTable('participants');
    }
}
