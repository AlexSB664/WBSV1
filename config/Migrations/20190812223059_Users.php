<?php
use Migrations\AbstractMigration;

class Users extends AbstractMigration
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
        $table=$this->table('users');
        $table->addColumn('username','string',[
            'default' => null,
            'limit' => 50,
            'null' => false
        ])->addColumn('email','string',[
            'default' => null,
            'limit' => 50,
            'null' => false
        ])->addColumn('password','string',[
            'default' => null,
            'limit' => 225,
            'null' => false
        ])->addColumn('role','string',[
            'default' => 'participant',
            'limit'=>15,
            'null' => false
        ])->addColumn('active','boolean',[
            'default' => '0',
            'null' => true
        ])->addColumn('telephone','boolean',[
            'default' => null,
            'limit' => 17,
            'null' => true
        ])->addColumn('age','integer',[
            'default' => '18',
            'null' => false
        ])->addColumn('created','timestamp',[
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])->addColumn('midified','timestamp',[
            'default' => null,
            'limit' => null,
            'null' => true
        ])->create();
    }
    public function down()
    {
        $this->dropTable('users');
    }
}
