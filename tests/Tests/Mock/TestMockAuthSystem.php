<?php declare(strict_types = 1);

namespace Dms\Library\Testing\Tests\Mock;

use Dms\Common\Testing\CmsTestCase;
use Dms\Core\Ioc\IIocContainer;
use Dms\Library\Testing\Mock\MockAuthSystem;

/**
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class TestMockAuthSystem extends CmsTestCase
{
    public function testClock()
    {
        $authSystem = new MockAuthSystem($this->getMockForAbstractClass(IIocContainer::class));

        $this->assertEquals(true, $authSystem->isAuthenticated());
        $this->assertEquals(true, $authSystem->isAuthorized([]));
    }
}