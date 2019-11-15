<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Tests\User;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Core\User\User;

class InMemoryUserProviderTest extends TestCase
{
    public function testConstructor()
    {
        $provider = $this->createProvider();

        $user = $provider->loadUserByUsername('fabien');
        $this->assertEquals('foo', $user->getPassword());
        $this->assertEquals(['ROLE_USER'], $user->getRoles());
        $this->assertFalse($user->isEnabled());
    }

    public function testRefresh()
    {
        $user = new User('fabien', 'bar');

        $provider = $this->createProvider();

        $refreshedUser = $provider->refreshUser($user);
        $this->assertEquals('foo', $refreshedUser->getPassword());
        $this->assertEquals(['ROLE_USER'], $refreshedUser->getRoles());
        $this->assertFalse($refreshedUser->isEnabled());
        $this->assertFalse($refreshedUser->isCredentialsNonExpired());
    }

    /**
     * @return InMemoryUserProvider
     */
    protected function createProvider()
    {
        return new InMemoryUserProvider([
            'fabien' => [
                'password' => 'foo',
                'enabled' => false,
                'roles' => ['ROLE_USER'],
            ],
        ]);
    }

    public function testCreateUser()
    {
        $provider = new InMemoryUserProvider();
        $provider->createUser(new User('fabien', 'foo'));

        $user = $provider->loadUserByUsername('fabien');
        $this->assertEquals('foo', $user->getPassword());
    }

    public function testCreateUserAlreadyExist()
    {
        $this->expectException('LogicException');
        $provider = new InMemoryUserProvider();
        $provider->createUser(new User('fabien', 'foo'));
        $provider->createUser(new User('fabien', 'foo'));
    }

    public function testLoadUserByUsernameDoesNotExist()
    {
        $this->expectException('Symfony\Component\Security\Core\Exception\UsernameNotFoundException');
        $provider = new InMemoryUserProvider();
        $provider->loadUserByUsername('fabien');
    }
}
