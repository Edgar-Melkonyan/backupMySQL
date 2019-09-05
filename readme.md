## BackupDatabase package for Laravel
  
BackupDatabase is package which made to backup data from MySQL and save inside storage folder      

## Installation

-  Go to app/Console/Kernel.php and do the following
#### 1 Use namespace
```bash
use EdgarMelkonyan\BackupDatabase\BackupDatabase;
```
#### 2 Write class inside commands array
```bash
protected $commands = [
        BackupDatabase::class
    ];
```
### 3 Provide how ofter you want this command to run ex`
```bash
protected function schedule(Schedule $schedule)
    {
        $schedule->command('db:backup')
            ->daily();
    }
```

## Testing

```bash
 php artisan db:backup
 ```



## License

MIT
