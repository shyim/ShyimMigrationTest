<?php

use ShyimMigration\AbstractMigration;

class Migrations_Migration1 extends AbstractMigration {

    /**
     * @param string $modus
     */
    public function up($modus)
    {
        $this->container->get('shopware_attribute.crud_service')->update('s_articles_attributes', 'test_bla', 'string');
    }

    /**
     * Reverse migration
     */
    public function down()
    {
        $this->container->get('shopware_attribute.crud_service')->delete('s_articles_attributes', 'test_bla');
    }
}