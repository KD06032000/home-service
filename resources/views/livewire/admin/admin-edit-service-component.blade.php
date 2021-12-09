<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1> Add Service Categories</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Add Service </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class=" col-md-8 col-md-offset-2 profile1">
                           <div class="panel panel-default">
                               <div class="panel-heading">
                                   <div class="row">
                                       <div class="col-md-6">
                                           Edit Service 
                                       </div>
                                       <div class="col-md-6">
                                           <a href="{{ route('admin.all_services') }}" class="btn btn-info pull-right">All Services</a>
                                       </div>
                                   </div>
                               </div>
                               <div class="panel-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                   <form class="form-horizontal" wire:submit.prevent="updateService">
                                       @csrf
                                       <div class="form-group">
                                           <label for="name" class="control-label col-sm-3">Service Name:</label>
                                           <div class="col-sm-9">
                                               <input type="text" class="form-cotrol" name="name" wire:keyup="generateSlug" />
                                               @error('name') <p class="text-danger">{{ $message }}</p> @enderror                                      
                                           </div>
                                       </div>
                                       <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3"> Slug:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-cotrol" name="slug" wire:model="slug" />
                                                @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3"> Tagline: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-cotrol" name="tagline" wire:model="tagline" />
                                                @error('tagline') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3"> Service Category: </label>
                                            <div class="col-sm-9">
                                                <select name="" class='form-control' wire:model="service_category_id">
                                                    <option value="">Select Service Category</option>
                                                    @foreach ($categories as $category )
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select> 
                                                @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3"> Price: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-cotrol" name="price" wire:model="price" />
                                                @error('price') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3"> Discount: </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-cotrol" name="discount" wire:model="discount" />
                                                @error('discount') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3"> Discount: </label>
                                            <div class="col-sm-9">
                                                <select name="" class='discount_type'>
                                                    <option value="">select Service Category</option>
                                                    <option value="fix">Fixed</option>
                                                    <option value="percent">Percent</option>
                                                </select>
                                                @error('discount_type') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3"> Description: </label>
                                            <div class="col-sm-9">
                                                <textarea class='form-control' wire:model="description"></textarea>
                                                @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3"> Inclustion: </label>
                                            <div class="col-sm-9">
                                                <textarea class='form-control' wire:model="inclustion"></textarea>
                                                @error('inclustion') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3"> Exclustion: </label>
                                            <div class="col-sm-9">
                                                <textarea class='form-control' wire:model="exclustion"></textarea>
                                                @error('exclustion') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3">Thumbnail:</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-cotrol-file" name="newthumbnail" wire:model="thumbnail" />
                                                @error('newthumbnail') <p class="text-danger">{{ $message }}</p> @enderror
                                                @if ($newthumbnail)
                                                  <img src = "{{ $newthumbnail->temporaryUrl() }}" width="60" />  
                                                @else
                                                    <img src="{{ asset('images/services/thumbnails') }}/{{ $thumbnail }}" alt="" width="60">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3">Category Image:</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-cotrol-file" name="image" wire:model="newimage" />
                                                @error('newimage') <p class="text-danger">{{ $message }}</p> @enderror
                                                @if ($newimage)
                                                  <img src = "{{ $newimage->temporaryUrl() }}" width="60" />  
                                                @else
                                                    <img src="{{ asset('images/services') }}/{{ $image }}" alt="" width="60">
                                                @endif
                                            </div>
                                        </div>
                                       <button type="submit" class="btn btn-success pull-right">Update Service</button>
                                   </form>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


