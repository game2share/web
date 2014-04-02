<?php

namespace G2s\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apps
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G2s\AppBundle\Entity\AppsRepository")
 */
class Apps
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=2048)
     */
    private $description;

    /**
	 * @ORM\ManyToMany(targetEntity="Tags", inversedBy="apps")
	 * @ORM\JoinTable(
	 * 		name="appTags",
	 *		joinColumns={@ORM\JoinColumn(name="id_app", referencedColumnName="id")},
	 *		inverseJoinColumns={@ORM\JoinColumn(name="id_tag", referencedColumnName="id")}
	 * )
     */
    private $tags;

	/**
	 * @ORM\OneToMany(targetEntity="AppInfos", mappedBy="app")
	 */
	private $appInfos;

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
     * @return Apps
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
     * Set description
     *
     * @param string $description
     * @return Apps
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tags
     *
     * @param \G2s\AppBundle\Entity\Tags $tags
     * @return Apps
     */
    public function addTag(\G2s\AppBundle\Entity\Tags $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \G2s\AppBundle\Entity\Tags $tags
     */
    public function removeTag(\G2s\AppBundle\Entity\Tags $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add appInfos
     *
     * @param \G2s\AppBundle\Entity\AppInfos $appInfos
     * @return Apps
     */
    public function addAppInfo(\G2s\AppBundle\Entity\AppInfos $appInfos)
    {
        $this->appInfos[] = $appInfos;

        return $this;
    }

    /**
     * Remove appInfos
     *
     * @param \G2s\AppBundle\Entity\AppInfos $appInfos
     */
    public function removeAppInfo(\G2s\AppBundle\Entity\AppInfos $appInfos)
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
