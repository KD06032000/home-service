<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;

class ProviderDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.provider.provider-dashboard-component')->layout('layouts.base');
    }
}
