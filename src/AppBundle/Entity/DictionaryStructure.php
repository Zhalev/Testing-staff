<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DictionaryStructure
 *
 * @ORM\Table(name="DICTIONARY_STRUCTURE")
 * @ORM\Entity
 */
class DictionaryStructure
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nElementKey", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nelementkey;

    /**
     * @var string
     *
     * @ORM\Column(name="cElementName", type="string", length=250, nullable=true)
     */
    private $celementname;

    /**
     * @var integer
     *
     * @ORM\Column(name="nParentKey", type="integer", nullable=true)
     */
    private $nparentkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nLevel", type="integer", nullable=true)
     */
    private $nlevel;

    /**
     * @return int
     */
    public function getNelementkey()
    {
        return $this->nelementkey;
    }

    /**
     * @param int $nelementkey
     */
    public function setNelementkey($nelementkey)
    {
        $this->nelementkey = $nelementkey;
    }

    /**
     * @return string
     */
    public function getCelementname()
    {
        return $this->celementname;
    }

    /**
     * @param string $celementname
     */
    public function setCelementname($celementname)
    {
        $this->celementname = $celementname;
    }

    /**
     * @return int
     */
    public function getNparentkey()
    {
        return $this->nparentkey;
    }

    /**
     * @param int $nparentkey
     */
    public function setNparentkey($nparentkey)
    {
        $this->nparentkey = $nparentkey;
    }

    /**
     * @return int
     */
    public function getNlevel()
    {
        return $this->nlevel;
    }

    /**
     * @param int $nlevel
     */
    public function setNlevel($nlevel)
    {
        $this->nlevel = $nlevel;
    }

    /**
     *
     * @ORM\OneToMany(targetEntity="Tests", mappedBy="organization", cascade={"remove"})
     * @ORM\JoinColumn(name="nElementKey", referencedColumnName="organization")
     */
    private $tests;

    /**
     * @ORM\OneToMany(targetEntity="Courses", mappedBy="organization", cascade={"remove"})
     * @ORM\JoinColumn(name="nElementKey", referencedColumnName="organization")
     *
     */
    private $courses;

    function __construct()
    {
        $this->tests = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getCourses()
    {
        return $this->courses;
    }



}

