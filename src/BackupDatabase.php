<?php

namespace Edgar\BackupDatabase;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BackupDatabase extends Command
{
    protected $signature = 'db:backup';

    protected $description = 'Database Backup';

    private $process;

    public function __construct()
    {
        parent::__construct();

        $query = 'mysqldump -u%s -p%s %s > %s';
        $name='db_backup-'.date('m-d-Y').'.sql';
        $folder = 'backups';

        $file = new Filesystem;

        if (!$file->exists(storage_path($folder)))
            $file->makeDirectory(storage_path($folder), $mode = 0775, true, true);
        else
            $file->cleanDirectory(storage_path($folder));

        $this->process = new Process(sprintf(
            $query,
            config('database.connections.'.DB::connection()->getDriverName().'.username'),
            config('database.connections.'.DB::connection()->getDriverName().'.password'),
            config('database.connections.'.DB::connection()->getDriverName().'.database'),
            storage_path($folder.DIRECTORY_SEPARATOR.$name)
        ));
    }

    public function handle()
    {
        try {
            $this->process->mustRun();
            $this->info('The database backed up successfully.');
        } catch (ProcessFailedException $exception) {
            $this->error('The backup failed, please try again later.');
        }
    }
}
