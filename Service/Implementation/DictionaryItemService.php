<?php

namespace Mrynarzewski\DictionaryBundle\Service\Implementation;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Mrynarzewski\DictionaryBundle\Entity\Dictionary;
use Mrynarzewski\DictionaryBundle\Entity\DictionaryItem;
use Mrynarzewski\DictionaryBundle\Service\DictionaryItemServiceInterface;
use Symfony\Component\Intl\Exception\NotImplementedException;

class DictionaryItemService implements DictionaryItemServiceInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritdoc
     */
    public function create(Dictionary $dictionary, string $item, ?string $description = null, $extra = null): DictionaryItem
    {
        try {
            $result = new DictionaryItem();
            $result->setDictionary($dictionary);
            $result->setItem($item);
            $result->setDescription($description);
            $result->setExtra($extra);
            $this->entityManager->persist($result);
            $this->entityManager->flush();
        } catch (UniqueConstraintViolationException $e) {
            throw $e;
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function updateDescription(DictionaryItem $dictionaryItem, ?string $description): bool
    {
        $dictionaryItem->setDescription($description);
        $this->entityManager->persist($dictionaryItem);
        $this->entityManager->flush();
        return true;
    }

    /**
     * @inheritdoc
     */
    public function updateExtra(DictionaryItem $dictionaryItem, $extra): bool
    {
        $dictionaryItem->setExtra($extra);
        $this->entityManager->persist($dictionaryItem);
        $this->entityManager->flush();
        return true;
    }

    /**
     * @inheritdoc
     */
    public function delete(DictionaryItem $dictionaryItem): bool
    {
        throw new NotImplementedException('You cannot delete this dictionary item');
    }
}