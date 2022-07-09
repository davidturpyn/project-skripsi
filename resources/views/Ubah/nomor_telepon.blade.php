@extends('layouts.app')

@section('title', 'Kotawaringin Barat')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ URL::asset('img/kobar.png') }}" alt="logo" width="86" class="css-class">
                        <label for="">Sistem Tenaga Kerja Kotawaringin Barat</label>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Ubah Nomor Telepon</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('update.telepon', $data_user->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label for="telepon">Masukkan Nomor Telepon Anda</label>
                                    <input id="telepon" type="telepon" class="form-control " name="telepon" tabindex="2" required
                                        value="{{ $data_user->telepon }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Ubah Nomor Telepon
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
