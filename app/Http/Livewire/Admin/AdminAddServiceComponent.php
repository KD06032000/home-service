<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Service;
use Livewire\WithFileUploads;
class AdminAddServiceComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    public $price;
    public $discount;
    public $discount_type;
    public $image;
    public $thumbnail;
    public $description;
    public $inclustion;
    public $exclustion;

    public function generateSlug() {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=> 'required',
           'slug'=> 'required',
           'tagline'=> 'required',
           'service_category_id'=> 'required',
           'price'=> 'required',
           'image'=> 'required|mimes:jpeg,png',
           'thumbnail'=> 'required',
           'description'=> 'required',
           'inclustion'=> 'required',
           'exclustion'=> 'required'
        ]);

       
    }

    public function createService() {
        $this->valiadate([
           'name'=> 'required',
           'slug'=> 'required',
           'tagline'=> 'required',
           'service_category_id'=> 'required',
           'price'=> 'required',
           'image'=> 'required|mimes:jpeg,png',
           'thumbnail'=> 'required',
           'description'=> 'required',
           'inclustion'=> 'required',
           'exclustion'=> 'required'
        ]);

        $service = new Service();
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->tagline = $this->tagline;
        $service->service_category_id = $this->service_category_id;
        $service->price = $this->price;
        $service->discount = $this->discount;
        $service->discount_type = $this->discount_type;
        $service->description = $this->description;
        $service->inclustion = str_replace("\n",'|',trim($this->inclustion));
        $service->exclustion = str_replace("\n",'|',trim($this->exclustion));


        $imageName = Carbon::now()->timestamp.'.'.$this->thumbnail->extension();
        $this->thumbnail->storeAs('services/thumbnails',$imageName);
        $service->thumbnail = $imageName;

        $imageName2 = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('services',$imageName2);
        $service->image = $this->$imageName2;

        $service->save();
        session()->flash('message', 'Service has been create successfully');
    }
    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-add-service-component',['categories'=>$categories])->layout('layouts.base');
    }
}
