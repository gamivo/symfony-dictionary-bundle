<?php

namespace Mrynarzewski\DictionaryBundle\Service;

use Mrynarzewski\DictionaryBundle\Entity\Dictionary;
use Mrynarzewski\DictionaryBundle\Entity\DictionaryItem;

interface DictionaryItemServiceInterface
{
    /**
     * creates new item in given dictionary
     * @param Dictionary $dictionary given dictionary
     * @param string $item new item
     * @param string|null $description user friendly item
     * @param mixed|null $extra extra data to this item
     * @return DictionaryItem result
     */
    function create(Dictionary $dictionary, string $item, ?string $description = null, $extra = null): DictionaryItem;

    /**
     * updates description of given dictionary
     * @param DictionaryItem $dictionaryItem given dictionary
     * @param string|null $description new description or null
     * @return bool indicate success
     */
    function updateDescription(DictionaryItem $dictionaryItem, ?string $description): bool;

    /**
     * updates extra of given dictionary
     * @param DictionaryItem $dictionaryItem given dictionary
     * @param mixed|null $extra new extra or null
     * @return bool indicate success
     */
    function updateExtra(DictionaryItem $dictionaryItem, $extra): bool;

    /**
     * deletes dictionary
     * @param DictionaryItem $dictionaryItem given dictionaryItem
     * @return bool indicate success
     */
    function delete(DictionaryItem $dictionaryItem): bool;
}