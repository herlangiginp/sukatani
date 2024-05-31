<div>

    <section class="mt-50 mb-50">
        <div class="container bg-white radius p-4">
            <div class="row">
                <div class="col-md-8 col-lg-9 col-sm-6 mb-3">
                    <p>Edit kategori</p>
                    
                </div>
                <div class="col-md-4 col-lg-3 col-sm-6 d-flex justify-content-end mb-3">
                    <a href="{{route('admin.categories')}} " class="btn btn-success">Tampilkan semua kategori</a>
                </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                        @endif
                        <form wire:submit.prevent="updateCategory" >
                            <div class="my-3">
                                <label for="name" class="form-name"> <p  class="fw-bold text-dark">Nama kategori</p> </label>
                                <input type="text" name="name" class="form-control" placeholder="Masukan nama kategori" wire:model="name" wire:keyup="generateSlug">
                                @error('name')
                                    <p class="text-danger">{{$message}} </p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="slug" class="form-name"> <p class="fw-bold text-dark"> Slug </p> </label>
                                <input type="text" name="slug" class="form-control" placeholder="Masukan kategori slug" wire:model="slug">
                                @error('slug')
                                <p class="text-danger">{{$message}} </p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-lg float-end " name="submit" class="btn button-success">Selesai</button>
                        </form>
                        
                        
                        
                        
                    </div>
            </div>
        </div>
    </section>
</div>