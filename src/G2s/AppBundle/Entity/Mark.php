<?php

namespace G2s\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mark
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G2s\AppBundle\Entity\MarkRepository")
 */
class Mark
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
	 * @ORM\ManyToOne(targetEntity="AppInfo", inversedBy="marks")
	 * @ORM\JoinColumns(
	 *	 	@ORM\JoinColumn(name="id_app", referencedColumnName="id_app", nullable=false),
	 * 		@ORM\JoinColumn(name="id_platform", referencedColumnName="id_platform", nullable=false)
	 * )
     */
    private $appInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="mark", type="integer")
     */
    private $mark;

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
     * Set mark
     *
     * @param integer $mark
     * @return Mark
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return integer 
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set appInfo
     *
     * @param \G2s\AppBundle\Entity\AppInfo $appInfo
     * @return Mark
     */
    public function setAppInfo(\G2s\AppBundle\Entity\AppInfo $appInfo)
    {
        $this->appInfo = $appInfo;

        return $this;
    }

    /**
     * Get appInfo
     *
     * @return \G2s\AppBundle\Entity\AppInfo 
     */
    public function getAppInfo()
    {
        return $this->appInfo;
    }
}
