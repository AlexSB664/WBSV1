<?php
use Migrations\AbstractMigration;

class AddColumnsToLeagues2 extends AbstractMigration
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
        $table = $this->table('leagues');
        $table->addColumn('level','integer',[
            'default' => 0,
            'limit' => 11,
            'null' => true
        ]);
        $table->addColumn('score','integer',[
            'default' => 0,
            'limit' => 11,
            'null' => true
        ]);
        $table->update();
    }
}
