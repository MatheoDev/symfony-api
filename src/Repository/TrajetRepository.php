<?php

namespace App\Repository;

use App\Entity\Trajet;
use App\Enums\TypeTrain;
use App\Model\Escale as EscaleModel;
use App\Model\Trajet as TrajetModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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
            $trajetsModel[] = $trajetModel;
        }

        return $trajetsModel;
    }

}
