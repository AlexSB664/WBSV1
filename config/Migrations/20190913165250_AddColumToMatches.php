<?php
use Migrations\AbstractMigration;

class AddColumToMatches extends AbstractMigration
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
        $table = $this->table('matches');
        $table->addColumn('video','string',[
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);
        $table->update();
    }
}
