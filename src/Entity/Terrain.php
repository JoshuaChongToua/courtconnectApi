<?php

namespace App\Entity;

use App\Repository\TerrainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TerrainRepository::class)]
class Terrain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $code_postal = null;

    #[ORM\Column]
    private ?float $latitude = null;

    #[ORM\Column]
    private ?float $longitude = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(length: 255)]
    private ?string $sol = null;

    #[ORM\Column]
    private ?int $nb_panier = null;

    #[ORM\Column]
    private ?bool $filet = null;

    #[ORM\Column]
    private ?bool $spectateur = null;

    #[ORM\ManyToOne(inversedBy: 'terrains')]
    private ?User $created_by = null;

    /**
     * @var Collection<int, Event>
     */
    #[ORM\OneToMany(targetEntity: Event::class, mappedBy: 'terrain')]
    private Collection $events;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'favori')]
    private Collection $favori;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->favori = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getSol(): ?string
    {
        return $this->sol;
    }

    public function setSol(string $sol): static
    {
        $this->sol = $sol;

        return $this;
    }

    public function getNbPanier(): ?int
    {
        return $this->nb_panier;
    }

    public function setNbPanier(int $nb_panier): static
    {
        $this->nb_panier = $nb_panier;

        return $this;
    }

    public function isFilet(): ?bool
    {
        return $this->filet;
    }

    public function setFilet(bool $filet): static
    {
        $this->filet = $filet;

        return $this;
    }

    public function isSpectateur(): ?bool
    {
        return $this->spectateur;
    }

    public function setSpectateur(bool $spectateur): static
    {
        $this->spectateur = $spectateur;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->created_by;
    }

    public function setCreatedBy(?User $created_by): static
    {
        $this->created_by = $created_by;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): static
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setTerrain($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): static
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getTerrain() === $this) {
                $event->setTerrain(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getFavori(): Collection
    {
        return $this->favori;
    }

    public function addFavori(User $favori): static
    {
        if (!$this->favori->contains($favori)) {
            $this->favori->add($favori);
        }

        return $this;
    }

    public function removeFavori(User $favori): static
    {
        $this->favori->removeElement($favori);

        return $this;
    }
}
