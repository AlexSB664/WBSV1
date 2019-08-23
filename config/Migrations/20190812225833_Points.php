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
        $table->addColumn('points','integer',[
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
        $this->dropTable('weeks_points');
    }
}