<?php
declare(strict_types=1);

use Cake\ORM\TableRegistry;
use Migrations\AbstractMigration;

class SetActiveSchema extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $users = TableRegistry::getTableLocator()->get('UsersTable');

        // REQUIRED!! Add the field to the Table schema
        $users->schema()->addColumn('active', [
            'type' => 'boolean',
            'default' => false,
            'null' => false
        ]);

    }
}
