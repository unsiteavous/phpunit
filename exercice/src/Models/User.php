<?php

namespace Models;

class User
{
  private $id;
  private $name;
  private $email;
	private $password;


  

	/**
	 * Get the value of id
	 *
	 * @return  mixed
	 */
	public function getId(): mixed
	{
		return $this->id;
	}
  
	/**
	 * Set the value of id
	 *
	 * @param   mixed  $id  
	 *
   * @return void
	 */
	public function setId($id): void
	{
		$this->id = $id;
	}

	/**
	 * Get the value of name
	 *
	 * @return  mixed
	 */
	public function getName(): mixed
	{
		return $this->name;
	}
  
	/**
	 * Set the value of name
	 *
	 * @param   mixed  $name  
	 *
   * @return void
	 */
	public function setName($name): void
	{
		$this->name = $name;
	}

	/**
	 * Get the value of email
	 *
	 * @return  mixed
	 */
	public function getEmail(): mixed
	{
		return $this->email;
	}
  
	/**
	 * Set the value of email
	 *
	 * @param   mixed  $email  
	 *
   * @return void
	 */
	public function setEmail($email): void
	{
		$this->email = $email;
	}



	/**
	 * Get the value of password
	 *
	 * @return  mixed
	 */
	public function getPassword(): mixed
	{
		return $this->password;
	}
  
	/**
	 * Set the value of password
	 *
	 * @param   mixed  $password  
	 *
   * @return void
	 */
	public function setPassword($password): void
	{
		$this->password = $password;
	}
}