<?php

namespace G2s\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppTags
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G2s\AppBundle\Entity\AppTagsRepository")
 */
class AppTags
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
     * @ORM\Column(name="id_app", type="integer")
     */
    private $idApp;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tag", type="integer")
     */
    private $idTag;


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
     * @return AppTags
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
     * Set idTag
     *
     * @param integer $idTag
     * @return AppTags
     */
    public function setIdTag($idTag)
    {
        $this->idTag = $idTag;

        return $this;
    }

    /**
     * Get idTag
     *
     * @return integer 
     */
    public function getIdTag()
    {
        return $this->idTag;
    }
}
