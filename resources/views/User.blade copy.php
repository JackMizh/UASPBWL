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

                    <form action="{{ route('user.edit', Auth::user()->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">No Hp</label>
                                        <input type="text" class="form-control" name="no_hp"
                                            placeholder="masukan no hp anda" value="{{ Auth::user()->no_hp }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Kode Pos</label>
                                        <input type="text" class="form-control" name="pos"
                                            placeholder="masukan kode pos anda" value="{{ Auth::user()->pos }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="" rows="5">
                                            {{ Auth::user()->alamat }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


</x-app-layout>
