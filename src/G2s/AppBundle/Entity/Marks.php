<?php

namespace G2s\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marks
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G2s\AppBundle\Entity\MarksRepository")
 */
class Marks
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
	 * @ORM\ManyToOne(targetEntity="AppInfos", inversedBy="marks")
	 * @ORM\JoinColumn(name="id_appInfo", referencedColumnName="id", nullable=false)
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
     * Set idAppInfo
     *
     * @param integer $idAppInfo
     * @return Marks
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
     * Set mark
     *
     * @param integer $mark
     * @return Marks
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
}
