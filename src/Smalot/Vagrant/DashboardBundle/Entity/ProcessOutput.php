<?php

namespace Smalot\Vagrant\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcessOutput
 *
 * @ORM\Table(name="process_output")
 * @ORM\Entity(repositoryClass="Smalot\Vagrant\DashboardBundle\Repository\ProcessOutputRepository")
 */
class ProcessOutput
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
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="smallint")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var Process
     *
     * @ORM\ManyToOne(targetEntity="Process", inversedBy="outputs")
     * @ORM\JoinColumn(name="process_id", referencedColumnName="id")
     */
    private $process;

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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ProcessOutput
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return ProcessOutput
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return ProcessOutput
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set process
     *
     * @param \Smalot\Vagrant\DashboardBundle\Entity\Process $process
     *
     * @return ProcessOutput
     */
    public function setProcess(\Smalot\Vagrant\DashboardBundle\Entity\Process $process = null)
    {
        $this->process = $process;

        return $this;
    }

    /**
     * Get process
     *
     * @return \Smalot\Vagrant\DashboardBundle\Entity\Process
     */
    public function getProcess()
    {
        return $this->process;
    }
}
