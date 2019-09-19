<?php
use Migrations\AbstractMigration;

class AddColumnToUsers extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('head_bg','string',[
            'default' => 'default_bg.jpg',
            'limit' => 250,
            'null' => true
        ])->update();
    }
}
