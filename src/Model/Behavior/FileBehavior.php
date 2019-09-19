<?php

namespace App\Model\Behavior;

use Cake\Filesystem\File;
use Cake\Http\Exception\InternalErrorException;
use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Utility\Text;

/**
 * FileBehavior behavior
 */
class FileBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'max_files' => 5,
        'dirs' => [
            'files' => WWW_ROOT,
            'img' => WWW_ROOT . 'img'
        ],
        'allowed' => [
            'files' => ['csv'],
            'img' => ['jpg', 'png', 'jpeg', 'JPG']
        ]
    ];
    public $expections = [
        'default.png'
    ];

    public function uploadFile($file, $type = 'files', $deep_dir = null)
    {
        $this->validateUpload($file['name'], $type);

        $config = $this->config();


        $new_name = Text::uuid() . '-' . $file['name'];

        $dir = $config['dirs'][$type] . DS . $deep_dir;
        // echo implode(";",$file);
        // var_dump(array_keys($file));        
        move_uploaded_file($file['tmp_name'], $dir . DS . $new_name);
        if ($deep_dir) {
            $new_name = $deep_dir . $new_name;
        }
        return $new_name;
    }

    public function uploadFiles($file, $type = 'files', $deep_dir = null)
    {
        //$this->validateUpload($file, $type);

        $config = $this->config();

        $new_name = Text::uuid() . '-' . $file['name'];

        $dir = $config['dirs'][$type] . DS . $deep_dir;

        move_uploaded_file($file['tmp_name'], $dir . DS . $new_name);

        return $new_name;
    }

    public function deleteFile($file_name, $type)
    {
        if ($file_name or in_array($file_name, $this->expections)) {
            return false;
        } else {

            $config = $this->config();

            $dir = $config['dirs'][$type] . DS;

            $file = new  File($dir . DS . $file_name);

            if ($file->delete()) {
                return true;
            }
        }
    }

    public function deleteFiles($file_name = null, $type = 'files', $deep_dir = null)
    {
        if (!$file_name) {
            return false;
        }

        $config = $this->config();

        if (!array_key_exists($type, $config['allowed'])) {
            throw new \Exception("Error. Type of file is not allowed.", 1);
        }

        $dir = $config['dirs'][$type] . DS . $deep_dir;

        $file = new  File($dir . DS . $file_name);

        $file->delete();

        return true;
    }

    public function validateUpload($file, $type = 'files')
    {
        $allowed =  array('gif', 'png', 'jpg');
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if (!in_array($ext, $allowed)) {
            echo 'error';
        }
    }

    public function validateUploads($file, $type = 'files')
    {
        $config = $this->config();

        if (!array_key_exists($type, $config['allowed'])) {
            throw new \Exception("Error. Type of file is not allowed.", 1);
        }

        if (!in_array(substr(strrchr($file['name'], '.'), 1), $config['allowed'][$type])) {
            throw new \Exception("Error. Extension of file is not allowed.", 1);
        }

        if (!is_uploaded_file($file['tmp_name'])) {
            throw new \Exception("Error Processing Request.", 1);
        }
    }
}
