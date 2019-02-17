<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QcmQuestionRepository")
 */
class QcmQuestion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Question", inversedBy="qcmQuestions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Qcm", inversedBy="qcmQuestions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $qcm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

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
