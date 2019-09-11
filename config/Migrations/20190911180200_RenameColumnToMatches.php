<?php
use Migrations\AbstractMigration;

class RenameColumnToMatches extends AbstractMigration
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
        $table=$this->table('matches');
        $table->renameColumn('winner','user_id');
        $table->update();
    }
}
