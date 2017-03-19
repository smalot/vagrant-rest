<?php

namespace Smalot\Vagrant\DashboardBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Process
 *
 * @ORM\Table(name="process")
 * @ORM\Entity(repositoryClass="Smalot\Vagrant\DashboardBundle\Repository\ProcessRepository")
 */
class Process
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="command", type="string", length=255)
     */
    private $command;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=16)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="exit_code", type="integer", nullable=true)
     */
    private $exitCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started_at", type="datetime")
     */
    private $startedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ended_at", type="datetime")
     */
    private $endedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_at", type="datetime")
     */
    private $modifiedAt;

    /**
     * @var Machine
     *
     * @ORM\ManyToOne(targetEntity="Machine", inversedBy="processes")
     * @ORM\JoinColumn(name="machine_id", referencedColumnName="id")
     */
    private $machine;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="ProcessOutput", mappedBy="process")
     */
    private $outputs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->outputs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Process
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set command
     *
     * @param string $command
     *
     * @return Process
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Process
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set exitCode
     *
     * @param integer $exitCode
     *
     * @return Process
     */
    public function setExitCode($exitCode)
    {
        $this->exitCode = $exitCode;

        return $this;
    }

    /**
     * Get exitCode
     *
     * @return integer
     */
    public function getExitCode()
    {
        return $this->exitCode;
    }

    /**
     * Set startedAt
     *
     * @param \DateTime $startedAt
     *
     * @return Process
     */
    public function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * Get startedAt
     *
     * @return \DateTime
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * Set endedAt
     *
     * @param \DateTime $endedAt
     *
     * @return Process
     */
    public function setEndedAt($endedAt)
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    /**
     * Get endedAt
     *
     * @return \DateTime
     */
    public function getEndedAt()
    {
        return $this->endedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Process
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     *
     * @return Process
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set machine
     *
     * @param \Smalot\Vagrant\DashboardBundle\Entity\Machine $machine
     *
     * @return Process
     */
    public function setMachine(\Smalot\Vagrant\DashboardBundle\Entity\Machine $machine = null)
    {
        $this->machine = $machine;

        return $this;
    }

    /**
     * Get machine
     *
     * @return \Smalot\Vagrant\DashboardBundle\Entity\Machine
     */
    public function getMachine()
    {
        return $this->machine;
    }

    /**
     * Add output
     *
     * @param \Smalot\Vagrant\DashboardBundle\Entity\ProcessOutput $output
     *
     * @return Process
     */
    public function addOutput(\Smalot\Vagrant\DashboardBundle\Entity\ProcessOutput $output)
    {
        $this->outputs[] = $output;

        return $this;
    }

    /**
     * Remove output
     *
     * @param \Smalot\Vagrant\DashboardBundle\Entity\ProcessOutput $output
     */
    public function removeOutput(\Smalot\Vagrant\DashboardBundle\Entity\ProcessOutput $output)
    {
        $this->outputs->removeElement($output);
    }

    /**
     * Get outputs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOutputs()
    {
        return $this->outputs;
    }
}
