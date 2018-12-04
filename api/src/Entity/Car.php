<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A Uber car available to hire.
 *
 * @ApiResource(
 *     iri="https://schema.org/Car",
 *     itemOperations={
 *          "get"={"access_control": "is_granted('ROLE_USER') || object.getId() == 104"}
 *     }
 * )
 * @ORM\Entity()
 * @package App\Entity
 */
class Car
{
    /**
     * The id of the car.
     *
     * @var int $id
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * The brand of the car.
     *
     * @var string $brand
     * @ApiProperty(
     *     iri="https://schema.org/brand"
     * )
     * @ORM\Column()
     * @Groups("ride:item:read")
     * @Assert\NotBlank()
     */
    public $brand;

    /**
     * The model of the car.
     *
     * @var string $model
     * @ORM\Column()
     * @Groups("ride:item:read")
     * @Assert\NotBlank()
     */
    public $model;

    /**
     * The plate number of the car.
     *
     * @var string $plateNumber
     * @ORM\Column()
     * @Assert\NotBlank()
     */
    public $plateNumber;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ride", mappedBy="Car", orphanRemoval=true)
     */
    private $rides;

    public function __construct()
    {
        $this->rides = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Collection|Ride[]
     */
    public function getRides(): Collection
    {
        return $this->rides;
    }

    public function addRide(Ride $ride): self
    {
        if (!$this->rides->contains($ride)) {
            $this->rides[] = $ride;
            $ride->setCar($this);
        }

        return $this;
    }

    public function removeRide(Ride $ride): self
    {
        if ($this->rides->contains($ride)) {
            $this->rides->removeElement($ride);
            // set the owning side to null (unless already changed)
            if ($ride->getCar() === $this) {
                $ride->setCar(null);
            }
        }

        return $this;
    }
}
