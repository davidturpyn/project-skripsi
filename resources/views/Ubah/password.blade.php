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
                            <h4>Ubah Password</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('edit.password') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="password">Kata Sandi Lama</label>
                                    <input id="password" type="password" class="form-control pwstrength"
                                        data-indicator="pwindicator" name="current_password" tabindex="2" required>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Kata Sandi Baru</label>
                                    <input id="password" type="password" class="form-control pwstrength"
                                        data-indicator="pwindicator" name="new_password" tabindex="2" required>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">Konfirmasi Kata Sandi</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="new_confirm_password" tabindex="2" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Ubah Kata Sandi
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
