<?php

  class Fournisseur {

    private $id;
    private $firstName;
    private $lastName;
    private $address;
    private $email;
    private $contact;

    public function __construct($id, $firstName, $lastName, $address, $email, $contact) {
      $this->id = $id;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->address = $address;
      $this->email = $email;
      $this->contact = $contact;
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getFirstName() {
      return $this->firstName;
    }

    public function setFirstName($firstName) {
      $this->firstName = $firstName;
    }

    public function getLastName() {
      return $this->lastName;
    }

    public function setLastName($lastName) {
      $this->lastName = $lastName;
    }

    public function getAddress() {
      return $this->address;
    }

    public function setAddress($address) {
      $this->address = $address;
    }

    public function getEmail() {
      return $this->email;
    }

    public function setEmail($email) {
      $this->email = $email;
    }

    public function getContact() {
      return $this->contact;
    }

    public function setContact($contact) {
      $this->contact = $contact;
    }

  }

?>
