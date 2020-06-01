<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestsAnswers
 *
 * @ORM\Table(name="Tests_Answers")
 * @ORM\Entity
 */
class TestsAnswers
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
     * @ORM\Column(name="nStaffKey", type="integer", nullable=true)
     */
    private $nstaffkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTestNumber", type="integer", nullable=true)
     */
    private $ntestnumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSclaceKey", type="integer", nullable=true)
     */
    private $nsclacekey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nAnswerNum", type="integer", nullable=true)
     */
    private $nanswernum;

    /**
     * @var integer
     *
     * @ORM\Column(name="Test_Id", type="bigint", nullable=true)
     */
    private $testId;

    /**
     * @var integer
     *
     * @ORM\Column(name="TimeLength", type="integer", nullable=true)
     */
    private $timelength;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TestTime", type="datetime", nullable=true)
     */
    private $testtime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="testDate", type="datetime", nullable=true)
     */
    private $testDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ans1", type="integer", nullable=true)
     */
    private $ans1;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ans2", type="integer", nullable=true)
     */
    private $ans2;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ans3", type="integer", nullable=true)
     */
    private $ans3;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ans4", type="integer", nullable=true)
     */
    private $ans4;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ans5", type="integer", nullable=true)
     */
    private $ans5;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ans6", type="integer", nullable=true)
     */
    private $ans6 = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="Ans7", type="integer", nullable=true)
     */
    private $ans7 = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="Ans8", type="integer", nullable=true)
     */
    private $ans8 = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="Ans9", type="integer", nullable=true)
     */
    private $ans9 = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="Ans10", type="integer", nullable=true)
     */
    private $ans10 = '';

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TestsQuestions")
     * @ORM\JoinColumn(name="question", referencedColumnName="nKey")
     */
    private $question;

    /**
     * @return int
     */
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
    public function getNtestnumber()
    {
        return $this->ntestnumber;
    }

    /**
     * @param int $ntestnumber
     */
    public function setNtestnumber($ntestnumber)
    {
        $this->ntestnumber = $ntestnumber;
    }

    /**
     * @return int
     */
    public function getNsclacekey()
    {
        return $this->nsclacekey;
    }

    /**
     * @param int $nsclacekey
     */
    public function setNsclacekey($nsclacekey)
    {
        $this->nsclacekey = $nsclacekey;
    }

    /**
     * @return int
     */
    public function getNanswernum()
    {
        return $this->nanswernum;
    }

    /**
     * @param int $nanswernum
     */
    public function setNanswernum($nanswernum)
    {
        $this->nanswernum = $nanswernum;
    }

    /**
     * @return int
     */
    public function getTestId()
    {
        return $this->testId;
    }

    /**
     * @param int $testId
     */
    public function setTestId($testId)
    {
        $this->testId = $testId;
    }

    /**
     * @return int
     */
    public function getTimelength()
    {
        return $this->timelength;
    }

    /**
     * @param int $timelength
     */
    public function setTimelength($timelength)
    {
        $this->timelength = $timelength;
    }

    /**
     * @return \DateTime
     */
    public function getTesttime()
    {
        return $this->testtime;
    }

    /**
     * @param \DateTime $testtime
     */
    public function setTesttime($testtime)
    {
        $this->testtime = $testtime;
    }

    /**
     * @return int
     */
    public function getAns1()
    {
        return $this->ans1;
    }

    /**
     * @param int $ans1
     */
    public function setAns1($ans1)
    {
        $this->ans1 = $ans1;
    }

    /**
     * @return int
     */
    public function getAns2()
    {
        return $this->ans2;
    }

    /**
     * @param int $ans2
     */
    public function setAns2($ans2)
    {
        $this->ans2 = $ans2;
    }

    /**
     * @return int
     */
    public function getAns3()
    {
        return $this->ans3;
    }

    /**
     * @param int $ans3
     */
    public function setAns3($ans3)
    {
        $this->ans3 = $ans3;
    }

    /**
     * @return int
     */
    public function getAns4()
    {
        return $this->ans4;
    }

    /**
     * @param int $ans4
     */
    public function setAns4($ans4)
    {
        $this->ans4 = $ans4;
    }

    /**
     * @return int
     */
    public function getAns5()
    {
        return $this->ans5;
    }

    /**
     * @param int $ans5
     */
    public function setAns5($ans5)
    {
        $this->ans5 = $ans5;
    }

    /**
     * @return int
     */
    public function getAns6()
    {
        return $this->ans6;
    }

    /**
     * @param int $ans6
     */
    public function setAns6($ans6)
    {
        $this->ans6 = $ans6;
    }

    /**
     * @return int
     */
    public function getAns7()
    {
        return $this->ans7;
    }

    /**
     * @param int $ans7
     */
    public function setAns7($ans7)
    {
        $this->ans7 = $ans7;
    }

    /**
     * @return int
     */
    public function getAns8()
    {
        return $this->ans8;
    }

    /**
     * @param int $ans8
     */
    public function setAns8($ans8)
    {
        $this->ans8 = $ans8;
    }

    /**
     * @return int
     */
    public function getAns9()
    {
        return $this->ans9;
    }

    /**
     * @param int $ans9
     */
    public function setAns9($ans9)
    {
        $this->ans9 = $ans9;
    }

    /**
     * @return int
     */
    public function getAns10()
    {
        return $this->ans10;
    }

    /**
     * @param int $ans10
     */
    public function setAns10($ans10)
    {
        $this->ans10 = $ans10;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return \DateTime
     */
    public function getTestDate()
    {
        return $this->testDate;
    }

    /**
     * @param \DateTime $testDate
     */
    public function setTestDate($testDate)
    {
        $this->testDate = $testDate;
    }



}

