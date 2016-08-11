<?php declare(strict_types = 1);

namespace Dms\Library\Testing\Mock;

use Dms\Core\Util\IClock;

/**
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class MockClock implements IClock
{
    /**
     * @var string
     */
    protected $dateTime;

    /**
     * @param string $dateTime
     */
    public function __construct(string $dateTime)
    {
        $this->dateTime = $dateTime;
    }


    /**
     * Gets the current time.
     *
     * @return \DateTimeImmutable
     */
    public function now() : \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->dateTime);
    }

    /**
     * Gets the current time in UTC.
     *
     * @return \DateTimeImmutable
     */
    public function utcNow() : \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->dateTime);
    }
}