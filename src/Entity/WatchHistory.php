<?php

namespace App\Entity;

use App\Repository\WatchHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WatchHistoryRepository::class)]
class WatchHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $last_watched = null;

    #[ORM\Column]
    private ?int $number_of�_views = null;

    #[ORM\ManyToOne(inversedBy: 'watchHistories')]
    private ?User $watcher = null;

    #[ORM\ManyToOne]
    private ?Media $media = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastWatched(): ?int
    {
        return $this->last_watched;
    }

    public function setLastWatched(int $last_watched): static
    {
        $this->last_watched = $last_watched;

        return $this;
    }

    public function getNumberOf�Views(): ?int
    {
        return $this->number_of�_views;
    }

    public function setNumberOf�Views(int $number_of�_views): static
    {
        $this->number_of�_views = $number_of�_views;

        return $this;
    }

    public function getWatcher(): ?User
    {
        return $this->watcher;
    }

    public function setWatcher(?User $watcher): static
    {
        $this->watcher = $watcher;

        return $this;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): static
    {
        $this->media = $media;

        return $this;
    }
}
