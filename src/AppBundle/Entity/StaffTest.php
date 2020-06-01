<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StaffTest
 *
 * @ORM\Table(name="Staff_test")
 * @ORM\Entity
 */
class StaffTest
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
     * @ORM\Column(name="nObjjectKey", type="integer", nullable=true)
     */
    private $nobjjectkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nPodrazdelenKey", type="integer", nullable=true)
     */
    private $npodrazdelenkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nDolzhnostKey", type="integer", nullable=true)
     */
    private $ndolzhnostkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTestKey", type="integer", nullable=true)
     */
    private $ntestkey;


}

