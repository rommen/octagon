<?php

namespace Octagon\ShoePortal\CustomerBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of UploadableEntity
 *
 * @author rommen
 */
abstract class UploadableEntity {

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    public function getUploadPath() {
        return __DIR__ . '/../../../../../web/images/uploads/';
    }

    /**
     * Get full image name, for example, User_1 or Shoe_2
     * @return string
     */
    abstract public function getImageName();

    /**
     * Return image file extension, for example, jpeg, png or jpg
     * @return string
     */
    abstract public function getFileExtension();

    /**
     * Set file extension of the image
     */
    abstract public function setFileExtension($extension);

    /**
     * Returns full name of the image, for example, User_1.png or Shoe_2.jpeg
     * @return string
     */
    public function getFullFileName() {
        return $this->getImageName() . '.' . $this->getFileExtension();
    }

    /**
     * Checks if file field is not empty and extracts file extension (*.ext) from the file name.
     */
    public function updateExtensionFromFile() {
        if (null != $this->getFile()) {
            $pos = strrpos($this->getFile()->getClientOriginalName(), '.', -1);
            if ($pos != false) {
                $ext = substr($this->getFile()->getClientOriginalName(), $pos + 1);
                $this->setFileExtension($ext);
            }
        }
    }

    public function upload() {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        $this->updateExtensionFromFile();

        $this->getFile()->move(
                $this->getUploadPath(), $this->getFullFileName()
        );

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }
    
    /**
     * Tries to delete file from disk ( {uploadPath}/{fullFileName} ).
     */
    public function deleteFileFromDisk(){
        $filePath = $this->getUploadPath() . $this->getFullFileName();
        if(file_exists($filePath)){
            unlink($filePath);
        }
    }

}
