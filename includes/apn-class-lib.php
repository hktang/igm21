<?php

/*
 * (cc) 2015
 *  Created with love and passion by Xiaojun Deng/APN Secretariat.
 *  Let's do it the OOP way!
 */

class Apn_Meeting
{
    public $meetingName;
    public $meetingShortName;
    public $meetingDate;
    public $meetingVenue;
    public $meetingAddress;
    public $meetingLocation;
    public $officialEmail;
    public $venueEmail;
    public $venuePhone;
    public $venueFax;
    public $baseDirectory;
    public $jumbotronImg1;
    public $jumbotronImg2;
    public $jumbotronImg3;
    protected $registrationFormId;
    protected $abstractFormId;

  /* constructor */
  public function __construct($theMeetingName)
  {
      $this->meetingName = $theMeetingName;
      $this->registrationFormId = 11;
  }

  /* meeting name */
  public function getMeetingName()
  {
      return $this->meetingName;
  }

    public function setMeetingName($newName)
    {
        $this->meetingName = $newName;
    }

  /* reg Form Id */
  public function getRegistrationFormId()
  {
      return $this->registrationFormId;
  }

    public function setRegistrationFormId($newId)
    {
        $this->registrationFormId = $newId;
    }
}

class Apn_Igm_Meeting extends Apn_Meeting
{
    public function __construct($theMeetingName)
    {
        $this->setMeetingName($theMeetingName);
        $this->registrationFormId = 12;
    }

    public function setRegistrationFormId($newId)
    {
        if ($newId < 100) {
            $this->registrationFormId = 99;
        } else {
            /* access parent method 
      *  same as parent::setRegistrationFormId($newId);
      */
      Apn_Meeting::setRegistrationFormId($newId);
        }
    }
}
