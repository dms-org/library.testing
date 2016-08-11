<?php declare(strict_types = 1);

namespace Dms\Library\Testing\Mock;

use Dms\Core\Auth\AdminBannedException;
use Dms\Core\Auth\AdminForbiddenException;
use Dms\Core\Auth\AuthSystem;
use Dms\Core\Auth\IAdmin;
use Dms\Core\Auth\IAuthSystemInPackageContext;
use Dms\Core\Auth\InvalidCredentialsException;
use Dms\Core\Auth\IPermission;
use Dms\Core\Auth\NotAuthenticatedException;
use Dms\Core\Event\IEventDispatcher;
use Dms\Core\Ioc\IIocContainer;

/**
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class MockAuthSystem extends AuthSystem implements IAuthSystemInPackageContext
{
    /**
     * @var IIocContainer
     */
    protected $iocContainer;

    /**
     * @var string
     */
    protected $packageName;

    /**
     * MockAuthSystem constructor.
     *
     * @param IIocContainer $iocContainer
     * @param string        $packageName
     */
    public function __construct(IIocContainer $iocContainer, string $packageName = 'test-package')
    {
        $this->iocContainer = $iocContainer;
        $this->packageName  = $packageName;
    }

    /**
     * Attempts to login with the supplied credentials.
     *
     * @param string $username
     * @param string $password
     *
     * @return void
     * @throws InvalidCredentialsException
     * @throws AdminBannedException
     */
    public function login(string $username, string $password)
    {

    }

    /**
     * Attempts to logout the currently authenticated user.
     *
     * @return void
     * @throws NotAuthenticatedException
     */
    public function logout()
    {

    }

    /**
     * Resets the users credentials.
     *
     * @param string $username
     * @param string $oldPassword
     * @param string $newPassword
     *
     * @return void
     * @throws InvalidCredentialsException
     * @throws AdminBannedException
     */
    public function resetPassword(string $username, string $oldPassword, string $newPassword)
    {

    }

    /**
     * Returns whether there is an authenticated user.
     *
     * @return boolean
     */
    public function isAuthenticated() : bool
    {
        return true;
    }

    /**
     * Returns the currently authenticated user.
     *
     * @return IAdmin
     * @throws NotAuthenticatedException
     */
    public function getAuthenticatedUser() : IAdmin
    {
        return new MockAdmin();
    }

    /**
     * Returns whether the currently authenticated user has the
     * supplied permissions.
     *
     * @param IPermission[] $permissions
     *
     * @return boolean
     */
    public function isAuthorized(array $permissions) : bool
    {
        return true;
    }

    /**
     * Verifies whether the currently authenticated user has the supplied
     * permissions.
     *
     * @param IPermission[] $permissions
     *
     * @return void
     * @throws AdminForbiddenException
     * @throws NotAuthenticatedException
     * @throws AdminBannedException
     */
    public function verifyAuthorized(array $permissions)
    {

    }

    /**
     * Gets the current package name.
     *
     * @return string
     */
    public function getPackageName() : string
    {
        return $this->packageName;
    }

    /**
     * Gets the ioc container used by the auth system.
     *
     * @return IIocContainer
     */
    public function getIocContainer() : IIocContainer
    {
        return $this->iocContainer;
    }

    /**
     * Gets the event dispatcher used by the auth system.
     *
     * @return IEventDispatcher
     */
    public function getEventDispatcher() : IEventDispatcher
    {
        return $this->getIocContainer()->get(IEventDispatcher::class);
    }
}