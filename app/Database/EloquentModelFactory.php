<?php
namespace App\Database;

use App\Users\EloquentUser;
use App\Users\User;
use Illuminate\Database\Eloquent\Factory;

class EloquentModelFactory implements ModelFactory
{
    /**
     * @var array
     */
    protected $models = [
        User::class => EloquentUser::class,
    ];

    /**
     * @var \Illuminate\Database\Eloquent\Factory
     */
    private $factory;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param string $model
     * @param array $attributes
     * @return object
     */
    public function make($model, array $attributes = [])
    {
        return $this->factory->of($this->resolveModel($model))->make($attributes);
    }

    /**
     * @param string $model
     * @param array $attributes
     * @param int $times
     * @return object
     */
    public function create($model, array $attributes = [], $times = 1)
    {
        return $this->factory
            ->of($this->resolveModel($model))
            ->times($times)
            ->create($attributes);
    }

    /**
     * @param string $model
     * @return string
     * @throws \App\Database\InvalidModelException
     */
    private function resolveModel($model)
    {
        if (! isset($this->models[$model])) {
            throw InvalidModelException::notRegistered($model);
        }

        return $this->models[$model];
    }
}
