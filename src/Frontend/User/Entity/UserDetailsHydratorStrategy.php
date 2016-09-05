<?php
/**
 * Created by PhpStorm.
 * User: n3vra
 * Date: 7/24/2016
 * Time: 7:18 PM
 */

namespace Frontend\User\Entity;

use Zend\Hydrator\HydratorInterface;
use Zend\Hydrator\Strategy\StrategyInterface;

class UserDetailsHydratorStrategy implements StrategyInterface
{
    /** @var HydratorInterface  */
    protected $userDetailsHydrator;

    public function __construct(HydratorInterface $hydrator)
    {
        $this->userDetailsHydrator = $hydrator;
    }

    public function extract($details)
    {
        if(!$details) {
            return [];
        }
        return $this->userDetailsHydrator->extract($details);
    }

    public function hydrate($value)
    {
        if($value === null) {
            return $value;
        }

        $details = new UserDetailsEntity();
        $this->userDetailsHydrator->hydrate($value, $details);

        return $details;
    }

}