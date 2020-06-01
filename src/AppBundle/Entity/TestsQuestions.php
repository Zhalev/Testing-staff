<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestsQuestions
 *
 * @ORM\Table(name="Tests_Questions")
 * @ORM\Entity
 */
class TestsQuestions
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
     * @ORM\Column(name="nTestNumber", type="integer", nullable=true)
     */
    private $ntestnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cQuestion", type="string", length=1000, nullable=true)
     */
    private $cquestion;

    /**
     * @var integer
     *
     * @ORM\Column(name="nAnswerNum", type="integer", nullable=true)
     */
    private $nanswernum;

    /**
     * @var integer
     *
     * @ORM\Column(name="nUse", type="integer", nullable=true)
     */
    private $nuse;

    /**
     * @var integer
     *
     * @ORM\Column(name="nRandom", type="integer", nullable=true)
     */
    private $nrandom;

    /**
     * @var integer
     *
     * @ORM\Column(name="nScale", type="integer", nullable=true)
     */
    private $nscale;

    /**
     * @var string
     *
     * @ORM\Column(name="cPathPicture", type="string", length=500, nullable=true)
     */
    private $cpathpicture;

    /**
     * @var string
     *
     * @ORM\Column(name="cMessage", type="string", length=2000, nullable=true)
     */
    private $cmessage;

    /**
     * @var integer
     *
     * @ORM\Column(name="nPerec", type="integer", nullable=true)
     */
    private $nperec;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bDostup", type="boolean", nullable=true)
     */
    private $bdostup = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="cPerecNumber", type="string", length=500, nullable=true)
     */
    private $cperecnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cAnswer1", type="string", length=500, nullable=true)
     */
    private $canswer1;

    /**
     * @var string
     *
     * @ORM\Column(name="cAnswer2", type="string", length=500, nullable=true)
     */
    private $canswer2;

    /**
     * @var string
     *
     * @ORM\Column(name="cAnswer3", type="string", length=500, nullable=true)
     */
    private $canswer3;

    /**
     * @var string
     *
     * @ORM\Column(name="cAnswer4", type="string", length=500, nullable=true)
     */
    private $canswer4;

    /**
     * @var string
     *
     * @ORM\Column(name="cAnswer5", type="string", length=500, nullable=true)
     */
    private $canswer5;

    /**
     * @var string
     *
     * @ORM\Column(name="cAnswer6", type="string", length=500, nullable=true)
     */
    private $canswer6;

    /**
     * @var string
     *
     * @ORM\Column(name="cAnswer7", type="string", length=500, nullable=true)
     */
    private $canswer7;

    /**
     * @var string
     *
     * @ORM\Column(name="cAnswer8", type="string", length=500, nullable=true)
     */
    private $canswer8;

    /**
     * @var string
     *
     * @ORM\Column(name="cAnswer9", type="string", length=500, nullable=true)
     */
    private $canswer9;

    /**
     * @var string
     *
     * @ORM\Column(name="cAnswer10", type="string", length=500, nullable=true)
     */
    private $canswer10;

    /**
     * @var integer
     *
     * @ORM\Column(name="nW1", type="integer", nullable=true)
     */
    private $nw1;

    /**
     * @var integer
     *
     * @ORM\Column(name="nW2", type="integer", nullable=true)
     */
    private $nw2;

    /**
     * @var integer
     *
     * @ORM\Column(name="nW3", type="integer", nullable=true)
     */
    private $nw3;

    /**
     * @var integer
     *
     * @ORM\Column(name="nW4", type="integer", nullable=true)
     */
    private $nw4;

    /**
     * @var integer
     *
     * @ORM\Column(name="nW5", type="integer", nullable=true)
     */
    private $nw5;

    /**
     * @var integer
     *
     * @ORM\Column(name="nW6", type="integer", nullable=true)
     */
    private $nw6;

    /**
     * @var integer
     *
     * @ORM\Column(name="nW7", type="integer", nullable=true)
     */
    private $nw7;

    /**
     * @var integer
     *
     * @ORM\Column(name="nW8", type="integer", nullable=true)
     */
    private $nw8;

    /**
     * @var integer
     *
     * @ORM\Column(name="nW9", type="integer", nullable=true)
     */
    private $nw9;

    /**
     * @var integer
     *
     * @ORM\Column(name="nW10", type="integer", nullable=true)
     */
    private $nw10;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSc1", type="integer", nullable=true)
     */
    private $nsc1;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSc2", type="integer", nullable=true)
     */
    private $nsc2;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSc3", type="integer", nullable=true)
     */
    private $nsc3;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSc4", type="integer", nullable=true)
     */
    private $nsc4;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSc5", type="integer", nullable=true)
     */
    private $nsc5;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSc6", type="integer", nullable=true)
     */
    private $nsc6;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSc7", type="integer", nullable=true)
     */
    private $nsc7;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSc8", type="integer", nullable=true)
     */
    private $nsc8;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSc9", type="integer", nullable=true)
     */
    private $nsc9;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSc10", type="integer", nullable=true)
     */
    private $nsc10;

    /**
     * @return int
     */
    public function getNkey()
    {
        return $this->nkey;
    }

    /**
     * @return int
     */
    public function getNtestnumber()
    {
        return $this->ntestnumber;
    }

    /**
     * @return string
     */
    public function getCquestion()
    {
        return $this->cquestion;
    }

    /**
     * @return int
     */
    public function getNanswernum()
    {
        return $this->nanswernum;
    }

    /**
     * @return int
     */
    public function getNuse()
    {
        return $this->nuse;
    }

    /**
     * @return int
     */
    public function getNrandom()
    {
        return $this->nrandom;
    }

    /**
     * @return int
     */
    public function getNscale()
    {
        return $this->nscale;
    }

    /**
     * @return string
     */
    public function getCpathpicture()
    {
        return $this->cpathpicture;
    }

    /**
     * @return string
     */
    public function getCmessage()
    {
        return $this->cmessage;
    }

    /**
     * @return int
     */
    public function getNperec()
    {
        return $this->nperec;
    }

    /**
     * @return bool
     */
    public function isBdostup()
    {
        return $this->bdostup;
    }

    /**
     * @return string
     */
    public function getCperecnumber()
    {
        return $this->cperecnumber;
    }

    /**
     * @return string
     */
    public function getCanswer1()
    {
        return $this->canswer1;
    }

    /**
     * @return string
     */
    public function getCanswer2()
    {
        return $this->canswer2;
    }

    /**
     * @return string
     */
    public function getCanswer3()
    {
        return $this->canswer3;
    }

    /**
     * @return string
     */
    public function getCanswer4()
    {
        return $this->canswer4;
    }

    /**
     * @return string
     */
    public function getCanswer5()
    {
        return $this->canswer5;
    }

    /**
     * @return string
     */
    public function getCanswer6()
    {
        return $this->canswer6;
    }

    /**
     * @return string
     */
    public function getCanswer7()
    {
        return $this->canswer7;
    }

    /**
     * @return string
     */
    public function getCanswer8()
    {
        return $this->canswer8;
    }

    /**
     * @return string
     */
    public function getCanswer9()
    {
        return $this->canswer9;
    }

    /**
     * @return string
     */
    public function getCanswer10()
    {
        return $this->canswer10;
    }

    /**
     * @return int
     */
    public function getNw1()
    {
        return $this->nw1;
    }

    /**
     * @return int
     */
    public function getNw2()
    {
        return $this->nw2;
    }

    /**
     * @return int
     */
    public function getNw3()
    {
        return $this->nw3;
    }

    /**
     * @return int
     */
    public function getNw4()
    {
        return $this->nw4;
    }

    /**
     * @return int
     */
    public function getNw5()
    {
        return $this->nw5;
    }

    /**
     * @return int
     */
    public function getNw6()
    {
        return $this->nw6;
    }

    /**
     * @return int
     */
    public function getNw7()
    {
        return $this->nw7;
    }

    /**
     * @return int
     */
    public function getNw8()
    {
        return $this->nw8;
    }

    /**
     * @return int
     */
    public function getNw9()
    {
        return $this->nw9;
    }

    /**
     * @return int
     */
    public function getNw10()
    {
        return $this->nw10;
    }

    /**
     * @return int
     */
    public function getNsc1()
    {
        return $this->nsc1;
    }

    /**
     * @return int
     */
    public function getNsc2()
    {
        return $this->nsc2;
    }

    /**
     * @return int
     */
    public function getNsc3()
    {
        return $this->nsc3;
    }

    /**
     * @return int
     */
    public function getNsc4()
    {
        return $this->nsc4;
    }

    /**
     * @return int
     */
    public function getNsc5()
    {
        return $this->nsc5;
    }

    /**
     * @return int
     */
    public function getNsc6()
    {
        return $this->nsc6;
    }

    /**
     * @return int
     */
    public function getNsc7()
    {
        return $this->nsc7;
    }

    /**
     * @return int
     */
    public function getNsc8()
    {
        return $this->nsc8;
    }

    /**
     * @return int
     */
    public function getNsc9()
    {
        return $this->nsc9;
    }

    /**
     * @return int
     */
    public function getNsc10()
    {
        return $this->nsc10;
    }

    /**
     * @param int $ntestnumber
     */
    public function setNtestnumber($ntestnumber)
    {
        $this->ntestnumber = $ntestnumber;
    }

    /**
     * @param string $cquestion
     */
    public function setCquestion($cquestion)
    {
        $this->cquestion = $cquestion;
    }

    /**
     * @param int $nanswernum
     */
    public function setNanswernum($nanswernum)
    {
        $this->nanswernum = $nanswernum;
    }

    /**
     * @param int $nuse
     */
    public function setNuse($nuse)
    {
        $this->nuse = $nuse;
    }

    /**
     * @param int $nrandom
     */
    public function setNrandom($nrandom)
    {
        $this->nrandom = $nrandom;
    }

    /**
     * @param int $nscale
     */
    public function setNscale($nscale)
    {
        $this->nscale = $nscale;
    }

    /**
     * @param string $cpathpicture
     */
    public function setCpathpicture($cpathpicture)
    {
        $this->cpathpicture = $cpathpicture;
    }

    /**
     * @param string $cmessage
     */
    public function setCmessage($cmessage)
    {
        $this->cmessage = $cmessage;
    }

    /**
     * @param int $nperec
     */
    public function setNperec($nperec)
    {
        $this->nperec = $nperec;
    }

    /**
     * @param bool $bdostup
     */
    public function setBdostup($bdostup)
    {
        $this->bdostup = $bdostup;
    }

    /**
     * @param string $cperecnumber
     */
    public function setCperecnumber($cperecnumber)
    {
        $this->cperecnumber = $cperecnumber;
    }

    /**
     * @param string $canswer1
     */
    public function setCanswer1($canswer1)
    {
        $this->canswer1 = $canswer1;
    }

    /**
     * @param string $canswer2
     */
    public function setCanswer2($canswer2)
    {
        $this->canswer2 = $canswer2;
    }

    /**
     * @param string $canswer3
     */
    public function setCanswer3($canswer3)
    {
        $this->canswer3 = $canswer3;
    }

    /**
     * @param string $canswer4
     */
    public function setCanswer4($canswer4)
    {
        $this->canswer4 = $canswer4;
    }

    /**
     * @param string $canswer5
     */
    public function setCanswer5($canswer5)
    {
        $this->canswer5 = $canswer5;
    }

    /**
     * @param string $canswer6
     */
    public function setCanswer6($canswer6)
    {
        $this->canswer6 = $canswer6;
    }

    /**
     * @param string $canswer7
     */
    public function setCanswer7($canswer7)
    {
        $this->canswer7 = $canswer7;
    }

    /**
     * @param string $canswer8
     */
    public function setCanswer8($canswer8)
    {
        $this->canswer8 = $canswer8;
    }

    /**
     * @param string $canswer9
     */
    public function setCanswer9($canswer9)
    {
        $this->canswer9 = $canswer9;
    }

    /**
     * @param string $canswer10
     */
    public function setCanswer10($canswer10)
    {
        $this->canswer10 = $canswer10;
    }

    /**
     * @param int $nw1
     */
    public function setNw1($nw1)
    {
        $this->nw1 = $nw1;
    }

    /**
     * @param int $nw2
     */
    public function setNw2($nw2)
    {
        $this->nw2 = $nw2;
    }

    /**
     * @param int $nw3
     */
    public function setNw3($nw3)
    {
        $this->nw3 = $nw3;
    }

    /**
     * @param int $nw4
     */
    public function setNw4($nw4)
    {
        $this->nw4 = $nw4;
    }

    /**
     * @param int $nw5
     */
    public function setNw5($nw5)
    {
        $this->nw5 = $nw5;
    }

    /**
     * @param int $nw6
     */
    public function setNw6($nw6)
    {
        $this->nw6 = $nw6;
    }

    /**
     * @param int $nw7
     */
    public function setNw7($nw7)
    {
        $this->nw7 = $nw7;
    }

    /**
     * @param int $nw8
     */
    public function setNw8($nw8)
    {
        $this->nw8 = $nw8;
    }

    /**
     * @param int $nw9
     */
    public function setNw9($nw9)
    {
        $this->nw9 = $nw9;
    }

    /**
     * @param int $nw10
     */
    public function setNw10($nw10)
    {
        $this->nw10 = $nw10;
    }

    /**
     * @param int $nsc1
     */
    public function setNsc1($nsc1)
    {
        $this->nsc1 = $nsc1;
    }

    /**
     * @param int $nsc2
     */
    public function setNsc2($nsc2)
    {
        $this->nsc2 = $nsc2;
    }

    /**
     * @param int $nsc3
     */
    public function setNsc3($nsc3)
    {
        $this->nsc3 = $nsc3;
    }

    /**
     * @param int $nsc4
     */
    public function setNsc4($nsc4)
    {
        $this->nsc4 = $nsc4;
    }

    /**
     * @param int $nsc5
     */
    public function setNsc5($nsc5)
    {
        $this->nsc5 = $nsc5;
    }

    /**
     * @param int $nsc6
     */
    public function setNsc6($nsc6)
    {
        $this->nsc6 = $nsc6;
    }

    /**
     * @param int $nsc7
     */
    public function setNsc7($nsc7)
    {
        $this->nsc7 = $nsc7;
    }

    /**
     * @param int $nsc8
     */
    public function setNsc8($nsc8)
    {
        $this->nsc8 = $nsc8;
    }

    /**
     * @param int $nsc9
     */
    public function setNsc9($nsc9)
    {
        $this->nsc9 = $nsc9;
    }

    /**
     * @param int $nsc10
     */
    public function setNsc10($nsc10)
    {
        $this->nsc10 = $nsc10;
    }


}

