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
        ])->addColumn('name','string',[
            'default' => null,
            'limit' => 50,
            'null' => false
        ])->addColumn('description','string',[
            'default' => null,
            'limit' => 200,
            'null' => false
        ])->addColumn('social_facebook','string',[
            'default' => null,
            'null' => false,
            'limit' => 225
        ])->addColumn('social_twitter','string',[
            'default' => null,
            'null' => false,
            'limit' => 225
        ])->addColumn('social_instagram','string',[
            'default' => null,
            'null' => false,
            'limit' => 225
        ])->addColumn('social_youtube','string',[
            'default' => null,
            'null' => false,
            'limit' => 225
        ])->addColumn('social_website','string',[
            'default' => null,
            'null' => false,
            'limit' => 225
        ])->addColumn('contact_phone','string',[
            'default' => null,
            'null' => false,
            'limit' => 20
        ])->addColumn('contact_email','string',[
            'default' => null,
            'null' => false,
            'limit' => 50
        ])->create();
    }
    public function down()
    {
        $this->dropTable('leagues');
    }
}