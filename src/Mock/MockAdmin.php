<?php declare(strict_types = 1);

namespace Dms\Library\Testing\Mock;

use Dms\Core\Auth\IAdmin;
use Dms\Core\Auth\IHashedPassword;
use Dms\Core\Model\EntityIdCollection;

/**
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class MockAdmin implements IAdmin
{
    /**
     * Gets the user's email address.
     *
     * @return string
     */
    public function getEmailAddress() : string
    {
        return 'admin@admin.com';
    }

    /**
     * Gets the username.
     *
     * @return string
     */
    public function getUsername() : string
    {
        return 'admin';
    }

    /**
     * Gets the user's hashed password.
     *
     * @return IHashedPassword
     */
    public function getPassword() : IHashedPassword
    {
        return new class implements IHashedPassword
        {
            /**
             * Gets the hashed password string.
             *
             * @return string
             */
            public function getHash() : string
            {
                // TODO: Implement getHash() method.
            }

            /**
             * Gets the hashing algorithm.
             *
             * @return string
             */
            public function getAlgorithm() : string
            {
                // TODO: Implement getAlgorithm() method.
            }

            /**
             * Gets the hashing cost factor.
             *
             * @return int
             */
            public function getCostFactor() : int
            {
                // TODO: Implement getCostFactor() method.
            }

            /**
             * Returns an associated array of the values indexed by the property names.
             *
             * This returns all properties regardless of accessibility.
             *
             * @return array
             */
            public function toArray() : array
            {
                // TODO: Implement toArray() method.
            }

            /**
             * Sets the properties of the object.
             *
             * The property types and structure are NOT validated in any way
             * and as such this should only be used for restoring object
             * state from a persistence store which is in a valid state.
             *
             * @param array $properties
             *
             * @return void
             */
            public function hydrate(array $properties)
            {
                // TODO: Implement hydrate() method.
            }
        };
    }

    /**
     * Sets the user's hashed password.
     *
     * @param IHashedPassword $password
     *
     * @return void
     */
    public function setPassword(IHashedPassword $password)
    {
        
    }

    /**
     * Returns whether the user is a super user.
     *
     * @return boolean
     */
    public function isSuperUser() : bool
    {
        return true;
    }

    /**
     * Returns whether the user is banned.
     *
     * @return boolean
     */
    public function isBanned() : bool
    {
        return false;
    }

    /**
     * Gets the user's role ids.
     *
     * @return EntityIdCollection
     */
    public function getRoleIds() : EntityIdCollection
    {
        return new EntityIdCollection();
    }

    /**
     * Returns the entity's unique identifier.
     *
     * @return int|null
     */
    public function getId()
    {
        return 1;
    }

    /**
     * Returns whether the entity has an id.
     *
     * @return bool
     */
    public function hasId() : bool
    {
        return true;
    }

    /**
     * Sets the entity's unique identifier.
     *
     * @param int $id
     *
     * @return void
     * @throws Exception\InvalidOperationException If the id is already set.
     */
    public function setId(int $id)
    {
        // TODO: Implement setId() method.
    }

    /**
     * Returns an associated array of the values indexed by the property names.
     *
     * This returns all properties regardless of accessibility.
     *
     * @return array
     */
    public function toArray() : array
    {
        
    }

    /**
     * Sets the properties of the object.
     *
     * The property types and structure are NOT validated in any way
     * and as such this should only be used for restoring object
     * state from a persistence store which is in a valid state.
     *
     * @param array $properties
     *
     * @return void
     */
    public function hydrate(array $properties)
    {
    }
}