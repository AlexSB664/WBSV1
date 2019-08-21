<?php
use Migrations\AbstractMigration;

class Leagues extends AbstractMigration
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
        $table=$this->table('leagues');
        $table->addColumn('date','timestamp',[
            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])->addColumn('season','integer',[
            'default' => null,
            'null' => false
        ])->addColumn('facebookSocial','string',[
            'default' => null,
            'null' => false,
            'limit' => 225
        ])->addColumn('twitterSocial','string',[
            'default' => null,
            'null' => false,
            'limit' => 225
        ])->addColumn('instagramSocial','string',[
            'default' => null,
            'null' => false,
            'limit' => 225
        ])->addColumn('active','boolean',[
            'default' => '1',
            'null' => true
        ])->create();
    }
    public function down()
    {
        $this->dropTable('leagues');
    }
}