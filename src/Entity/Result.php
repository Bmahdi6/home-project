<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultRepository")
 */
class Result
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $feedback;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $remark;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Qcm", inversedBy="results")
     * @ORM\JoinColumn(nullable=false)
     */
    private $qcm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getFeedback(): ?string
    {
        return $this->feedback;
    }

    public function setFeedback(?string $feedback): self
    {
        $this->feedback = $feedback;

        return $this;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function setRemark(?string $remark): self
    {
        $this->remark = $remark;

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

    public function getQcm(): ?Qcm
    {
        return $this->qcm;
    }

    public function setQcm(?Qcm $qcm): self
    {
        $this->qcm = $qcm;

        return $this;
    }
}
