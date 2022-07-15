<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Tambah Data
                    </button>
                    <table class="table table-bordered">
                        <thead>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Pos</th>
                        </thead>
                        <tbody>

                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->pos }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-{{ $item->id }}">
                                            Edit Data
                                        </button>
                                        <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mb-2">
                                                Hapus Data
                                            </button>
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
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="name" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="nama">Email</label>
                            <input type="text" class="form-control" id="nama" name="email" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="nama">Alamat</label>
                            <textarea name="alamat" id="" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nama">No Hp</label>
                            <input type="number" class="form-control" id="nama" name="no_hp"
                                placeholder="No Hp">
                        </div>
                        <div class="form-group">
                            <label for="nama">Kode Pos</label>
                            <input type="number" class="form-control" id="nama" name="pos"
                                placeholder="No Hp">
                        </div>
                        <div class="form-group">
                            <label for="nama">Password</label>
                            <input type="text" class="form-control" id="nama" name="password"
                                placeholder="Masukan Password anda">
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($users as $us)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{ $us->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.update', $us->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="{{ $us->name }}" id="nama"
                                    name="name" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="nama">Email</label>
                                <input type="text" class="form-control" id="nama" name="email"
                                    placeholder="Email" value="{{ $us->email }}">
                            </div>
                            <div class="form-group">
                                <label for="nama">Alamat</label>
                                <textarea name="alamat" id="" rows="5" class="form-control">{{ $us->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="nama">No Hp</label>
                                <input type="number" class="form-control" id="nama"
                                    value="{{ $us->no_hp }}" name="no_hp" placeholder="No Hp">
                            </div>
                            <div class="form-group">
                                <label for="nama">Kode Pos</label>
                                <input type="number" class="form-control" id="nama" name="pos"
                                    placeholder="Kode Pos" value="{{ $us->pos }}">
                            </div>
                            <div class="form-group">
                                <label for="nama">Password</label>
                                <input type="text" class="form-control" id="nama" name="password"
                                    placeholder="Masukan Password anda">
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
