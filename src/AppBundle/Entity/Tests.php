<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tests
 *
 * @ORM\Table(name="Tests")
 * @ORM\Entity
 */
class Tests
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nKey", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nNumb", type="integer", nullable=true)
     */
    private $nnumb;

    /**
     * @var string
     *
     * @ORM\Column(name="cTestName", type="string", length=200, nullable=true)
     */
    private $ctestname;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTestType", type="integer", nullable=true)
     */
    private $ntesttype;

    /**
     * @var integer
     *
     * @ORM\Column(name="nStaffKey", type="integer", nullable=true)
     */
    private $nstaffkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nDolzhnoctbKey", type="integer", nullable=true)
     */
    private $ndolzhnoctbkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax1", type="integer", nullable=true)
     */
    private $nmax1;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin1", type="integer", nullable=true)
     */
    private $nmin1;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax2", type="integer", nullable=true)
     */
    private $nmax2;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin2", type="integer", nullable=true)
     */
    private $nmin2;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax3", type="integer", nullable=true)
     */
    private $nmax3;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin3", type="integer", nullable=true)
     */
    private $nmin3;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax4", type="integer", nullable=true)
     */
    private $nmax4;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin4", type="integer", nullable=true)
     */
    private $nmin4;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax5", type="integer", nullable=true)
     */
    private $nmax5;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin5", type="integer", nullable=true)
     */
    private $nmin5;

    /**
     * @var string
     *
     * @ORM\Column(name="cValue1", type="string", length=1000, nullable=true)
     */
    private $cvalue1;

    /**
     * @var string
     *
     * @ORM\Column(name="cValue2", type="string", length=1000, nullable=true)
     */
    private $cvalue2;

    /**
     * @var string
     *
     * @ORM\Column(name="cValue3", type="string", length=1000, nullable=true)
     */
    private $cvalue3;

    /**
     * @var string
     *
     * @ORM\Column(name="cValue4", type="string", length=1000, nullable=true)
     */
    private $cvalue4;

    /**
     * @var string
     *
     * @ORM\Column(name="cValue5", type="string", length=1000, nullable=true)
     */
    private $cvalue5;

    /**
     * @var integer
     *
     * @ORM\Column(name="nRandom", type="integer", nullable=true)
     */
    private $nrandom;

    /**
     * @var string
     *
     * @ORM\Column(name="cMessage", type="string", length=1000, nullable=true)
     */
    private $cmessage;

    /**
     * @var integer
     *
     * @ORM\Column(name="nCountion", type="integer", nullable=true)
     */
    private $ncountion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bPoradok", type="boolean", nullable=true)
     */
    private $bporadok;

    /**
     * @var integer
     *
     * @ORM\Column(name="nPoradokVoprosov", type="integer", nullable=true)
     */
    private $nporadokvoprosov;

    /**
     * @var integer
     *
     * @ORM\Column(name="nShowTime", type="integer", nullable=true)
     */
    private $nshowtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="nLimitTime", type="integer", nullable=true)
     */
    private $nlimittime;

    /**
     * @var DictionaryStructure
     *
     * @ORM\ManyToOne(targetEntity="DictionaryStructure")
     * @ORM\JoinColumn(name="nTestType", referencedColumnName="nElementKey")
     */
    private $typeTest;
    /**
     * @return int
     */

    /**
     * @var DictionaryStructure
     *
     * @ORM\ManyToOne(targetEntity="DictionaryStructure", inversedBy="tests")
     * @ORM\JoinColumn(name="organization", referencedColumnName="nElementKey")
     */
    private $organization;


    public function getNkey()
    {
        return $this->nkey;
    }

    /**
     * @param int $nkey
     */
    public function setNkey($nkey)
    {
        $this->nkey = $nkey;
    }

    /**
     * @return int
     */
    public function getNnumb()
    {
        return $this->nnumb;
    }

    /**
     * @param int $nnumb
     */
    public function setNnumb($nnumb)
    {
        $this->nnumb = $nnumb;
    }

    /**
     * @return string
     */
    public function getCtestname()
    {
        return $this->ctestname;
    }

    /**
     * @param string $ctestname
     */
    public function setCtestname($ctestname)
    {
        $this->ctestname = $ctestname;
    }

    /**
     * @return int
     */
    public function getNtesttype()
    {
        return $this->ntesttype;
    }

    /**
     * @param int $ntesttype
     */
    public function setNtesttype($ntesttype)
    {
        $this->ntesttype = $ntesttype;
    }

    /**
     * @return int
     */
    public function getNstaffkey()
    {
        return $this->nstaffkey;
    }

    /**
     * @param int $nstaffkey
     */
    public function setNstaffkey($nstaffkey)
    {
        $this->nstaffkey = $nstaffkey;
    }

    /**
     * @return int
     */
    public function getNdolzhnoctbkey()
    {
        return $this->ndolzhnoctbkey;
    }

    /**
     * @param int $ndolzhnoctbkey
     */
    public function setNdolzhnoctbkey($ndolzhnoctbkey)
    {
        $this->ndolzhnoctbkey = $ndolzhnoctbkey;
    }

    /**
     * @return int
     */
    public function getNmax1()
    {
        return $this->nmax1;
    }

    /**
     * @param int $nmax1
     */
    public function setNmax1($nmax1)
    {
        $this->nmax1 = $nmax1;
    }

    /**
     * @return int
     */
    public function getNmin1()
    {
        return $this->nmin1;
    }

    /**
     * @param int $nmin1
     */
    public function setNmin1($nmin1)
    {
        $this->nmin1 = $nmin1;
    }

    /**
     * @return int
     */
    public function getNmax2()
    {
        return $this->nmax2;
    }

    /**
     * @param int $nmax2
     */
    public function setNmax2($nmax2)
    {
        $this->nmax2 = $nmax2;
    }

    /**
     * @return int
     */
    public function getNmin2()
    {
        return $this->nmin2;
    }

    /**
     * @param int $nmin2
     */
    public function setNmin2($nmin2)
    {
        $this->nmin2 = $nmin2;
    }

    /**
     * @return int
     */
    public function getNmax3()
    {
        return $this->nmax3;
    }

    /**
     * @param int $nmax3
     */
    public function setNmax3($nmax3)
    {
        $this->nmax3 = $nmax3;
    }

    /**
     * @return int
     */
    public function getNmin3()
    {
        return $this->nmin3;
    }

    /**
     * @param int $nmin3
     */
    public function setNmin3($nmin3)
    {
        $this->nmin3 = $nmin3;
    }

    /**
     * @return int
     */
    public function getNmax4()
    {
        return $this->nmax4;
    }

    /**
     * @param int $nmax4
     */
    public function setNmax4($nmax4)
    {
        $this->nmax4 = $nmax4;
    }

    /**
     * @return int
     */
    public function getNmin4()
    {
        return $this->nmin4;
    }

    /**
     * @param int $nmin4
     */
    public function setNmin4($nmin4)
    {
        $this->nmin4 = $nmin4;
    }

    /**
     * @return int
     */
    public function getNmax5()
    {
        return $this->nmax5;
    }

    /**
     * @param int $nmax5
     */
    public function setNmax5($nmax5)
    {
        $this->nmax5 = $nmax5;
    }

    /**
     * @return int
     */
    public function getNmin5()
    {
        return $this->nmin5;
    }

    /**
     * @param int $nmin5
     */
    public function setNmin5($nmin5)
    {
        $this->nmin5 = $nmin5;
    }

    /**
     * @return string
     */
    public function getCvalue1()
    {
        return $this->cvalue1;
    }

    /**
     * @param string $cvalue1
     */
    public function setCvalue1($cvalue1)
    {
        $this->cvalue1 = $cvalue1;
    }

    /**
     * @return string
     */
    public function getCvalue2()
    {
        return $this->cvalue2;
    }

    /**
     * @param string $cvalue2
     */
    public function setCvalue2($cvalue2)
    {
        $this->cvalue2 = $cvalue2;
    }

    /**
     * @return string
     */
    public function getCvalue3()
    {
        return $this->cvalue3;
    }

    /**
     * @param string $cvalue3
     */
    public function setCvalue3($cvalue3)
    {
        $this->cvalue3 = $cvalue3;
    }

    /**
     * @return string
     */
    public function getCvalue4()
    {
        return $this->cvalue4;
    }

    /**
     * @param string $cvalue4
     */
    public function setCvalue4($cvalue4)
    {
        $this->cvalue4 = $cvalue4;
    }

    /**
     * @return string
     */
    public function getCvalue5()
    {
        return $this->cvalue5;
    }

    /**
     * @param string $cvalue5
     */
    public function setCvalue5($cvalue5)
    {
        $this->cvalue5 = $cvalue5;
    }

    /**
     * @return int
     */
    public function getNrandom()
    {
        return $this->nrandom;
    }

    /**
     * @param int $nrandom
     */
    public function setNrandom($nrandom)
    {
        $this->nrandom = $nrandom;
    }

    /**
     * @return string
     */
    public function getCmessage()
    {
        return str_replace(PHP_EOL, ' ', $this->cmessage);
    }

    /**
     * @param string $cmessage
     */
    public function setCmessage($cmessage)
    {
        $this->cmessage = $cmessage;
    }

    /**
     * @return int
     */
    public function getNcountion()
    {
        return $this->ncountion;
    }

    /**
     * @param int $ncountion
     */
    public function setNcountion($ncountion)
    {
        $this->ncountion = $ncountion;
    }

    /**
     * @return bool
     */
    public function isBporadok()
    {
        return $this->bporadok;
    }

    /**
     * @param bool $bporadok
     */
    public function setBporadok($bporadok)
    {
        $this->bporadok = $bporadok;
    }

    /**
     * @return int
     */
    public function getNporadokvoprosov()
    {
        return $this->nporadokvoprosov;
    }

    /**
     * @param int $nporadokvoprosov
     */
    public function setNporadokvoprosov($nporadokvoprosov)
    {
        $this->nporadokvoprosov = $nporadokvoprosov;
    }

    /**
     * @return int
     */
    public function getNshowtime()
    {
        return $this->nshowtime;
    }

    /**
     * @param int $nshowtime
     */
    public function setNshowtime($nshowtime)
    {
        $this->nshowtime = $nshowtime;
    }

    /**
     * @return int
     */
    public function getNlimittime()
    {
        return $this->nlimittime;
    }

    /**
     * @param int $nlimittime
     */
    public function setNlimittime($nlimittime)
    {
        $this->nlimittime = $nlimittime;
    }

    /**
     * @return DictionaryStructure
     */
    public function getTypeTest()
    {
        return $this->typeTest;
    }

    /**
     * @param DictionaryStructure $typeTest
     */
    public function setTypeTest($typeTest)
    {
        $this->typeTest = $typeTest;
    }


    /**
     * @return DictionaryStructure
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param DictionaryStructure $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }


}

