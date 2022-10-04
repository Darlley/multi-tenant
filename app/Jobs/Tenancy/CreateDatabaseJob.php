<?php

namespace App\Jobs\Tenancy;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\DatabaseManager;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Stancl\Tenancy\Database\DatabaseManager as DatabaseDatabaseManager;
use Stancl\Tenancy\Jobs\CreateDatabase;

class CreateDatabaseJob extends CreateDatabase
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(DatabaseDatabaseManager $databaseManager)
    {
        
        if(!app()->isProduction()){
            (new DeleteDatabaseJob($this->tenant))->handle();
        }

        parent::handle($databaseManager);
    }
}