<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ShowMedications;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowMedicationsTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowMedications::class);

        $component->assertStatus(200);
    }
}
