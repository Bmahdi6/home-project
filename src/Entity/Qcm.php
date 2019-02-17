<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QcmRepository")
 */
class Qcm
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $level;

    /**
     * @ORM\Column(type="date")
     */
    private $publicationDate;

    /**
     * @ORM\Column(type="date")
     */
    private $limitDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="integer")
     */
    private $justPoint;

    /**
     * @ORM\Column(type="integer")
     */
    private $falsePoint;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="qcms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Result", mappedBy="qcm")
     */
    private $results;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\QcmQuestion", mappedBy="qcm")
     */
    private $qcmQuestions;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->results = new ArrayCollection();
        $this->qcmQuestions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getLimitDate(): ?\DateTimeInterface
    {
        return $this->limitDate;
    }

    public function setLimitDate(\DateTimeInterface $limitDate): self
    {
        $this->limitDate = $limitDate;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getJustPoint(): ?int
    {
        return $this->justPoint;
    }

    public function setJustPoint(int $justPoint): self
    {
        $this->justPoint = $justPoint;

        return $this;
    }

    public function getFalsePoint(): ?int
    {
        return $this->falsePoint;
    }

    public function setFalsePoint(int $falsePoint): self
    {
        $this->falsePoint = $falsePoint;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Result[]
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(Result $result): self
    {
        if (!$this->results->contains($result)) {
            $this->results[] = $result;
            $result->setQcm($this);
        }

        return $this;
    }

    public function removeResult(Result $result): self
    {
        if ($this->results->contains($result)) {
            $this->results->removeElement($result);
            // set the owning side to null (unless already changed)
            if ($result->getQcm() === $this) {
                $result->setQcm(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|QcmQuestion[]
     */
    public function getQcmQuestions(): Collection
    {
        return $this->qcmQuestions;
    }

    public function addQcmQuestion(QcmQuestion $qcmQuestion): self
    {
        if (!$this->qcmQuestions->contains($qcmQuestion)) {
            $this->qcmQuestions[] = $qcmQuestion;
            $qcmQuestion->setQcm($this);
        }

        return $this;
    }

    public function removeQcmQuestion(QcmQuestion $qcmQuestion): self
    {
        if ($this->qcmQuestions->contains($qcmQuestion)) {
            $this->qcmQuestions->removeElement($qcmQuestion);
            // set the owning side to null (unless already changed)
            if ($qcmQuestion->getQcm() === $this) {
                $qcmQuestion->setQcm(null);
            }
        }

        return $this;
    }
}
