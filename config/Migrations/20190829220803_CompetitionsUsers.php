<?php
use Migrations\AbstractMigration;

class CompetitionsUsers extends AbstractMigration
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
         $table=$this->table('competition_users');
        $table->addColumn('competitions_id','integer',[
            'default' => null,
            'limit' => 11,
        ])->addColumn('users_id','integer',[
            'default' => null,
            'limit' => 11,
        ])->addColumn('assistance','boolean',[
            'default' => '1',
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
        $this->dropTable('competition_users');
    }
}
