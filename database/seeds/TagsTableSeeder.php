<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $kinds = ['position', 'skill', 'device'];

        foreach ($kinds as $kind) {
            if ($kind === 'position') {
                $positions = ['staff', 'intern'];
                foreach ($positions as $position) {
                    factory(Tag::class, 1)->create(['kind' => $kind, 'name' => $position]);
                }
            }

            if ($kind === 'skill') {
                $skills = ['php', 'java', 'javascript'];
                foreach ($skills as $skill) {
                    factory(Tag::class, 1)->create(['kind' => $kind, 'name' => $skill]);
                }
            }

            if ($kind === 'device') {
                $devices = ['mouse', 'keyboard'];
                foreach ($devices as $device) {
                    factory(Tag::class, 1)->create(['kind' => $kind, 'name' => $device]);
                }
            }
        }
    }

}
