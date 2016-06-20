<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminCodeTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Test the code index
     *
     * @return void
     */
    public function testCodeHome()
    {
        $user = factory(User::class, 'admin')->create();
        $code = factory(Code::class)->create();
        $user->codes()->save($code);

        $this->actingAs($user)
        ->visit(route('admin.code.index'))
        ->see($code->name);
    }
}
