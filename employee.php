<?php
class Employee
{
  // Properties
  public $id;
  public $name;
  public $lastName;
  public $mail;
  public $password;
  public $login;
  public $phonePro;
  public $phonePerso;
  public $address;
  public $workplace;
  public $department;
  public $admin;

  // Constructor
  public function __construct($id, $name, $lastName, $mail, $password, $login, $phonePro, $phonePerso, $address, $workplace, $department, $admin)
  {
    $this->id = $id;
    $this->name = $name;
    $this->lastName = $lastName;
    $this->mail = $mail;
    $this->password = $password;
    $this->login = $login;
    $this->phonePro = $phonePro;
    $this->phonePerso = $phonePerso;
    $this->address = $address;
    $this->workplace = $workplace;
    $this->department = $department;
    $this->admin = $admin;
  }

  // Getter methods
  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getLastName()
  {
    return $this->lastName;
  }

  public function getMail()
  {
    return $this->mail;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getLogin()
  {
    return $this->login;
  }

  public function getPhonePro()
  {
    return $this->phonePro;
  }

  public function getPhonePerso()
  {
    return $this->phonePerso;
  }

  public function getAddress()
  {
    return $this->address;
  }

  public function getWorkplace()
  {
    return $this->workplace;
  }

  public function getDepartment()
  {
    return $this->department;
  }

  // Setter methods
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }

  public function setMail($mail)
  {
    $this->mail = $mail;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function setLogin($login)
  {
    $this->login = $login;
  }

  public function setPhonePro($phonePro)
  {
    $this->phonePro = $phonePro;
  }

  public function setPhonePerso($phonePerso)
  {
    $this->phonePerso = $phonePerso;
  }

  public function setAddress($address)
  {
    $this->address = $address;
  }

  public function setWorkplace($workplace)
  {
    $this->workplace = $workplace;
  }

  public function setDepartment($department)
  {
    $this->department = $department;
  }
}
