<?php declare(strict_types = 1);

namespace Dms\Library\Testing\Helper;

use Dms\Core\Event\IEventDispatcher;
use Dms\Core\Ioc\IIocContainer;
use Dms\Core\Persistence\Db\Connection\Dummy\DummyConnection;
use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Tests\Module\Mock\MockEventDispatcher;
use Dms\Core\Util\DateTimeClock;
use Dms\Core\Util\IClock;
use Illuminate\Container\Container;
use Interop\Container\Exception\ContainerException;
use Interop\Container\Exception\NotFoundException;

/**
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class TestIocContainer implements IIocContainer
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * TestIocContainer constructor.
     */
    public function __construct()
    {
        $this->container = new Container();

        $this->bindValue(IIocContainer::class, $this);
        $this->bindValue(IEventDispatcher::class, new MockEventDispatcher());

        $this->bind(self::SCOPE_SINGLETON, IConnection::class, DummyConnection::class);
        $this->bind(self::SCOPE_SINGLETON, IClock::class, DateTimeClock::class);
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws NotFoundException  No entry was found for this identifier.
     * @throws ContainerException Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id)
    {
        return $this->container[$id];
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return boolean
     */
    public function has($id)
    {
        return isset($this->container[$id]);
    }

    /**
     * Binds the supplied class or interface to the supplied
     * concrete class name.
     *
     * @param string $scope
     * @param string $abstract
     * @param string $concrete
     *
     * @return void
     */
    public function bind(string $scope, string $abstract, string $concrete)
    {
        if ($scope === self::SCOPE_INSTANCE_PER_RESOLVE) {
            $this->container->bind($abstract, $concrete);
        } else {
            $this->container->bind($abstract, $concrete, true);
        }
    }

    /**
     * Binds the supplied class or interface to the return value
     * of the supplied callback.
     *
     * @param string   $scope
     * @param string   $abstract
     * @param callable $factory
     *
     * @return void
     */
    public function bindCallback(string $scope, string $abstract, callable $factory)
    {
        if ($scope === self::SCOPE_INSTANCE_PER_RESOLVE) {
            $this->container->bind($abstract, $factory);
        } else {
            $this->container->bind($abstract, $factory, true);
        }
    }

    /**
     * Binds the supplied class or interface to the supplied value.
     *
     * @param string $abstract
     * @param mixed  $concrete
     *
     * @return void
     */
    public function bindValue(string $abstract, $concrete)
    {
        $this->container->bind($abstract, function () use ($concrete) {
            return $concrete;
        });
    }

    /**
     * Binds the supplied class or interface to the supplied value for the duration
     * of the supplied callback.
     *
     * @param string   $abstract
     * @param mixed    $concrete
     * @param callable $callback
     *
     * @return mixed The value returned from the callback
     */
    public function bindForCallback(string $abstract, $concrete, callable $callback)
    {
        $hasOriginal = $this->container->bound($abstract);

        if ($hasOriginal) {
            $binding = $this->container->getBindings()[$abstract] ?? null;
        }

        $this->container->instance($abstract, $concrete);

        try {
            $return = $callback();

            return $return;
        } finally {
            unset($this->container[$abstract]);

            if ($hasOriginal && $binding) {
                $this->container->bind($abstract, $binding['concrete'], $binding['shared']);
            }
        }
    }
}