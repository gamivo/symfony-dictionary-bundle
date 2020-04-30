<?php

namespace Mrynarzewski\DictionaryBundle;

use Mrynarzewski\DictionaryBundle\DependencyInjection\DictionaryExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MrynarzewskiDictionaryBundle extends Bundle
{
    protected function getContainerExtensionClass()
    {
        return DictionaryExtension::class;
    }
}
