<?php
use Migrations\AbstractMigration;

class Locations extends AbstractMigration
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
        $table=$this->table('locations');
        $table->addColumn('name','string',[
            'default' => null,
            'limit' => 60,
            'null' => false
        ])->addColumn('address','string',[
            'default' => null,
            'limit' => 80,
            'null' => false
        ])->addColumn('lat','float',[
            'default' => null,
            'limit' => 100,
            'null' => false,
            'precision' => 10,
            'scale'=>6
        ])->addColumn('lng','float',[
            'default' => null,
            'limit' => 100,
            'null' => false,
            'precision' => 10,
            'scale'=>6
        ])->addColumn('type','string',[
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
        $this->dropTable('locations');
    }
}
