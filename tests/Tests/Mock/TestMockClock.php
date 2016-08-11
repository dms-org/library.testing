<?php declare(strict_types = 1);

namespace Dms\Library\Testing\Tests\Mock;

use Dms\Common\Testing\CmsTestCase;
use Dms\Library\Testing\Mock\MockClock;

/**
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class TestMockClock extends CmsTestCase
{
    public function testClock()
    {
        $clock = new MockClock('2000-01-01');

        $this->assertEquals(new \DateTimeImmutable('2000-01-01'), $clock->utcNow());
        $this->assertEquals(new \DateTimeImmutable('2000-01-01'), $clock->now());
    }
}