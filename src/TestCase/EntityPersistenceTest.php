<?php declare(strict_types = 1);

namespace Dms\Library\Testing\TestCase;

use Dms\Core\Persistence\DbRepository;
use Dms\Core\Tests\Persistence\Db\Integration\Mapping\DbIntegrationTest;

/**
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
abstract class EntityPersistenceTest extends DbIntegrationTest
{
    /**
     * @return string
     */
    abstract protected function getEntityClass() : string;

    public function setUp(): void
    {
        parent::setUp();

        $this->orm->enableLazyLoading(false);

        $this->repo = new DbRepository($this->connection, $this->orm->getEntityMapper($this->getEntityClass()));
    }
}