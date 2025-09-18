<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Technology;
use App\Models\Project;
use App\Models\Experience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin Portfolio',
            'email' => 'admin@portfolio.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

        // Create profile
        Profile::create([
            'name' => 'Alex Rodriguez',
            'title' => 'Full Stack Developer',
            'bio' => 'Desarrollador apasionado con 5+ años de experiencia creando soluciones web modernas y escalables. Especializado en React, Node.js y arquitecturas cloud.',
            'location' => 'Madrid, España',
            'email' => 'alex@example.com',
            'phone' => '+34 123 456 789',
            'avatar' => '/professional-developer-avatar.png',
            'github_url' => 'https://github.com/alexrodriguez',
            'linkedin_url' => 'https://linkedin.com/in/alexrodriguez',
        ]);

        // Create technologies
        $technologies = [
            ['name' => 'React', 'level' => 95, 'category' => 'Frontend', 'color' => 'bg-blue-500', 'order' => 1],
            ['name' => 'TypeScript', 'level' => 90, 'category' => 'Language', 'color' => 'bg-blue-600', 'order' => 2],
            ['name' => 'Node.js', 'level' => 88, 'category' => 'Backend', 'color' => 'bg-green-600', 'order' => 3],
            ['name' => 'Next.js', 'level' => 92, 'category' => 'Framework', 'color' => 'bg-gray-800', 'order' => 4],
            ['name' => 'PostgreSQL', 'level' => 85, 'category' => 'Database', 'color' => 'bg-blue-700', 'order' => 5],
            ['name' => 'AWS', 'level' => 80, 'category' => 'Cloud', 'color' => 'bg-orange-500', 'order' => 6],
            ['name' => 'Docker', 'level' => 82, 'category' => 'DevOps', 'color' => 'bg-blue-400', 'order' => 7],
            ['name' => 'Python', 'level' => 78, 'category' => 'Language', 'color' => 'bg-yellow-500', 'order' => 8],
        ];

        foreach ($technologies as $tech) {
            Technology::create($tech);
        }

        // Create projects
        $projects = [
            [
                'title' => 'E-commerce Platform',
                'description' => 'Plataforma completa de comercio electrónico con panel de administración, pagos integrados y analytics en tiempo real.',
                'image' => '/modern-ecommerce-dashboard.png',
                'technologies' => ['React', 'Node.js', 'PostgreSQL', 'Stripe'],
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com/example',
                'featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Task Management App',
                'description' => 'Aplicación de gestión de tareas con colaboración en tiempo real, notificaciones push y sincronización offline.',
                'image' => '/task-management-interface.png',
                'technologies' => ['Next.js', 'TypeScript', 'Supabase', 'PWA'],
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com/example',
                'featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Weather Analytics Dashboard',
                'description' => 'Dashboard interactivo para análisis de datos meteorológicos con visualizaciones avanzadas y predicciones ML.',
                'image' => '/weather-analytics-dashboard.jpg',
                'technologies' => ['React', 'D3.js', 'Python', 'FastAPI'],
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com/example',
                'featured' => false,
                'order' => 3,
            ],
            [
                'title' => 'Social Media Scheduler',
                'description' => 'Herramienta para programar y gestionar contenido en múltiples redes sociales con analytics integrados.',
                'image' => '/social-media-scheduler.jpg',
                'technologies' => ['Vue.js', 'Node.js', 'MongoDB', 'Redis'],
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com/example',
                'featured' => false,
                'order' => 4,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // Create experiences
        $experiences = [
            [
                'company' => 'TechCorp Solutions',
                'position' => 'Senior Full Stack Developer',
                'period' => '2022 - Presente',
                'description' => 'Lidero el desarrollo de aplicaciones web escalables, mentorizo desarrolladores junior y optimizo arquitecturas cloud.',
                'order' => 1,
            ],
            [
                'company' => 'StartupXYZ',
                'position' => 'Frontend Developer',
                'period' => '2020 - 2022',
                'description' => 'Desarrollé interfaces de usuario modernas y responsivas, implementé sistemas de design systems y mejoré la UX.',
                'order' => 2,
            ],
            [
                'company' => 'Digital Agency',
                'position' => 'Web Developer',
                'period' => '2019 - 2020',
                'description' => 'Creé sitios web corporativos y e-commerce, trabajé con clientes directamente y mantuve múltiples proyectos.',
                'order' => 3,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}