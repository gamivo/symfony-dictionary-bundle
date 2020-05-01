<?php

namespace Mrynarzewski\DictionaryBundle\Constraints;

use Doctrine\ORM\EntityManagerInterface;
use Mrynarzewski\DictionaryBundle\Repository\Traits\DictionaryItemRepositoryAwareTrait;
use Mrynarzewski\DictionaryBundle\Repository\Traits\DictionaryRepositoryAwareTrait;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class BelongToDictionaryValidator extends ConstraintValidator
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    use DictionaryRepositoryAwareTrait;
    use DictionaryItemRepositoryAwareTrait;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof BelongToDictionary) {
            throw new UnexpectedTypeException($constraint, BelongToDictionary::class);
        }

        if (null === $value) {
            return;
        }
        $dictionary = $this->dictionaryRepository->find($constraint->dictionary);
        $possibleValues = $this->dictionaryItemRepository->findBy([
            'dictionary' => $dictionary,
        ]);

        if (!in_array($value, $possibleValues) ) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->setParameter('{{ dictionary }}', $constraint->dictionary)
                ->setCode($constraint::IS_BELONG_TO_DICTIONARY_ERROR)
                ->addViolation();
        }
    }
}