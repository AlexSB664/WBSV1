<?php
use Migrations\AbstractMigration;

class AddColumnsToMatches extends AbstractMigration
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
        $table->addColumn('winner', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
         ]);
        $table->update();
    }
}
