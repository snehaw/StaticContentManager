<?php

use Phinx\Migration\AbstractMigration;

class CreateStaticContentsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
        $staticContents = $this->table('static_contents');

        $staticContents
            ->addColumn('title', 'string', ['limit' => '200', 'null' => false])
            ->addColumn('slug', 'string', ['limit' => '255'])
            ->addColumn('content', 'text', ['null' => true, 'default' => null])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('static_contents');
    }
}