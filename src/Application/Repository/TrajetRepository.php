<?php

namespace App\Application\Repository;

use App\Application\Entity\Trajet;
use App\Domain\Enums\TypeTrain;
use App\Domain\Model\Escale as EscaleModel;
use App\Domain\Model\NullTrajet;
use App\Domain\Model\Trajet as TrajetModel;
use App\Domain\Model\TrajetInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

/**
 * @extends ServiceEntityRepository<Trajet>
 *
 * @method Trajet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trajet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trajet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrajetRepository extends ServiceEntityRepository implements TrajetRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trajet::class);
    }

    public function findAll(): array
    {
        /** @var Trajet[] $trajets */
        $trajets = $this->createQueryBuilder('t')
            ->select('t')
            ->getQuery()
            ->getResult();

        /** @var TrajetModel[] $trajetsModel */
        $trajetsModel = [];

        /** @var Trajet $trajet */
        foreach ($trajets as $trajet) {
            // Create escales to model
            $escalesModel = array_map(function ($escale) {
                return new EscaleModel($escale->getGare(), $escale->getVoie(), $escale->getHoraire());
            }, $trajet->getEscales()->toArray());
            // Create Trajet
            $trajetModel = new TrajetModel(TypeTrain::from($trajet->getType()), ...$escalesModel);
            $trajetModel->setId($trajet->getId());
            $trajetsModel[] = $trajetModel;
        }

        return $trajetsModel;
    }

    public function findOneById(Uuid $id): TrajetInterface
    {
        $trajet = $this->createQueryBuilder('t')
            ->select('t')
            ->where('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();

        if (null === $trajet) {
            return new NullTrajet();
        }

        // Create escales to model
        $escalesModel = array_map(function ($escale) {
            return new EscaleModel($escale->getGare(), $escale->getVoie(), $escale->getHoraire());
        }, $trajet->getEscales()->toArray());
        // Create Trajet
        $trajetModel = new TrajetModel(TypeTrain::from($trajet->getType()), ...$escalesModel);
        $trajetModel->setId($trajet->getId());
        return $trajetModel;
    }

}
