<?php

namespace Mrynarzewski\DictionaryBundle\Repository;

use Mrynarzewski\DictionaryBundle\Entity\Dictionary;
use Mrynarzewski\DictionaryBundle\Entity\DictionaryItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DictionaryItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method DictionaryItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method DictionaryItem[]    findAll()
 * @method DictionaryItem[]    findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
 */
class DictionaryItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DictionaryItem::class);
    }

    /**
     * @param Dictionary $dictionary
     * @return DictionaryItem[]
     */
    public function getItemsFromDictionary(Dictionary $dictionary, ?string $dictionaryItem = null): array
    {
        $queryBuilder = $this->createQueryBuilder('d');
        $queryBuilder->andWhere('d.dictionary = :dictionary');
        $queryBuilder->setParameter('dictionary', $dictionary);
        if (!empty($dictionaryItem ) ) {
            $queryBuilder->andWhere('d.item like :item');
            $queryBuilder->setParameter('item', $dictionaryItem.'%');
        }
        return $queryBuilder->getQuery()->getResult();
    }
}