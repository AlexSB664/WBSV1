<?php
use Migrations\AbstractMigration;

class WeekPoints extends AbstractMigration
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
        $table=$this->table('weeks_points');
        $table->addColumn('date','timestamp',[
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])->addColumn('points','integer',[
            'default' => 0,
            'null' => false
        ])->addColumn('participant','integer',[
            'default' => null,
            'limit'=>11,
            'null' => true
        ])->addColumn('season','integer',[
            'default' => null,
            'null' => false
        ])->create();
    }
    public function down()
    {
        $this->dropTable('weeks_points');
    }
}