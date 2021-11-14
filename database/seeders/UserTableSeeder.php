<?php

namespace Database\Seeders;

use App\Models\User;
use App\Util\RandomImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('admin.admin_name')) {
            $randomImage = new RandomImage();
            $imageName = $randomImage->getAvatar('admin');
            User::firstOrCreate(
                ['email' => config('admin.admin_email')], [
                    'name' => config('admin.admin_name'),
                    'password' => Hash::make(config('admin.admin_password')),
                    'phoneNumber' => config('admin.admin_phone_num'),
                    'dateOfBirth' => config('admin.admin_dob'),
                    'learningStyle' => config('admin.admin_learning_style'),
                    'userKind' => 'admin',
                    'image' => $imageName,
                ]
            );
        }
    }
}
