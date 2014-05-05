<?php

namespace G2s\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G2s\AppBundle\Entity\CommentRepository")
 */
class Comment
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
	 * @ORM\ManyToOne(targetEntity="AppInfo", inversedBy="comments")
	 * @ORM\JoinColumns(
	 * 		@ORM\JoinColumn(name="id_app", referencedColumnName="id_app", nullable=false),
	 * 		@ORM\JoinColumn(name="id_platform", referencedColumnName="id_platform", nullable=false)
	 * )
     */
    private $appInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=256)
     */

    private $title;
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=2048)
     */
    private $comment;

	/**
	 * @ORM\OneToOne(targetEntity="Mark")
	 * @ORM\JoinColumn(name="id_mark", referencedColumnName="id")
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
     * Set comment
     *
     * @param string $comment
     * @return Comment
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
     * @param \G2s\AppBundle\Entity\AppInfo $appInfo
     * @return Comment
     */
    public function setAppInfo(\G2s\AppBundle\Entity\AppInfo $appInfo)
    {
        $this->appInfo = $appInfo;

        return $this;
    }

    /**
     * Get appInfo
     *
     * @return \G2s\AppBundle\Entity\AppInfo 
     */
    public function getAppInfo()
    {
        return $this->appInfo;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Comment
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set mark
     *
     * @param \G2s\AppBundle\Entity\Mark $mark
     * @return Comment
     */
    public function setMark(\G2s\AppBundle\Entity\Mark $mark = null)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return \G2s\AppBundle\Entity\Mark 
     */
    public function getMark()
    {
        return $this->mark;
    }
}
