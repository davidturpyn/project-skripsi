@extends('layouts.pencari_kerja.master')

@section('title', 'Kotawaringin Barat')

@section('content')
    {{-- main content --}}
    <div class="section-header">
        <h1>halo, {{ Auth::user()->firstname }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Beranda</a></div>
            {{-- <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Top Navigation</div> --}}
        </div>
    </div>

    <div class="section-body">
        {{-- <h2 class="section-title">This is Example Page</h2>
        <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
        <div class="card">
            <div class="card-header">
                <h4>Rekomendasi lowongan kerja</h4>
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach ($lowongan_kerjas as $l)
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $l->judul_pekerjaan }}</h5>
                                <small class="text-muted">{{ Carbon\Carbon::parse($l->created_at)->diffForHumans()}} </small>
                            </div>
                            <bold><p class="mb-1">{{ $l->data_pemberi_kerja->nama_perusahaan }}</p></bold>
                            <p class="mb-1">{{ $l->nama_jalan }}</p>
                            <small class="text-muted">Lamar sebelum {{ \Carbon\Carbon::parse($l->tanggal_expired)->toFormattedDateString() }}</small>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
