<?php declare(strict_types = 1);

namespace Dms\Library\Testing\Tests\Mock;

use Dms\Common\Testing\CmsTestCase;
use Dms\Library\Testing\Mock\MockAdmin;
use Dms\Library\Testing\Mock\MockClock;

/**
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class TestMockAdmin extends CmsTestCase
{
    public function testMock()
    {
        $admin = new MockAdmin();

        $this->assertSame(true, $admin->isSuperUser());
    }
}