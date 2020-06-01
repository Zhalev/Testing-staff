<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReportTable
 *
 * @ORM\Table(name="REPORT_TABLE")
 * @ORM\Entity
 */
class ReportTable
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
     * @ORM\Column(name="cXValue", type="string", length=50, nullable=true)
     */
    private $cxvalue;

    /**
     * @var float
     *
     * @ORM\Column(name="nYValue", type="float", precision=53, scale=0, nullable=true)
     */
    private $nyvalue;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKey", type="integer", nullable=true)
     */
    private $nkey;

    /**
     * @var string
     *
     * @ORM\Column(name="cReportShow", type="string", length=50, nullable=true)
     */
    private $creportshow;

    /**
     * @var string
     *
     * @ORM\Column(name="cProcedureName", type="string", length=50, nullable=true)
     */
    private $cprocedurename;

    /**
     * @var string
     *
     * @ORM\Column(name="cStartValues", type="string", length=50, nullable=true)
     */
    private $cstartvalues;

    /**
     * @var integer
     *
     * @ORM\Column(name="nProcNameKey", type="integer", nullable=true)
     */
    private $nprocnamekey;


}

