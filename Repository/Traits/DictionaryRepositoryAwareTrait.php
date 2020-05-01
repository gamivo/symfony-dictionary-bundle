<?php

namespace Mrynarzewski\DictionaryBundle\Repository\Traits;

use Mrynarzewski\DictionaryBundle\Repository\DictionaryRepository;

trait DictionaryRepositoryAwareTrait
{
    /**
     * @var DictionaryRepository
     */
    protected $dictionaryRepository;

    /** @required */
    public function setDictionaryRepository(DictionaryRepository $dictionaryRepository)
    {
        $this->dictionaryRepository = $dictionaryRepository;
    }
}
