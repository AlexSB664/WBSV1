<?php

use Migrations\AbstractMigration;

class EditColumToLeagues extends AbstractMigration
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
        $table->changeColumn('description', 'text', [
            'default' => null,
            'null' => true
        ])->changeColumn('social_facebook', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 225
        ])->changeColumn('social_twitter', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 225
        ])->changeColumn('social_instagram', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 225
        ])->changeColumn('social_youtube', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 225
        ])->changeColumn('social_website', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 225
        ]);
        $table->update();
    }
}
