<?php

namespace Mrynarzewski\DictionaryBundle\Service;

use Mrynarzewski\DictionaryBundle\Entity\Dictionary;
use Mrynarzewski\DictionaryBundle\Entity\DictionaryItem;
use Mrynarzewski\DictionaryBundle\Exception\DuplicatedEntryException;
use Mrynarzewski\DictionaryBundle\Repository\Traits\DictionaryItemRepositoryAwareTrait;
use Mrynarzewski\DictionaryBundle\Repository\Traits\DictionaryRepositoryAwareTrait;
use Symfony\Component\Config\Definition\Exception\DuplicateKeyException;

interface DictionaryServiceInterface
{
    /**
     * creates new dictionary
     * @param string $id name of dictionary
     * @param string|null $description user friendly name of dictionary
     * @param mixed|null $extra extra data
     * @return Dictionary
     */
    function create(string $id, ?string $description = null, $extra = null): Dictionary;

    /**
     * updates description of given dictionary
     * @param Dictionary $dictionary given dictionary
     * @param string|null $description new description or null
     * @return bool indicate success
     */
    function updateDescription(Dictionary $dictionary, ?string $description): bool;

    /**
     * updates extra of given dictionary
     * @param Dictionary $dictionary given dictionary
     * @param mixed|null $extra new extra or null
     * @return bool indicate success
     */
    function updateExtra(Dictionary $dictionary, $extra): bool;

    /**
     * deletes dictionary
     * @param Dictionary $dictionary given dictionary
     * @return bool indicate success
     */
    function delete(Dictionary $dictionary): bool;
}