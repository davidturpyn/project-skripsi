@extends('layouts.admin.master')

@section('title','Kotawaringin Barat')

@section('content')
<div class="section-header">
  <h1>Dashboard</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  </div>
</div>
<h1>Informasi jumlah perusahaan, lowongan kerja, pencari kerja</h1>
<div class="card">
    <div class="card-header">
      <h4>Bordered</h4>
    </div>
    <div class="card-body">
      <div class="section-title mt-0">Light</div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
@endsection