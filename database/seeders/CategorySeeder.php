<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Metabolic Health',
                'description' => 'Evidence-based explainers on metabolism, insulin resistance, inflammation, obesity, glucose regulation, and cardiometabolic health.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Exercise & Fitness Science',
                'description' => 'Clear explanations of exercise physiology, training adaptations, recovery, performance, and fitness claims.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Disease & Prevention',
                'description' => 'Reader-friendly science explainers on disease mechanisms, risk factors, prevention, and public health evidence.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Cancer & Emerging Therapies',
                'description' => 'Balanced explanations of cancer biology, emerging therapies, immunotherapy, targeted treatments, and biomedical advances.',
                'sort_order' => 4,
            ],
            [
                'name' => 'Longevity & Aging',
                'description' => 'Evidence-based analysis of aging biology, longevity claims, lifespan research, and healthspan interventions.',
                'sort_order' => 5,
            ],
            [
                'name' => 'Nutrition & Supplements',
                'description' => 'Practical science explanations of nutrition claims, supplements, dietary patterns, and nutrient-related health evidence.',
                'sort_order' => 6,
            ],
            [
                'name' => 'Rare Diseases Explained',
                'description' => 'Accessible explanations of rare disease mechanisms, genetics, symptoms, research directions, and emerging therapies.',
                'sort_order' => 7,
            ],
            [
                'name' => 'Health Myths',
                'description' => 'Careful, evidence-based checks of popular health myths, exaggerated claims, and misleading wellness narratives.',
                'sort_order' => 8,
            ],
            [
                'name' => 'Research Explained',
                'description' => 'Breakdowns of new studies, systematic reviews, meta-analyses, and biomedical findings for everyday readers.',
                'sort_order' => 9,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                [
                    'description' => $category['description'],
                    'sort_order' => $category['sort_order'],
                    'is_active' => true,
                ]
            );
        }
    }
}