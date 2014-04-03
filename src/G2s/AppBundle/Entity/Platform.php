<?php

namespace G2s\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Platform
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G2s\AppBundle\Entity\PlatformRepository")
 */
class Platform
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

	/**
	 * @ORM\OneToMany(targetEntity="AppInfo", mappedBy="platform")
	 */
	private $appInfos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->appInfos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Platform
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add appInfos
     *
     * @param \G2s\AppBundle\Entity\AppInfo $appInfos
     * @return Platform
     */
    public function addAppInfo(\G2s\AppBundle\Entity\AppInfo $appInfos)
    {
        $this->appInfos[] = $appInfos;

        return $this;
    }

    /**
     * Remove appInfos
     *
     * @param \G2s\AppBundle\Entity\AppInfo $appInfos
     */
    public function removeAppInfo(\G2s\AppBundle\Entity\AppInfo $appInfos)
    {
        $this->appInfos->removeElement($appInfos);
    }

    /**
     * Get appInfos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAppInfos()
    {
        return $this->appInfos;
    }
}
