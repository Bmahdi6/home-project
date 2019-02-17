<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
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
    private $question;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $indexQuestion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Theme", inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $theme;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Answer", mappedBy="question")
     */
    private $answers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\QcmQuestion", mappedBy="question")
     */
    private $qcmQuestions;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->qcmQuestions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getIndexQuestion(): ?string
    {
        return $this->indexQuestion;
    }

    public function setIndexQuestion(?string $indexQuestion): self
    {
        $this->indexQuestion = $indexQuestion;

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

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return Collection|Answer[]
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setQuestion($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->contains($answer)) {
            $this->answers->removeElement($answer);
            // set the owning side to null (unless already changed)
            if ($answer->getQuestion() === $this) {
                $answer->setQuestion(null);
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
            $qcmQuestion->setQuestion($this);
        }

        return $this;
    }

    public function removeQcmQuestion(QcmQuestion $qcmQuestion): self
    {
        if ($this->qcmQuestions->contains($qcmQuestion)) {
            $this->qcmQuestions->removeElement($qcmQuestion);
            // set the owning side to null (unless already changed)
            if ($qcmQuestion->getQuestion() === $this) {
                $qcmQuestion->setQuestion(null);
            }
        }

        return $this;
    }
}
