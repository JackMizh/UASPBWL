<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Golongan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Tambah Data
                    </button>
                    <table class="table table-bordered">
                        <thead>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($golongan as $item)
                                <tr>
                                    <td>{{ $item->gol_kode }}</td>
                                    <td>{{ $item->gol_nama }}</td>
                                    <td>

                                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-{{ $item->id }}">
                                            Edit Data
                                        </button>
                                        <form action="{{ route('golongan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('golongan.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="gol_kode" name="gol_kode"
                                placeholder="Kode">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="gol_nama"
                                placeholder="Nama">
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($golongan as $itm)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{ $itm->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('golongan.update', $itm->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" id="gol_kode" name="gol_kode"
                                    placeholder="Kode" value="{{ $itm->gol_kode }}">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="gol_nama"
                                    placeholder="Nama" value="{{ $itm->gol_nama }}">
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
