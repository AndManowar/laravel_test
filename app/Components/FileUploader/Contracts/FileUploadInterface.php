<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 12.05.2018
 * Time: 17:06
 */

namespace App\Components\FileUploader\Contracts;

use Illuminate\Http\UploadedFile;

/**
 * Interface FileUploadInterface
 */
interface FileUploadInterface
{
    /**
     * Upload file to the disk
     *
     * @param UploadedFile $file
     * @param string $disk
     * @param string $path
     * @return bool
     */
    public function uploadFile($file, $disk, $path = '');

    /**
     * Upload files to the disk
     *
     * @param array $files
     * @param string $disk
     * @param string $path
     * @return bool
     */
    public function uploadFiles(array $files, $disk, $path = '');

    /**
     * Remove file by name and disk
     *
     * @param string $fileName
     * @param string $disk
     * @return boolean
     */
    public function removeFile($fileName, $disk);

    /**
     * Remove files by names[] and disk
     *
     * @param array $fileNames
     * @param string $disk
     * @return boolean
     */
    public function removeFiles(array $fileNames, $disk);

    /**
     * Get path of currently uploaded file
     *
     * @return string
     */
    public function getUploadedFilePath();

    /**
     * Get path of currently uploaded files
     *
     * @return array
     */
    public function getUploadedFilesPath();
}