<?php

namespace Mrynarzewski\DictionaryBundle\Service\Traits;

use Mrynarzewski\DictionaryBundle\Service\DictionaryServiceInterface;

trait DictionaryServiceAwareTrait
{
    /**
     * @var DictionaryServiceInterface
     */
    protected $dictionaryService;

    /** @required */
    public function setDictionaryService(DictionaryServiceInterface $dictionaryService)
    {
        $this->dictionaryService = $dictionaryService;
    }
}
