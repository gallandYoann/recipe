<?php

namespace App\Infrastructure\Symfony\Repository;

use App\Domain\Recipe\Entity\Recipe;
use App\Domain\Recipe\Repository\RecipeRepositoryInterface;
use App\Infrastructure\Symfony\Entity\Recipe as RecipeDoctrineEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RecipeDoctrineEntity>
 *
 * @method RecipeDoctrineEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeDoctrineEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeDoctrineEntity[]    findAll()
 * @method RecipeDoctrineEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeRepository extends ServiceEntityRepository implements RecipeRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipeDoctrineEntity::class);
    }

    public function add(Recipe $recipe): Recipe
    {
        $entity = (new RecipeDoctrineEntity())
            ->setTitle($recipe->getTitle())
            ->setDescription($recipe->getDescription());

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();

        $recipe->setId($entity->getId());

        return $recipe;
    }
}
