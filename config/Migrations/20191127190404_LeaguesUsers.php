<?php

use Migrations\AbstractMigration;

class LeaguesUsers extends AbstractMigration
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
        $table = $this->table('leagues_users');
        $table->addColumn('league_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false
        ])->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false
        ])->addColumn('created', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])->addColumn('modified', 'timestamp', [
            'default' => null,
            'limit' => null,
            'null' => true
        ])->create();
    }
    public function down()
    {
        $this->dropTable('leagues_users');
    }
}