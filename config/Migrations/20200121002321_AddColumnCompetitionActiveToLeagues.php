<?php
use Migrations\AbstractMigration;

class AddColumnCompetitionActiveToLeagues extends AbstractMigration
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
        $table->addColumn('active_competition','integer',[
            'default' => null,
            'limit' => 11,
            'null' => true
        ]);
        $table->update();
    }
}
