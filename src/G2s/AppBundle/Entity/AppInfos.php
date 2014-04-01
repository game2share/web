<?php

namespace G2s\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppInfos
 *
 * @ORM\Table(
 * 		uniqueConstraints={@ORM\UniqueConstraint(
 * 			name="uniqueAppInfo",
 * 			columns={"id_app", "id_platform"}
 * 		)}
 * )
 * @ORM\Entity(repositoryClass="G2s\AppBundle\Entity\AppInfosRepository")
 */
class AppInfos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idApp;

    /**
	 * @ORM\OneToOne(targetEntity="Apps")
	 * @ORM\JoinColumn(name="id_app", referencedColumnName="id", nullable=false)
     */
    private $app;

    /**
	 * @ORM\OneToOne(targetEntity="Platforms")
	 * @ORM\JoinColumn(name="id_platform", referencedColumnName="id", nullable=false)
     */
    private $platform;

    /**
     * @var string
     *
     * @ORM\Column(name="download_path", type="string", length=255)
     */
    private $downloadPath;

	/**
	 * @ORM\OneToMany(targetEntity="Comments", mappedBy="appInfo")
	 */
	private $comments;

	/**
	 * @ORM\OneToMany(targetEntity="Marks", mappedBy="appInfo")
	 */
	private $marks;


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
     * Set idApp
     *
     * @param integer $idApp
     * @return AppInfos
     */
    public function setIdApp($idApp)
    {
        $this->idApp = $idApp;

        return $this;
    }

    /**
     * Get idApp
     *
     * @return integer 
     */
    public function getIdApp()
    {
        return $this->idApp;
    }

    /**
     * Set idPlatform
     *
     * @param integer $idPlatform
     * @return AppInfos
     */
    public function setIdPlatform($idPlatform)
    {
        $this->idPlatform = $idPlatform;

        return $this;
    }

    /**
     * Get idPlatform
     *
     * @return integer 
     */
    public function getIdPlatform()
    {
        return $this->idPlatform;
    }

    /**
     * Set downloadPath
     *
     * @param string $downloadPath
     * @return AppInfos
     */
    public function setDownloadPath($downloadPath)
    {
        $this->downloadPath = $downloadPath;

        return $this;
    }

    /**
     * Get downloadPath
     *
     * @return string 
     */
    public function getDownloadPath()
    {
        return $this->downloadPath;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->marks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set app
     *
     * @param \G2s\AppBundle\Entity\Apps $app
     * @return AppInfos
     */
    public function setApp(\G2s\AppBundle\Entity\Apps $app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Get app
     *
     * @return \G2s\AppBundle\Entity\Apps 
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Set platform
     *
     * @param \G2s\AppBundle\Entity\Platforms $platform
     * @return AppInfos
     */
    public function setPlatform(\G2s\AppBundle\Entity\Platforms $platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return \G2s\AppBundle\Entity\Platforms 
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Add comments
     *
     * @param \G2s\AppBundle\Entity\Comments $comments
     * @return AppInfos
     */
    public function addComment(\G2s\AppBundle\Entity\Comments $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \G2s\AppBundle\Entity\Comments $comments
     */
    public function removeComment(\G2s\AppBundle\Entity\Comments $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add marks
     *
     * @param \G2s\AppBundle\Entity\Marks $marks
     * @return AppInfos
     */
    public function addMark(\G2s\AppBundle\Entity\Marks $marks)
    {
        $this->marks[] = $marks;

        return $this;
    }

    /**
     * Remove marks
     *
     * @param \G2s\AppBundle\Entity\Marks $marks
     */
    public function removeMark(\G2s\AppBundle\Entity\Marks $marks)
    {
        $this->marks->removeElement($marks);
    }

    /**
     * Get marks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMarks()
    {
        return $this->marks;
    }
}
