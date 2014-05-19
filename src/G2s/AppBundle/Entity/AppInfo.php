<?php

namespace G2s\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppInfo
 *
 * @ORM\Table(
 * 		uniqueConstraints={@ORM\UniqueConstraint(
 * 			name="uniqueAppInfo",
 * 			columns={"id_app", "id_platform"}
 * 		)}
 * )
 * @ORM\Entity(repositoryClass="G2s\AppBundle\Entity\AppInfoRepository")
 */
class AppInfo
{
    /**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="App", inversedBy="appInfos")
	 * @ORM\JoinColumn(name="id_app", referencedColumnName="id", nullable=false)
     */
    private $app;

    /**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Platform", inversedBy="appInfos")
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
	 * @var string
	 *
	 * @ORM\Column(name="manual", type="string", length=8192)
	 */
	private $manual;

	/**
	 * @ORM\OneToMany(targetEntity="Comment", mappedBy="appInfo")
	 * @ORM\OrderBy({"id" = "DESC"})
	 */
	private $comments;

    /**
     * @var integer
     *
     * @ORM\Column(name="average_mark", type="integer", nullable=true)
     */
    private $average_mark;

	/**
	 * @ORM\OneToMany(targetEntity="Mark", mappedBy="appInfo")
	 */
	private $marks;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->marks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set downloadPath
     *
     * @param string $downloadPath
     * @return AppInfo
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
     * Set app
     *
     * @param \G2s\AppBundle\Entity\App $app
     * @return AppInfo
     */
    public function setApp(\G2s\AppBundle\Entity\App $app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Get app
     *
     * @return \G2s\AppBundle\Entity\App 
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Set platform
     *
     * @param \G2s\AppBundle\Entity\Platform $platform
     * @return AppInfo
     */
    public function setPlatform(\G2s\AppBundle\Entity\Platform $platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return \G2s\AppBundle\Entity\Platform 
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Add comments
     *
     * @param \G2s\AppBundle\Entity\Comment $comments
     * @return AppInfo
     */
    public function addComment(\G2s\AppBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \G2s\AppBundle\Entity\Comment $comments
     */
    public function removeComment(\G2s\AppBundle\Entity\Comment $comments)
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
     * @param \G2s\AppBundle\Entity\Mark $marks
     * @return AppInfo
     */
    public function addMark(\G2s\AppBundle\Entity\Mark $marks)
    {
        $this->marks[] = $marks;

        return $this;
    }

    /**
     * Remove marks
     *
     * @param \G2s\AppBundle\Entity\Mark $marks
     */
    public function removeMark(\G2s\AppBundle\Entity\Mark $marks)
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

    /**
     * Set manual
     *
     * @param string $manual
     * @return AppInfo
     */
    public function setManual($manual)
    {
        $this->manual = $manual;

        return $this;
    }

    /**
     * Get manual
     *
     * @return string 
     */
    public function getManual()
    {
        return $this->manual;
    }

    /**
     * Set average_mark
     *
     * @param integer $averageMark
     * @return AppInfo
     */
    public function setAverageMark($averageMark)
    {
        $this->average_mark = $averageMark;

        return $this;
    }

    /**
     * Get average_mark
     *
     * @return integer 
     */
    public function getAverageMark()
    {
        return $this->average_mark;
    }
}
