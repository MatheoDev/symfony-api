<?php

namespace App\Factory;

use App\Entity\Trajet;
use App\Enums\TypeTrain;
use App\Repository\TrajetRepository;
use Symfony\Component\Uid\Uuid;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Trajet>
 *
 * @method        Trajet|Proxy                     create(array|callable $attributes = [])
 * @method static Trajet|Proxy                     createOne(array $attributes = [])
 * @method static Trajet|Proxy                     find(object|array|mixed $criteria)
 * @method static Trajet|Proxy                     findOrCreate(array $attributes)
 * @method static Trajet|Proxy                     first(string $sortedField = 'id')
 * @method static Trajet|Proxy                     last(string $sortedField = 'id')
 * @method static Trajet|Proxy                     random(array $attributes = [])
 * @method static Trajet|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TrajetRepository|RepositoryProxy repository()
 * @method static Trajet[]|Proxy[]                 all()
 * @method static Trajet[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Trajet[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Trajet[]|Proxy[]                 findBy(array $attributes)
 * @method static Trajet[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Trajet[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TrajetFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            ->instantiateWith(function ($attributes) {
                return ( new Trajet(
                    id: Uuid::v4(),
                    type: TypeTrain::getValue(TypeTrain::getRand()),
                ));
            })
        ;
    }

    protected static function getClass(): string
    {
        return Trajet::class;
    }
}
