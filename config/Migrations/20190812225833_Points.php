<?php
use Migrations\AbstractMigration;

class Points extends AbstractMigration
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
        $table=$this->table('points');
        $table->addColumn('date','timestamp',[
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])->addColumn('points','integer',[
            'default' => 0,
            'null' => false
        ])->addColumn('comp_user_id','integer',[
            'default' => null,
            'limit'=>11,
            'null' => true
        ])->addColumn('stage','string',[
            'default' => null,
            'limit' => 30,
            'null' => false
        ])->create();
    }
    public function down()
    {
        $this->dropTable('weeks_points');
    }
}