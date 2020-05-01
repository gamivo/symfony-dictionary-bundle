<?php

namespace Mrynarzewski\DictionaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Mrynarzewski\DictionaryBundle\Repository\DictionaryRepository")
 */
class Dictionary
{
    /**
     * @var string|null
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @var mixed|null
     * @ORM\Column(type="json", nullable=true)
     */
    private $extra;

    /**
     * @var DictionaryItem[]|PersistentCollection
     * @ORM\OneToMany(targetEntity="DictionaryItem", mappedBy="dictionary")
     */
    private $items;


    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param mixed|null $extra
     * @return Dictionary
     */
    public function setExtra($extra): self
    {
        $this->extra = $extra;
        return $this;
    }

    /**
     * @return PersistentCollection|DictionaryItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

}