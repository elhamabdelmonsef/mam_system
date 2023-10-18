<?php

namespace Tests\Unit;

use App\Domain\User\Filters\UserFilters;
use App\Domain\User\Repository\UserRepository;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected $userRepo;

    public function setUp(): void
    {
        parent::setUp();

        $this->userRepo = new UserRepository();

    }

    public function testGetUsers()
    {
        $response = $this->userRepo->getUsers([1, 1]);

        $this->assertCount(2, $response);
    }

}
