<?php
namespace App\Api\Athletes;

use App\Api\Users\UserTransformer;
use App\Athletes\Athlete;
use League\Fractal\TransformerAbstract;

class AthleteTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = [
        'userRelation',
    ];

    /**
     * @param \App\Athletes\Athlete $athlete
     * @return array
     */
    public function transform(Athlete $athlete)
    {
        return [
            'id' => $athlete->id(),
            'name' => $athlete->name(),
            'phone' => $athlete->phone(),
            'email' => $athlete->email(),
            'birthday' => $athlete->birthday()->toIso8601String(),
        ];
    }

    /**
     * @param \App\Athletes\Athlete $athlete
     * @return \League\Fractal\Resource\Item
     */
    public function includeUserRelation(Athlete $athlete)
    {
        return $this->item($athlete->user(), new UserTransformer());
    }
}
