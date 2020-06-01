<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestPodshot
 *
 * @ORM\Table(name="Test_Podshot")
 * @ORM\Entity
 */
class TestPodshot
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
     * @ORM\Column(name="nOrganizatKey", type="integer", nullable=true)
     */
    private $norganizatkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTestKey", type="integer", nullable=true)
     */
    private $ntestkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTest_ID", type="integer", nullable=true)
     */
    private $ntestId;

    /**
     * @var string
     *
     * @ORM\Column(name="cMemo", type="string", length=0, nullable=true)
     */
    private $cmemo;

    /**
     * @var integer
     *
     * @ORM\Column(name="nPolBall", type="integer", nullable=true)
     */
    private $npolball;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMaxBall", type="integer", nullable=true)
     */
    private $nmaxball;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTestType", type="integer", nullable=true)
     */
    private $ntesttype;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dDate", type="datetime", nullable=true)
     */
    private $ddate;


}

