<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearchFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forms = [
            'Thesis contract',
            'Grammarly/Plagis (Proposal & Orals)',
            'Minutes (Proposal & Orals)',
            'Title Approval',
            'Title Justification',
            'Instrument Validation / Questionnaire validation',
            'Result of Pilot Testing with Questionnaire',
            'Permit to Conduct',
            'Ethics Cert',
            'Library Cert',
            'Statistician Cert',
            'Human Grammarian Cert',
            'Proposal Approval',
            'Final Revision',
            'Journal Acceptance',
            'Gantt Chart',
            'Pictures of Hardbound',
        ];

        foreach ($forms as $form) {
            DB::table('research_forms')->insert([
                'title' => $form,
            ]);
        }
    }
}
