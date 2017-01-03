<?php

use App\Database\BuildsModels;
use App\Database\ModelFactory;
use App\JWT\TokenGenerator;
use App\Testing\CreatesModels;
use App\Testing\DefaultIncludes;
use Illuminate\Http\Response;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    use BuildsModels, CreatesModels, DefaultIncludes;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        $this->modelFactory = $app->make(ModelFactory::class);

        return $app;
    }

    public function setUp()
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    /**
     * @param array $attributes
     * @return \App\Users\User
     */
    public function loginAsUser(array $attributes = [])
    {
        $user = $this->createUser($attributes);

        $this->be($user);

        return $user;
    }

    /**
     * @param int|null $userId
     * @return array
     */
    public function setJWTHeaders($userId = null)
    {
        return ['Authorization' => 'Bearer ' . $this->getJWTToken($userId)];
    }

    private function getJWTToken($user)
    {
        $user = $user ? $user : $this->createUser();

        return $this->app[TokenGenerator::class]->byUser($user);
    }

    public function assertNoContent()
    {
        return $this->assertResponseStatus(Response::HTTP_NO_CONTENT);
    }

    public function assertForbidden()
    {
        return $this->assertResponseStatus(Response::HTTP_FORBIDDEN);
    }
}
