<?php

namespace ShyimMigrationTest;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use ShyimMigration\AbstractMigration;
use ShyimMigration\MigrationManager;

require __DIR__ . '/vendor/autoload.php';


class ShyimMigrationTest extends Plugin
{
    public function install(InstallContext $context)
    {
        MigrationManager::doMigrations($this, $this->container, AbstractMigration::MODUS_INSTALL);
    }

    public function update(Plugin\Context\UpdateContext $context)
    {
        MigrationManager::doMigrations($this, $this->container, AbstractMigration::MODUS_UPDATE);
    }

    public function uninstall(UninstallContext $context)
    {
        if (!$context->keepUserData()) {
            MigrationManager::doMigrations($this, $this->container, AbstractMigration::MODUS_UNINSTALL);
        }
    }
}