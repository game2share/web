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
     * @var integer
     *
     * @ORM\Column(name="id_appInfo", type="integer")
     */
    private $idAppInfo;

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
}
