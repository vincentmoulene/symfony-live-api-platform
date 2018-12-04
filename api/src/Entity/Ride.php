<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ApiResource(
 *     normalizationContext={
 *          "groups": {"ride:list:read"}
 *     },
 *     itemOperations={
 *         "get": {"normalization_context": {"groups": {"ride:item:read"}}}
 *     },
 *     collectionOperations={"get"}
 * )
 * @ApiFilter(PropertyFilter::class)
 * @ApiFilter(OrderFilter::class, properties={"startPlace"})
 * @ORM\Entity(repositoryClass="App\Repository\RideRepository")
 */
class Ride
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ride:list:read", "ride:item:read"})
     * @ApiFilter(SearchFilter::class, strategy="ipartial")
     */
    private $StartPlace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"ride:list:read", "ride:item:read"})
     */
    private $EndPlace;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Car", inversedBy="rides")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"ride:list:read", "ride:item:read"})
     */
    private $Car;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartPlace(): ?string
    {
        return $this->StartPlace;
    }

    public function setStartPlace(string $StartPlace): self
    {
        $this->StartPlace = $StartPlace;

        return $this;
    }

    public function getEndPlace(): ?string
    {
        return $this->EndPlace;
    }

    public function setEndPlace(?string $EndPlace): self
    {
        $this->EndPlace = $EndPlace;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->Car;
    }

    public function setCar(?Car $Car): self
    {
        $this->Car = $Car;

        return $this;
    }
}
