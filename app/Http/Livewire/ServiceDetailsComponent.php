<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceDetailsComponent extends Component
{
    public $service_slug;

    public function mount($service_slug) {
        $this->service_slug = $service->slug;
    }
    public function render()
    {
        $services = Service::where('slug',$this->service_slug)->first();
        $r_service = Service::where('service_category_id',$service->service_category_id)->where('slug','!=',$this->service_slug)->inRandomOrder()->first();
        return view('livewire.service-details-component',['service'->$service,'r_service'=>$r_service])->layout('layouts.base');
    }
}
