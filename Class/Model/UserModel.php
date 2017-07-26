<?php


namespace Model;

use PDO;

class UserModel
{
    /** @var  int */
    private $name;

    /** @var  string */
    private $surname;

    /** @var  string */
    private $email;

    /** @var  string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $gender;


    /**
     * UserModel constructor.
     * @param int $name
     * @param string $surname
     * @param string $email
     * @param string $username
     * @param string $password
     */
    public function __construct($name, $surname, $email, $username, $password,$gender)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->gender = $gender;
    }


    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }


    public static function newUser(UserModel $user)
    {
        $name= $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $gender = $user->getGender();
        $dbConnection = $dbConnection = \Database\Connection::getIntance();
        $query = "INSERT INTO `users` VALUES (NULL, :firstname, :surname, :email, :username, :password, :gender)";
        $statement = $dbConnection->prepare($query);
        $statement->bindParam(':firstname', $name);
        $statement->bindParam(':surname', $surname);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':gender', $gender);
        $statement->execute();
    }

    public static function userExists($username, $password)
    {

        $dbConnection = \Database\Connection::getIntance();
        $query = "SELECT * FROM `users` WHERE username = :username";
        $statement = $dbConnection->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if (!password_verify($password,$user["password"])) {
            return false;
        }
        return $user;
    }
}
