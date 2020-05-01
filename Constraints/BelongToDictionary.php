<?php

namespace Mrynarzewski\DictionaryBundle\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class BelongToDictionary extends Constraint
{
    const IS_BELONG_TO_DICTIONARY_ERROR = '16f347b9094f57a8d960a552ef9348a8';

    protected static $errorNames = [
        self::IS_BELONG_TO_DICTIONARY_ERROR => 'IS_BELONG_TO_DICTIONARY_ERROR',
    ];
    public $dictionary;
    public $nullable = false;

    public $message = 'Value {{ value }} must belong to dictionary {{ dictionary }}';
}