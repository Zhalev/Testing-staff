<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StaffTest
 *
 * @ORM\Table(name="Result_Tests")
 * @ORM\Entity
 */ 
class ResultTests
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tests", cascade={"remove"})
     * @ORM\JoinColumn(name="test_id", referencedColumnName="nKey")
     */
    private $test;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users", cascade={"remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="nUserKey")
     */
    private $user;

    /**
     * @ORM\Column(name="date_start", type="datetime", nullable=true)
     *
     */
    private $dateStart;

    /**
     * @ORM\Column(name="date_end", type="datetime", nullable=true)
     *
     */
    private $dateEnd;

    /**
     * @ORM\Column(name="result", type="integer", nullable=true)
     *
     */
    private $result;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param mixed $test
     */
    public function setTest($test)
    {
        $this->test = $test;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * @param mixed $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @param mixed $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }



}

