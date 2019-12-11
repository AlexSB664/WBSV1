<?php

use Migrations\AbstractMigration;

class FreestylersTopUsers extends AbstractMigration
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
        $table = $this->table('freestylers_tops_users');
        $table->addColumn('freestylers_top_id','integer',[
            'default' => null,
            'limit' => 11,
        ])->addColumn('user_id','integer',[
            'default' => null,
            'limit' => 11,
        ])->addColumn('position','integer',[
            'default' => null,
            'limit' => 11,
        ])->addColumn('points','integer',[
            'default' => null,
            'limit' => 11,
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
}
