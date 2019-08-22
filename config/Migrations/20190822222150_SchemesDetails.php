<?php
use Migrations\AbstractMigration;

class SchemesDetails extends AbstractMigration
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
        $table=$this->table('schemes_details');
        $table->addColumn('scheme_id','integer',[
            'default' => null,
            'limit' => 50,
            'null' => false
        ])->addColumn('position','string',[
            'default' => null,
            'limit' => 50,
            'null' => false
        ])->addColumn('points','integer',[
            'default' => '0',
            'limit' => 11,
            'null' => true
        ])->addColumn('aditional_points','integer',[
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
        $this->dropTable('schemes_details');
    }
}