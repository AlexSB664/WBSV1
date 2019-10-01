<?php
use Migrations\AbstractMigration;

class ChangeColumnSchemesDetails extends AbstractMigration
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
        $table = $this->table('schemes_details');
        $table->changeColumn('points', 'decimal', [
            'default' => 0,
            'null' => false,
            'precision'=>6,
            'scale'=>2
        ]);
        $table->update();
    }
}
