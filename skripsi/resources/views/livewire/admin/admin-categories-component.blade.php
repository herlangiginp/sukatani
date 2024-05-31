<div>

    <section class="mt-50 mb-50">
        <div class="container bg-white radius p-4">
            <div class="row">
                <div class="col-md-8 col-lg-9 col-sm-6 mb-3">
                    <p>Daftar kategori</p>
                </div>
                <div class="col-md-4 col-lg-3 col-sm-6 d-flex justify-content-end mb-3">
                    <a href="{{ route('admin.categories.add') }}" class="btn btn-success">Tambahkan kategori</a>
                    
                </div>
                <div class="col-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = ($categories->currentPage() - 1) * $categories->perPage();
                                @endphp
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', ['category_id' => $category->id]) }}"
                                            class="btn btn-success mx-2">Ubah</a>
                                        <button class="btn btn-danger mx-2" onclick="deleteConfirmation({{ $category->id }})"
                                            >Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categories->links("pagination::bootstrap-5")}}
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
                        <a class="btn btn-danger" onclick="deleteCategory()">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    function deleteConfirmation(id) {
        @this.set('category_id', id);
        $('#deleteConfirmation').modal('show');
    }
    function deleteCategory() {
        @this.call('deleteCategory');
        $('#deleteConfirmation').modal('hide');
    }
    function closeConfirmation() {
        $('#deleteConfirmation').modal('hide');
    }
    Livewire.on('categoryDeleted', function() {
        // Handle the 'categoryDeleted' event, refresh the component
        @this.set('refreshComponent', true); // Set the flag to true to refresh the component
    });
</script>
@endpush