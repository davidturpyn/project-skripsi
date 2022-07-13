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
        <h2 class="section-title">This is Example Page</h2>
        <p class="section-lead">This page is just an example for you to create your own page.</p>
        <div class="card">
            <div class="card-header">
                <h4>Rekomendasi lowongan kerja</h4>
            </div>
            <div class="card-body">
                looping lowongan kerja
            </div>
        </div>
    </div>
@endsection
