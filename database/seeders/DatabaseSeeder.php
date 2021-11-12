<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);

        // Create all entries from populateIdeaDatabase.sql

        $sqlFile = './populateIdeaDatabase.sql';

        $db = [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE'),
        ];

        if (strlen($db['password']) > 0) {
            exec("mysql -u ${db['username']} -p ${db['password']} -h ${db['host']} ${db['database']} < ${sqlFile}");
        } else {
            exec("mysql -u ${db['username']} -h ${db['host']} ${db['database']} < ${sqlFile}");
        }
    }
}
