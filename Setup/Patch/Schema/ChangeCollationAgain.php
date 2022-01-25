<?php
namespace Alex\HidePrice\Setup\Patch\Schema;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;

class ChangeCollationAgain implements SchemaPatchInterface
{
    private ResourceConnection $resourceConnection;

    public function __construct(
        ResourceConnection $resourceConnection
    ) {
        $this->resourceConnection = $resourceConnection;
    }

    public static function getDependencies()
    {
        return [ChangeCollation::class];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $connection = $this->resourceConnection->getConnection();

        $connection->query('ALTER TABLE HidePrice CONVERT TO CHARACTER SET utf8');
    }
}
