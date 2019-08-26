<?php
use Migrations\AbstractMigration;

class MatchesUser extends AbstractMigration
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
        $table=$this->table('matches_users');
        $table->addColumn('match_id','integer',[
            'default' => null,
            'limit' => 11,
            'null' => false
        ])->addColumn('user_id','integer',[
            'default' => null,
            'limit' => 11,
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
        $this->dropTable('matches_users');
    }
}