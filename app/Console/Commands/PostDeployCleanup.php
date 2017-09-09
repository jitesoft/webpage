<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class PostDeployCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs cleanup commands on the deploy environment.';

    /**
     * Execute the console command.
     *
     */
    public function handle() {
        $this->info("Clearing compiled classes.");
        $this->call("clear-compiled");
        $this->info("Clearing cache.");
        $this->call('cache:clear');
        $this->info("Clearing views.");
        $this->call("view:clear");
        $this->info("Migrating database.");
        $this->call('migrate', ['--force' => true]);
        $this->info("Seeding database.");
        $this->call('db:seed', ['--force' => true]);
        $this->call("doctrine:generate:proxies");
    }
}
