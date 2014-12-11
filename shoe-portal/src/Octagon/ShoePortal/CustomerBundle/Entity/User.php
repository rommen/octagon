<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;
//use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User", uniqueConstraints={@ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"}), @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})})
 * @ORM\Entity
 */
class User extends UploadableEntity implements AdvancedUserInterface {

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=4, nullable=true)
     */
    private $avatar;

    /**
     * @var boolean
     *
     * @ORM\Column(name="admin", type="boolean", nullable=true)
     */
    private $admin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="blocked", type="date", nullable=true)
     */
    private $blocked;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    public function __construct($username = null, $password = null, $salt = null, array $roles = null) {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address) {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar) {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar() {
        return $this->avatar;
    }

    /**
     * Set admin
     *
     * @param boolean $admin
     * @return User
     */
    public function setAdmin($admin) {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return boolean 
     */
    public function getAdmin() {
        return $this->admin;
    }

    /**
     * Set blocked
     *
     * @param \DateTime $blocked
     * @return User
     */
    public function setBlocked($blocked) {
        $this->blocked = $blocked;

        return $this;
    }

    /**
     * Get blocked
     *
     * @return \DateTime 
     */
    public function getBlocked() {
        return $this->blocked;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser() {
        return $this->idUser;
    }

    /**
     * Get idUser as Base64 representation
     *
     * @return string 
     */
    public function getIdUserHash() {
        return base64_encode($this->idUser);
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        if ($this->blocked == null || ($this->blocked->getTimestamp() - time()) <= 0) {
            if ($this->admin) {
                return array('ROLE_ADMIN');
            } else {
                return array('ROLE_USER');
            }
        } else {
            return array(); //User has no rights, maybe need to show some notification
        }
    }

    public function getSalt() {
        
    }

    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        return $this->blocked == null || ($this->blocked->getTimestamp() - time()) <= 0;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled() {
        return true;
    }

    public function __toString() {
        return $this->username;
    }

    public function getFileExtension() {
        return $this->avatar;
    }

    public function getImageName() {
        return 'User_' . $this->idUser;
    }

    public function setFileExtension($extension) {
        $this->setAvatar($extension);
    }

}
