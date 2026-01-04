<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder; use App\Models\User; use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder {
    public function run(): void {
        $u = User::firstOrCreate(['email'=>'super@rao.local'],[
            'name'=>'super_admin','password'=>Hash::make('password')
        ]);
    }
}
