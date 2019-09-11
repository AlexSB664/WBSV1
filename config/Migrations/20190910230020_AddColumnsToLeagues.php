<?php

use Migrations\AbstractMigration;

class AddColumnsToLeagues extends AbstractMigration
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
        $table->addColumn('slug', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ])->addColumn('since', 'date', [
            'default' => null,
            'null' => true,
        ])->addIndex(['slug'], ['unique' => true]);
        $table->update();
    }
}
