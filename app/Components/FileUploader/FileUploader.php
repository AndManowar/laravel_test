<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 12.05.2018
 * Time: 17:08
 */

namespace App\Components\FileUploader;

use App\Components\FileUploader\Contracts\FileUploadInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileUploader
 * @package App\Components\FileUploader
 */
class FileUploader implements FileUploadInterface
{
    /**
     * @var string
     */
    protected $uploadedFilePath;

    /**
     * @var array
     */
    protected $uploadedFilesPath;

    /**
     * Upload file to the disk
     *
     * @param UploadedFile $file
     * @param string $disk
     * @param string $path
     * @return bool
     */
    public function uploadFile($file, $disk, $path = '')
    {
        if (($this->uploadedFilePath = Storage::disk($disk)->put($path, $file)) !== false) {
            return true;
        }

        return false;
    }

    /**
     * Upload files to the disk
     *
     * @param array $files
     * @param string $disk
     * @param string $path
     * @return bool
     */
    public function uploadFiles(array $files, $disk, $path = '')
    {
        foreach ($files as $file) {
            if (($this->uploadedFilesPath[] = Storage::disk($disk)->put($path, $file)) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Remove file by name and disk
     *
     * @param string $fileName
     * @param string $disk
     * @return boolean
     */
    public function removeFile($fileName, $disk)
    {
        // TODO: Implement removeFile() method.
    }

    /**
     * Remove files by names[] and disk
     *
     * @param array $fileNames
     * @param string $disk
     * @return boolean
     */
    public function removeFiles(array $fileNames, $disk)
    {
        // TODO: Implement removeFiles() method.
    }

    /**
     * Get path of currently uploaded file
     *
     * @return string
     */
    public function getUploadedFilePath()
    {
        return $this->uploadedFilePath;
    }

    /**
     * Get path of currently uploaded files
     *
     * @return array
     */
    public function getUploadedFilesPath()
    {
        return $this->uploadedFilesPath;
    }
}