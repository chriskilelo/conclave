<?php

namespace Database\Seeders;

use App\Models\Honorific;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HonorificSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $honorifics = [
            // Common Honorifics
            ['name' => 'Mr.', 'description' => 'Used for adult men, regardless of marital status.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => true],
            ['name' => 'Mrs.', 'description' => 'Used for married women.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => true],
            ['name' => 'Miss', 'description' => 'Used for unmarried women.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => true],
            ['name' => 'Ms.', 'description' => 'Neutral form for women, regardless of marital status.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => true],
            ['name' => 'Master', 'description' => 'Traditionally used for boys or young men under 18.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],

            // // Professional and Academic Honorifics
            ['name' => 'Dr.', 'description' => 'Used for holders of doctoral degrees (PhD, MD, etc.).', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Prof.', 'description' => 'Used for university professors.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Eng.', 'description' => 'Used by licensed engineers.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Arch.', 'description' => 'Used by registered architects.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Adv.', 'description' => 'Short for Advocate; used by lawyers.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Atty.', 'description' => 'Attorney; legal practitioner.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'CPA', 'description' => 'Certified Public Accountant.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],

            // Religious Honorifics
            ['name' => 'Rev.', 'description' => 'Reverend; used for Christian clergy.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Fr.', 'description' => 'Father; Roman Catholic or Orthodox priest.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Pastor', 'description' => 'Used for Protestant Christian clergy.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Bishop', 'description' => 'High-ranking Christian clergy.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Cardinal', 'description' => 'Senior leader in the Catholic Church.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],

            // Military and Government Honorifics
            ['name' => 'Gen.', 'description' => 'General; high-ranking army officer.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Col.', 'description' => 'Colonel; senior military officer.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Maj.', 'description' => 'Major; mid-level officer.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Capt.', 'description' => 'Captain; naval or army officer.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Lt.', 'description' => 'Lieutenant; junior officer.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Cmdr.', 'description' => 'Commander; mid-to-senior naval rank.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Sgt.', 'description' => 'Sergeant; non-commissioned officer.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Chief', 'description' => 'Used in police or tribal contexts.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],

            // Honorifics for Officials and Nobility
            ['name' => 'Hon.', 'description' => 'Honorable; used for elected officials and judges.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'H.E.', 'description' => 'His/Her Excellency; for presidents, ambassadors, governors.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Rt. Hon.', 'description' => 'Right Honorable; senior parliamentary figures.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Justice', 'description' => 'Used for judges in higher courts.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Sir', 'description' => 'Knighted male; conferred by a monarch.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Dame', 'description' => 'Female equivalent of "Sir."', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Your Excellency', 'description' => 'Formal diplomatic or government greeting.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Your Honor', 'description' => 'Formal address for a judge in court.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],

            // Royalty and Nobility Honorifics
            ['name' => 'King', 'description' => 'Male monarch.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Queen', 'description' => 'Female monarch.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Prince', 'description' => 'Royal family member.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Princess', 'description' => 'Female royal family member.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Duke', 'description' => 'High-ranking noble.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Duchess', 'description' => 'Female equivalent of Duke.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Earl', 'description' => 'Aristocratic title.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Countess', 'description' => 'Female equivalent of Earl.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Lord', 'description' => 'Generic noble title.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Lady', 'description' => 'Female noble or polite title.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Baron', 'description' => 'Lower noble rank.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Baroness', 'description' => 'Female equivalent of Baron.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'His Royal Highness', 'description' => 'Used for senior royals.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Her Royal Highness', 'description' => 'Used for senior female royals.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],

            // Other Honorifics
            ['name' => 'Sen.', 'description' => 'Senator; used for members of a senate.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Rep.', 'description' => 'Representative; used for members of a legislative body.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Amb.', 'description' => 'Ambassador; diplomatic representative.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Cllr.', 'description' => 'Councillor; local government official.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
            ['name' => 'Esq.', 'description' => 'Used after names of lawyers.', 'created_by' => 'SYSTEM SEEDER', 'is_active' => false],
        ];

        // Loop through the array provided above
        foreach ($honorifics as $honorific) {
            // Retrieve honorific by name or create it with the other columns/items in the array if it does not exist
            Honorific::firstOrCreate(['name' => $honorific['name']], $honorific);
        }
    }
}
