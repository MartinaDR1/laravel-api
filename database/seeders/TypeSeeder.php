<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['HTML', 'CSS', 'Javascript', 'Vue Js', 'Front-end', 'PHP', 'MySQL', 'Laravel', 'Back-End', 'Full-Stack'];

        foreach($types as $type){
            $newType= new Type();

            $newType->name = $type;
            $newType->slug= Str::slug($newType->name);

            $newType->save();
        }
    }
}
