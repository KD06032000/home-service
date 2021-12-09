<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithFileUploads;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Illuminate\Support\Str;


class AdminEditServiceComponent extends Component
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


    public $newthumbnail;
    public $newimage;
    public $service_id;

    public function mount($service_slug) {
        $service = Service::where('slug',$service_slug)->first();
        $this->service_id = $service_id;
        $this->name = $service->name;
        $this->slug = $service->slug;
        $this->tagline = $service->tagline;
        $this->service_category_id = $service->service_category_id;
        $this->price = $service->price;
        $this->discount = $service->discount;
        $this->discount_type = $service->discount_type;
        $this->image = $service->image;
        $this->thumbnail = $service->thumbnail;
        $this->description = $service->description;
        $this->inclustion = str_replace("|","\n",$service->inclustion);
        $this->exclustion = str_replace("|","\n",$service->exclustion);
    }

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
           'description'=> 'required',
           'inclustion'=> 'required',
           'exclustion'=> 'required'
        ]);
        if($this->newthumbnail) {
            $this->validateOnly($fields,[
                'newthumbnail'=>'required|mimes:jpeg,png'
            ]);
        }

        if($this->newimage) {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpeg,png'
            ]);
        }
    }

    public function updateService() {
        $this->valiadate([
            'name'=> 'required',
            'slug'=> 'required',
            'tagline'=> 'required',
            'service_category_id'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
            'inclustion'=> 'required',
            'exclustion'=> 'required'
         ]);
         if($this->newthumbnail) {
            $this->validate([
                'newthumbnail'=>'required|mimes:jpeg,png'
            ]);
        }

        if($this->newimage) {
            $this->validate([
                'newimage'=>'required|mimes:jpeg,png'
            ]);
        }

        $service =  Service::find($this->service_id);
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

        if($this->newthumbnail) {
            unlink('images/services/thumbnails'.'/'.$service->thumbnail);
        
            $imageName = Carbon::now()->timestamp.'.'.$this->newthumbnail->extension();
            $this->newthumbnail->storeAs('services/thumbnails',$imageName);
            $service->thumbnail = $imageName;
        }

        if($this->newimage) {
            unlink('images/services'.'/'.$service->image);
            $imageName2 = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('services',$imageName2);
            $service->image = $this->$imageName2;
        }
        $service->save();
        session()->flash('message', 'Service has been update successfully');
    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-edit-service-component',['categories'=>$categories])->layout('layouts.base');
    }
}
