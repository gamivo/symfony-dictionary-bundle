<?php

namespace Mrynarzewski\DictionaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Mrynarzewski\DictionaryBundle\Repository\DictionaryItemRepository")
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(columns={"dictionary_id", "item"}) })
 */
class DictionaryItem
{
    /**
     * @var int|null
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var Dictionary
     * @ORM\ManyToOne(targetEntity="Dictionary", inversedBy="items")
     * @Assert\NotBlank()
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $dictionary;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $item;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDictionary(): ?Dictionary
    {
        return $this->dictionary;
    }

    public function getItem(): ?string
    {
        return $this->item;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return mixed|null
     */
    public function getExtra()
    {
        return $this->extra;
    }

    public function setDictionary(Dictionary $dictionary): self
    {
        $this->dictionary = $dictionary;
        return $this;
    }

    public function setItem(string $item): self
    {
        $this->item = $item;
        return $this;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed|null $extra
     * @return DictionaryItem
     */
    public function setExtra($extra): self
    {
        $this->extra = $extra;
        return $this;
    }
}