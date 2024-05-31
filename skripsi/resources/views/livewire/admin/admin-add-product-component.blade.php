<div>

    <section class="mt-50 mb-50">
        <div class="container bg-white radius p-4">
            <div class="row">
                <div class="col-md-8 col-lg-9 col-sm-6 mb-3">
                    <p>Tambahkan Barang</p>
                </div>
                <div class="col-md-4 col-lg-3 col-sm-6 d-flex justify-content-end mb-3">
                    <a href="{{route('admin.product')}} " class="btn btn-success ">Tampilkan semua Barang</a> 
                </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>
                        @endif
                        <form wire:submit.prevent="addProduct" >
                            <div class="my-3">
                                <label for="name" class="form-name"> <p  class="fw-bold text-dark">Nama Barang</p> </label>
                                <input type="text" name="name" class="form-control" placeholder="Masukan nama Barang" wire:model="name" wire:keyup="generateSlug" >
                                @error('name')
                                    <p class="text-danger">{{$message}} </p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="slug" class="form-name"> <p class="fw-bold text-dark">Slug</p> </label>
                                <input type="text" name="slug" class="form-control" placeholder="Masukan Barang slug" wire:model="slug">
                                @error('slug')
                                <p class="text-danger">{{$message}} </p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="slug" class="form-name"> <p class="fw-bold text-dark">Deskripsi singkat</p> </label>
                                <textarea name="deskripsi_pendek" class="form-control" placeholder="Masukan deskripsi singkat barang" wire:model="deskripsi_pendek"></textarea>
                                @error('slug')
                                <p class="text-danger">{{$message}} </p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="slug" class="form-name"> <p class="fw-bold text-dark">Deskripsi</p> </label>
                                <textarea name="deskripsi" class="form-control" placeholder="Masukan deskripsi barang"  wire:model="deskripsi"></textarea>
                                @error('slug')
                                <p class="text-danger">{{$message}} </p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="slug" class="form-name"> <p class="fw-bold text-dark">Harga jual barang</p> </label>
                                <input type="text" name="harga_normal" class="form-control" placeholder="Masukan harga barang yang dijual" wire:model="harga_normal">
                                @error('slug')
                                <p class="text-danger">{{$message}} </p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="slug" class="form-name"> <p class="fw-bold text-dark">Harga sebelum diskon</p> </label>
                                <input type="text" name="harga_diskon" class="form-control" placeholder="Masukan harga barang sebelum diskon" wire:model="harga_diskon">
                                @error('slug')
                                <p class="text-danger">{{$message}} </p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="slug" class="form-name"> <p class="fw-bold text-dark">Kode SKU anda</p></label>
                                <input type="text" name="SKU" class="form-control" placeholder="Masukan kode SKU barang anda contoh (123abc)" wire:model="sku">
                                @error('slug')
                                <p class="text-danger">{{$message}} </p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="regular_price" class="form-label" wire:model="status_barang"><p class="fw-bold text-dark">Status Barang</p></label>
                                    <select class="form-control" >
                                    <option value="ada">Ada</option>
                                    <option value="habis">Habis</option>
                                    </select>
                                @error('slug')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="slug" class="form-name"> <p class="fw-bold text-dark">Alamat toko</p> </label>
                                <textarea name="alamattoko" class="form-control" placeholder="Masukan Alamat toko"  wire:model="alamattoko"></textarea>
                                @error('slug')
                                <p class="text-danger">{{$message}} </p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="jumlah_barang" class="form-label" ><p class="fw-bold text-dark">Berat barang dalam satuan *KG*</p></label>
                                <input type="text" name="quantity" class="form-control" placeholder="Masukan berat barang contoh (5)"  wire:model="berat_barang">
                            @error('slug')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                            <div class="mb-3 mt-3">
                                    <label for="jumlah_barang" class="form-label"><p class="fw-bold text-dark">Jumlah barang per satuan *kg* di atas</p></label>
                                    <input type="text" name="quantity" class="form-control" placeholder="Masukan jumlah barang contoh (5)"  wire:model="jumlah_barang">
                                @error('slug')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                    <label for="image" class="form-label"><p class="fw-bold text-dark"> Gambar barang</p></label>
                                    <input type="file" name="image" class="form-control"  wire:model="image"/>
                                    @if($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120" />
                                    @endif
                                @error('slug')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="category_id" class="form-label" > <p class="fw-bold text-dark">Kategori barang</p> </label>
                                    <select class="form-control" name="category_id" wire:model="category_id">
                                    <option value="">Pilih kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}} </option>
                                    @endforeach
                                    </select>
                                @error('slug')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-lg float-end " name="submit" class="btn button-success">Selesai</button>
                        </form>
                    </div>
            </div>
        </div>
    </section>
</div>