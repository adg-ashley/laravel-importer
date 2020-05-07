<?php
namespace Adg\Importer\Commands;

use Illuminate\Console\Command;
use Adg\Importer\Database\Unload;
use Illuminate\Support\Str;

class Base extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adg:importer {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model = "Adg\\Importer\\Eloquent\\".$this->argument('model');
        (new Unload(new $model))->run();
    }
}
