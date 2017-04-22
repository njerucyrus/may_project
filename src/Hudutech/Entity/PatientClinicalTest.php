<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/22/17
 * Time: 7:39 PM
 */

namespace Hudutech\Entity;


class PatientClinicalTest
{
    /**
     * @var integer
     */
    private $clinicianId;
    /**
     * @var integer
     */
    private $patientId;
    /**
     * @var integer
     */
    private $testId;
    /**
     * @var string
     */
    private $testResult;
    /**
     * @var string
     */
    private $description;
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @return int
     */
    public function getClinicianId()
    {
        return $this->clinicianId;
    }

    /**
     * @param int $clinicianId
     */
    public function setClinicianId($clinicianId)
    {
        $this->clinicianId = $clinicianId;
    }

    /**
     * @return int
     */
    public function getPatientId()
    {
        return $this->patientId;
    }

    /**
     * @param int $patientId
     */
    public function setPatientId($patientId)
    {
        $this->patientId = $patientId;
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
     * @return string
     */
    public function getTestResult()
    {
        return $this->testResult;
    }

    /**
     * @param string $testResult
     */
    public function setTestResult($testResult)
    {
        $this->testResult = $testResult;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
}