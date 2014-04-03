<?php

namespace G2s\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * App
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G2s\AppBundle\Entity\AppRepository")
 */
class App
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
	 * @ORM\ManyToMany(targetEntity="Tag", inversedBy="apps")
	 * @ORM\JoinTable(
	 * 		name="appTags",
	 *		joinColumns={@ORM\JoinColumn(name="id_app", referencedColumnName="id")},
	 *		inverseJoinColumns={@ORM\JoinColumn(name="id_tag", referencedColumnName="id")}
	 * )
     */
    private $tags;

	/**
	 * @ORM\OneToMany(targetEntity="AppInfo", mappedBy="app")
	 */
	private $appInfos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return App
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
     * @return App
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
     * Add tags
     *
     * @param \G2s\AppBundle\Entity\Tag $tags
     * @return App
     */
    public function addTag(\G2s\AppBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \G2s\AppBundle\Entity\Tag $tags
     */
    public function removeTag(\G2s\AppBundle\Entity\Tag $tags)
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
     * @param \G2s\AppBundle\Entity\AppInfo $appInfos
     * @return App
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
