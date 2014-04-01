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
}
