<?php

namespace App\Console\Commands;

use App\Core\Advertisement\Models\Advertisement;
use Illuminate\Console\Command;

class AdvertisementCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advertisement';

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
        factory(Advertisement::class, 19)->create();
    }
}
