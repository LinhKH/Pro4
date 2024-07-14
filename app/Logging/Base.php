<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler as MonologRotatingFileHandler;

class Base extends MonologRotatingFileHandler
{
    /**
     * @param string     $filename
     * @param int        $maxFiles       The maximal amount of files to keep (0 means unlimited)
     * @param string|int $level          The minimum logging level at which this handler will be triggered
     * @param bool       $bubble         Whether the messages that are handled can bubble up the stack or not
     * @param int|null   $filePermission Optional file permissions (default (0644) are only for owner read/write)
     * @param bool       $useLocking     Try to lock log file before doing any writes
     */
    public function __construct(string $filename, int $maxFiles = 0, $level = Logger::DEBUG, bool $bubble = true, ?int $filePermission = null, bool $useLocking = false)
    {
        parent::__construct($filename, $maxFiles, $level, $bubble, $filePermission, $useLocking);
        $this->setFilenameFormat('{date}','Y/m/d');
    }
}