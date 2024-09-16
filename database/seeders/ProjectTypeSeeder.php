<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            ['title' => 'Website', 'logo' => 'https://e7.pngegg.com/pngimages/549/715/png-clipart-web-development-logo-website-web-design-symmetry.png'],
            ['title' => 'Mobile App', 'logo' => 'https://img.lovepik.com/free-png/20210926/lovepik-mobile-phone-icon-png-image_401486772_wh1200.png'],
            ['title' => 'UI Design', 'logo' => 'https://media.istockphoto.com/id/1353759837/vector/ui-and-ux-design-abstract-concept-vector-illustration.jpg?s=612x612&w=0&k=20&c=Acy41iZXQTb58Qg7ZgjdV1cnfPxxcC2kxeT6RY53suc='],
            ['title' => 'Others', 'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRK-oArrEoavU_VR4rGDA77eu-VTGGtCnyhnA&s'],
        ];

        foreach ($projects as $project) {
            ProjectType::updateOrCreate($project, $project);
        }
    }
}
