<?php

namespace Smalot\Vagrant\DashboardBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Machine
 *
 * @ORM\Table(name="machine")
 * @ORM\Entity(repositoryClass="Smalot\Vagrant\DashboardBundle\Repository\MachineRepository")
 */
class Machine
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
     * @ORM\Column(name="internal_id", type="string", length=16, unique=true)
     */
    private $internalId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="provider", type="string", length=32)
     */
    private $provider;

    /**
     * @var string
     *
     * @ORM\Column(name="directory", type="string", length=255)
     */
    private $directory;

    /**
     * @var string
     *
     * @ORM\Column(name="stage", type="string", length=16)
     */
    private $stage;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=16)
     */
    private $status;

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
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Process", mappedBy="machine")
     */
    private $processes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->processes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set internalId
     *
     * @param string $internalId
     *
     * @return Machine
     */
    public function setInternalId($internalId)
    {
        $this->internalId = $internalId;

        return $this;
    }

    /**
     * Get internalId
     *
     * @return string
     */
    public function getInternalId()
    {
        return $this->internalId;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Machine
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
     * Set provider
     *
     * @param string $provider
     *
     * @return Machine
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Get provider
     *
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set directory
     *
     * @param string $directory
     *
     * @return Machine
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * Get directory
     *
     * @return string
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Set stage
     *
     * @param string $stage
     *
     * @return Machine
     */
    public function setStage($stage)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * Get stage
     *
     * @return string
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Machine
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Machine
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
     * @return Machine
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
     * Add process
     *
     * @param \Smalot\Vagrant\DashboardBundle\Entity\Process $process
     *
     * @return Machine
     */
    public function addProcess(\Smalot\Vagrant\DashboardBundle\Entity\Process $process)
    {
        $this->processes[] = $process;

        return $this;
    }

    /**
     * Remove process
     *
     * @param \Smalot\Vagrant\DashboardBundle\Entity\Process $process
     */
    public function removeProcess(\Smalot\Vagrant\DashboardBundle\Entity\Process $process)
    {
        $this->processes->removeElement($process);
    }

    /**
     * Get processes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProcesses()
    {
        return $this->processes;
    }
}
