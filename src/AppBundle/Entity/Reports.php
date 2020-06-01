<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reports
 *
 * @ORM\Table(name="Reports")
 * @ORM\Entity
 */
class Reports
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
     * @ORM\Column(name="cReportName", type="string", length=200, nullable=true)
     */
    private $creportname;

    /**
     * @var string
     *
     * @ORM\Column(name="cXdecision", type="string", length=500, nullable=true)
     */
    private $cxdecision;

    /**
     * @var string
     *
     * @ORM\Column(name="cXTableFieldName", type="string", length=100, nullable=true)
     */
    private $cxtablefieldname;

    /**
     * @var string
     *
     * @ORM\Column(name="cYDecision", type="string", length=900, nullable=true)
     */
    private $cydecision;

    /**
     * @var string
     *
     * @ORM\Column(name="cYTableFieldName", type="string", length=100, nullable=true)
     */
    private $cytablefieldname;

    /**
     * @var integer
     *
     * @ORM\Column(name="nProcNameKey", type="integer", nullable=true)
     */
    private $nprocnamekey;

    /**
     * @var string
     *
     * @ORM\Column(name="cStartValues", type="string", length=100, nullable=true)
     */
    private $cstartvalues;

    /**
     * @var integer
     *
     * @ORM\Column(name="nReportKey", type="integer", nullable=true)
     */
    private $nreportkey;

    /**
     * @var string
     *
     * @ORM\Column(name="cLeftAxis", type="string", length=100, nullable=true)
     */
    private $cleftaxis;

    /**
     * @var string
     *
     * @ORM\Column(name="cRightAxis", type="string", length=100, nullable=true)
     */
    private $crightaxis;

    /**
     * @var integer
     *
     * @ORM\Column(name="nReportTypeKey", type="integer", nullable=true)
     */
    private $nreporttypekey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nLevel", type="integer", nullable=true)
     */
    private $nlevel;


}

