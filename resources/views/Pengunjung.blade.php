<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengunjung') }}
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
                            <th>ID Golongan</th>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>KTP</th>
                            <th>Seri</th>
                            <th>ket</th>
                            <th>User ID</th>
                            <th>status</th>
                            <th>aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($pengunjung as $item)
                                <tr>
                                    <td>{{ $item->id_golongans }}</td>
                                    <td>{{ $item->pel_no }}</td>
                                    <td>{{ $item->pel_nama }}</td>
                                    <td>{{ $item->pel_alamat }}</td>
                                    <td>{{ $item->pel_no_hp }}</td>
                                    <td>{{ $item->pel_ktp }}</td>
                                    <td>{{ $item->pel_seri }}</td>
                                    @if ($item->pel_aktif == 1)
                                        <td>Aktif</td>
                                    @else
                                        <td>Tidak Aktif</td>
                                    @endif
                                    <td>{{ $item->user->name }}</td>
                                    @if ($item->pel_status == 'Y')
                                        <td>Ya</td>
                                    @elseif($item->pel_status == 'N')
                                        <td>TIDAK</td>
                                    @endif
                                    <td>
                                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-{{ $item->id }}">
                                            Edit Data
                                        </button>
                                        <form action="{{ route('pengunjung.destroy', $item->id) }}" method="POST">
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
                    <form action="{{ route('pengunjung.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <select name="id_golongans" id="" class="form-control">
                                <option value="">-- Pilih Golongan --</option>
                                @foreach ($golongan as $item)
                                    <option value="{{ $item->id }}">{{ $item->gol_kode }} -
                                        {{ $item->gol_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No</label>
                            <input type="number" class="form-control" placeholder="masukan nama" name="pel_no">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="masukan nama" name="pel_nama">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="pel_alamat" id="" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <Label>NO HP</Label>
                            <input type="number" name="pel_no_hp" class="form-control" placeholder="masukan no hp">
                        </div>
                        <div class="form-group">
                            <label for="">NO IDENTITAS</label>
                            <input type="number" name="pel_ktp" class="form-control" placeholder="masukan no ktp">
                        </div>
                        <div class="form-group">
                            <label for="">NO SERI</label>
                            <input type="number" name="pel_seri" class="form-control" placeholder="masukan no ktp">
                        </div>
                        <div class="form-group">
                            <LABEl>User</LABEl>
                            <select name="user_id" class="form-control">
                                <option value="">-- Pilih User --</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($pengunjung as $item)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pengunjung.update', $item->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <select name="id_golongans" id="" class="form-control">
                                    <option value="{{ $item->id_golongans }}">{{ $item->golongan->gol_kode }} -
                                        {{ $item->golongan->gol_nama }}</option>
                                    @foreach ($golongan as $gol)
                                        <option value="{{ $gol->id }}">{{ $gol->gol_kode }} -
                                            {{ $gol->gol_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>No</label>
                                <input type="text" class="form-control" placeholder="masukan nama" name="pel_no"
                                    value="{{ $item->pel_no }}">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="{{ $item->pel_nama }}" class="form-control"
                                    placeholder="masukan nama" name="pel_nama">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="pel_alamat" id="" rows="5" class="form-control">{{ $item->pel_alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <Label>NO HP</Label>
                                <input type="number" value="{{ $item->pel_no_hp }}" name="pel_no_hp"
                                    class="form-control" placeholder="masukan no hp">
                            </div>
                            <div class="form-group">
                                <label for="">NO IDENTITAS</label>
                                <input type="number" value="{{ $item->pel_ktp }}" name="pel_ktp"
                                    class="form-control" placeholder="masukan no ktp">
                            </div>
                            <div class="form-group">
                                <label for="">NO SERI</label>
                                <input type="number" value="{{ $item->pel_seri }}" name="pel_seri"
                                    class="form-control" placeholder="masukan no ktp">
                            </div>
                            <div class="form-group">
                                <LABEl>User</LABEl>
                                <select name="user_id" class="form-control">
                                    <option value="{{ $item->user_id }}">{{ $item->user->name }}</option>
                                    @foreach ($user as $itm)
                                        <option value="{{ $itm->id }}">{{ $itm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <LABEl>Keterangan</LABEl>
                                <select name="pel_aktif" class="form-control">
                                    @if ($item->pel_aktif == 1)
                                        <option value="{{ $item->pel_aktif }}">AKTIF</option>
                                    @else
                                        <option value="{{ $item->pel_aktif }}">TIDAK AKTIF</option>
                                    @endif
                                    <option value="1">AKTIF</option>
                                    <option value="0">TIDAK AKTIF</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <LABEl>Keterangan</LABEl>
                                <select name="pel_status" class="form-control">
                                    @if ($item->pel_status == 'Y')
                                        <option value="{{ $item->pel_status }}">YA</option>
                                    @else
                                        <option value="{{ $item->pel_status }}">TIDAK</option>
                                    @endif
                                    <option value="Y">YA </option>
                                    <option value="N">TIDAK</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
