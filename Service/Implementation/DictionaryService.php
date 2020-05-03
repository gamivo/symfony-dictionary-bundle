<?php

namespace Mrynarzewski\DictionaryBundle\Service\Implementation;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Mrynarzewski\DictionaryBundle\Entity\Dictionary;
use Mrynarzewski\DictionaryBundle\Service\DictionaryServiceInterface;
use Symfony\Component\Intl\Exception\NotImplementedException;

class DictionaryService implements DictionaryServiceInterface
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
    public function create(string $id, ?string $description = null, $extra = null): Dictionary
    {
        try {
            $result = new Dictionary();
            $result->setId($id);
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
    public function updateDescription(Dictionary $dictionary, ?string $description): bool
    {
        $dictionary->setDescription($description);
        $this->entityManager->persist($dictionary);
        $this->entityManager->flush();
        return true;
    }

    /**
     * @inheritdoc
     */
    public function updateExtra(Dictionary $dictionary, $extra): bool
    {
        $dictionary->setExtra($extra);
        $this->entityManager->persist($dictionary);
        $this->entityManager->flush();
        return true;
    }

    /**
     * @inheritdoc
     */
    public function delete(Dictionary $dictionary): bool
    {
        throw new NotImplementedException('You cannot delete this dictionary');
    }
}