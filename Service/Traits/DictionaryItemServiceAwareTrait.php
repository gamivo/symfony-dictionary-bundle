<?php

namespace Mrynarzewski\DictionaryBundle\Service\Traits;

use Mrynarzewski\DictionaryBundle\Service\DictionaryItemServiceInterface;

trait DictionaryItemServiceAwareTrait
{
    /**
     * @var DictionaryItemServiceInterface
     */
    protected $dictionaryItemService;

    /** @required */
    public function setDictionaryItemService(DictionaryItemServiceInterface $dictionaryService)
    {
        $this->dictionaryItemService = $dictionaryService;
    }
}
