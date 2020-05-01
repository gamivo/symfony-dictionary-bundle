<?php

namespace Mrynarzewski\DictionaryBundle\Repository\Traits;

use Mrynarzewski\DictionaryBundle\Repository\DictionaryItemRepository;

trait DictionaryItemRepositoryAwareTrait
{
    /**
     * @var DictionaryItemRepository
     */
    protected $dictionaryItemRepository;

    /** @required */
    public function setDictionaryItemRepository(DictionaryItemRepository $dictionaryItemRepository)
    {
        $this->dictionaryItemRepository = $dictionaryItemRepository;
    }
}
