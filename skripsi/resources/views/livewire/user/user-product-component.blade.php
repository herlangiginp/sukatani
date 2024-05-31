<section class="mt-50 mb-50">
    <div class="container bg-white radius p-4">
        <div class="row">
            <div class="col-md-8 col-lg-9 col-sm-6 mb-3">
                <p>Daftar kategori</p>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6 d-flex justify-content-end mb-3">
                <a href="{{ route('user.product.add') }}" class="btn btn-success">Tambahkan barang</a>
            </div><p>Terdapat <strong class="text-brand">{{$products->total()}}</strong> barang yang terdaftar!</p>
            <div class="col-12">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <table class="table shopping-summery text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Dibuat</th>
                                <th scope="col">Ubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = ($products->currentPage() - 1) * $products->perPage();
                            @endphp
                            @foreach ($products as $product)
                          
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><img src="{{ asset('img/produk/' . $product->image) }}" alt="{{$product->name}}"> </td>
                                <td>{{$product->name}}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{$product->harga_normal}}</td>
                                <td>{{$product->alamattoko}}</td>
                                <td>{{$product->jumlah_barang}}</td>
                                <td>{{$product->created_at}}</td>
                                <td>
                                    <a href="{{route('user.product.edit', ['product_id' =>$product->id])}}" class="btn btn-success mx-2">Edit</a>
                                </td>
                                <td><button class="btn btn-danger mx-2" onclick="deleteConfirmation({{ $product->id }})">Hapus</button></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links("pagination::bootstrap-5")}}
                </div>
            </div>
        </div>
    </section>
</div>


<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Do you want to delete this record?</h4>
                        <a href="#" class="btn btn-secondary" onclick="closeConfirmation()">Batal</a>
                        <a class="btn btn-danger" onclick="deleteProduct()">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    function deleteConfirmation(id) {
        @this.set('product_id', id);
        $('#deleteConfirmation').modal('show');
    }
    function deleteProduct() {
        @this.call('deleteProduct');
        $('#deleteConfirmation').modal('hide');
    }
    function closeConfirmation() {
        $('#deleteConfirmation').modal('hide');
    }
    Livewire.on('ProductDeleted', function() {
        // Handle the 'ProductDeleted' event, refresh the component
        @this.set('refreshComponent', true); // Set the flag to true to refresh the component
    });
</script>
@endpush