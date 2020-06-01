<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestsTable
 *
 * @ORM\Table(name="TESTS_TABLE")
 * @ORM\Entity
 */
class TestsTable
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
     * @var string
     *
     * @ORM\Column(name="DATA", type="string", length=500, nullable=true)
     */
    private $data;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKey", type="integer", nullable=true)
     */
    private $nkey;

    /**
     * @var string
     *
     * @ORM\Column(name="Result", type="string", length=10, nullable=true)
     */
    private $result;

    /**
     * @var string
     *
     * @ORM\Column(name="CorrectAns", type="string", length=10, nullable=true)
     */
    private $correctans;


}

