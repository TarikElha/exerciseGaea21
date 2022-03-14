<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[Groups('client')]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Groups('client')]
    #[ORM\Column(type: 'string', length: 255)]
    private $lastname;

    #[Groups('client')]
    #[ORM\Column(type: 'string', length: 255)]
    private $firstname;

    #[Groups('client')]
    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[Groups('client')]
    #[ORM\Column(type: 'string', length: 255)]
    private $adress;

    #[Groups('client')]
    #[ORM\Column(type: 'string', length: 255)]
    private $tel;

    #[Groups('client')]
    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Possession::class, orphanRemoval:true)]
    private $possessions;

    #[Groups('client')]
    #[ORM\Column(type: 'datetime')]
    private $birthDate;

    public function __construct()
    {
        $this->possessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection<int, Possession>
     */
    public function getPossessions(): Collection
    {
        return $this->possessions;
    }

    public function addPossession(Possession $possession): self
    {
        if (!$this->possessions->contains($possession)) {
            $this->possessions[] = $possession;
            $possession->setClient($this);
        }

        return $this;
    }

    public function removePossession(Possession $possession): self
    {
        if ($this->possessions->removeElement($possession)) {
            // set the owning side to null (unless already changed)
            if ($possession->getClient() === $this) {
                $possession->setClient(null);
            }
        }

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }
}
