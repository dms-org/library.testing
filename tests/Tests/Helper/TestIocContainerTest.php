<?php declare(strict_types = 1);

namespace Dms\Library\Testing\Tests\Helper;

use Dms\Common\Testing\CmsTestCase;
use Dms\Library\Testing\Helper\TestIocContainer;

/**
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class TestIocContainerTest extends CmsTestCase
{
    /**
     * @var TestIocContainer
     */
    protected $iocContainer;

    public function setUp(): void
    {
        $this->iocContainer = new TestIocContainer();
    }

    public function testContainer()
    {
        $instance = new \stdClass();

        $this->iocContainer->bindValue('test', $instance);

        $this->assertSame($instance, $this->iocContainer->get('test'));
    }

    public function testBindForCallback()
    {
        $instance = new \stdClass();
        $called   = false;

        $this->iocContainer->bindForCallback('test', $instance, function () use ($instance, &$called) {
            $this->assertSame(true, $this->iocContainer->has('test'));
            $this->assertSame($instance, $this->iocContainer->get('test'));
            $called = true;
        });

        $this->assertSame(false, $this->iocContainer->has('test'));
        $this->assertSame(true, $called);
    }
}