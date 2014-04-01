<?php

namespace G2s\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G2s\AppBundle\Entity\CommentsRepository")
 */
class Comments
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
	 * @ORM\ManyToOne(targetEntity="AppInfos", inversedBy="comments")
	 * @ORM\JoinColumn(name="id_appInfo", referencedColumnName="id", nullable=false)
     */
    private $appInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=2048)
     */
    private $comment;


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
     * Set idAppInfo
     *
     * @param integer $idAppInfo
     * @return Comments
     */
    public function setIdAppInfo($idAppInfo)
    {
        $this->idAppInfo = $idAppInfo;

        return $this;
    }

    /**
     * Get idAppInfo
     *
     * @return integer 
     */
    public function getIdAppInfo()
    {
        return $this->idAppInfo;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Comments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set appInfo
     *
     * @param \G2s\AppBundle\Entity\AppInfos $appInfo
     * @return Comments
     */
    public function setAppInfo(\G2s\AppBundle\Entity\AppInfos $appInfo)
    {
        $this->appInfo = $appInfo;

        return $this;
    }

    /**
     * Get appInfo
     *
     * @return \G2s\AppBundle\Entity\AppInfos 
     */
    public function getAppInfo()
    {
        return $this->appInfo;
    }
}