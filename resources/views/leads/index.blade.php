@extends('layouts.master')
@section('tab_tittle', 'Leads')
@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-6">
        <div class="header-title">
          <h4 class="card-title">Master Data</h4>
          <p><a href="https://mission1.id/ContentCreator" target="_BLANK"> https://mission1.id/ContentCreator </a></p>
        </div>
      </div>
      <div class="col-6">
        <div class="float-end">
          <a href="{{ route('export') }}" target="_BLANK" type="button" class="btn btn-success"> <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.92574 16.39H14.3119C14.7178 16.39 15.0545 16.05 15.0545 15.64C15.0545 15.23 14.7178 14.9 14.3119 14.9H8.92574C8.5198 14.9 8.18317 15.23 8.18317 15.64C8.18317 16.05 8.5198 16.39 8.92574 16.39ZM12.2723 9.9H8.92574C8.5198 9.9 8.18317 10.24 8.18317 10.65C8.18317 11.06 8.5198 11.39 8.92574 11.39H12.2723C12.6782 11.39 13.0149 11.06 13.0149 10.65C13.0149 10.24 12.6782 9.9 12.2723 9.9ZM19.3381 9.02561C19.5708 9.02292 19.8242 9.02 20.0545 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5099 22 16.0545 22H8.17327C5.59901 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.5 2 7.96535 2H13.2525C13.5099 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.203 9.01 17.0149 9.02C17.4381 9.02 17.8112 9.02316 18.1377 9.02593C18.3917 9.02809 18.6175 9.03 18.8168 9.03C18.9578 9.03 19.1405 9.02789 19.3381 9.02561ZM19.6111 7.566C18.7972 7.569 17.8378 7.566 17.1477 7.559C16.0527 7.559 15.1507 6.648 15.1507 5.542V2.906C15.1507 2.475 15.6685 2.261 15.9646 2.572C16.5004 3.13476 17.2368 3.90834 17.9699 4.67837C18.7009 5.44632 19.4286 6.21074 19.9507 6.759C20.2398 7.062 20.0279 7.565 19.6111 7.566Z" fill="currentColor" />
            </svg> Export</a>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 mt-3">
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-striped" data-toggle="data-table">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>HP</th>
                <th>Email</th>
                <th>Referral</th>
                <th>Step</th>
              </tr>
            </thead>
            <tbody>
              @php
              $i = 1;
              @endphp
              @foreach ($leads as $row)
              <tr>
                <td class="text-center">{{ $i }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->phone }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->referral }}</td>
                <td class="text-center">{{ $row->step }}</td>
              </tr>
              @php
              $i++;
              @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection