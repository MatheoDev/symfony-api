<?php

namespace App\Factory;

use App\Entity\Escale;
use App\Repository\EscaleRepository;
use Symfony\Component\Uid\Uuid;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Escale>
 *
 * @method        Escale|Proxy                     create(array|callable $attributes = [])
 * @method static Escale|Proxy                     createOne(array $attributes = [])
 * @method static Escale|Proxy                     find(object|array|mixed $criteria)
 * @method static Escale|Proxy                     findOrCreate(array $attributes)
 * @method static Escale|Proxy                     first(string $sortedField = 'id')
 * @method static Escale|Proxy                     last(string $sortedField = 'id')
 * @method static Escale|Proxy                     random(array $attributes = [])
 * @method static Escale|Proxy                     randomOrCreate(array $attributes = [])
 * @method static EscaleRepository|RepositoryProxy repository()
 * @method static Escale[]|Proxy[]                 all()
 * @method static Escale[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Escale[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Escale[]|Proxy[]                 findBy(array $attributes)
 * @method static Escale[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Escale[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class EscaleFactory extends ModelFactory
{
    private static ?\DateTimeInterface $startTime = null;
    private static bool $initialized = false;

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
        if (!self::$initialized) {
            self::$startTime = new \DateTime('now');
            self::$initialized = true;
        }

        return $this
            ->instantiateWith(function ($attributes) {
                $interval = new \DateInterval(('PT30M'));
                $endDate = (clone self::$startTime)->add($interval);

                return (new Escale())
                    ->setId(Uuid::v4())
                    ->setGare(self::faker()->city())
                    ->setVoie(self::faker()->word()[0])
                    ->setHoraire(self::faker()->dateTimeBetween(self::$startTime, $endDate))
                    ->setTrajet($attributes['trajet'])
                ;
            })
            ->afterPersist(function () {
                $interval = new \DateInterval(('PT30M'));
                self::$startTime = self::$startTime->add($interval);
            })
        ;
    }

    protected static function getClass(): string
    {
        return Escale::class;
    }
}
