<?php //dd($suppliers[0]); ?>

@extends('layouts.main',['label'=>'Data suppliers'])
  
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Supplier</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-body">
            <div class="table-responsive">
              <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  
                  <div class="col-sm-12 col-md-4">
                    <a   href="{{ route('supplier.create') }}"class="btn mt-2 btn-login w-75 btn-success">Tambah supplier</a>
                  </div>
                  <div class="col-sm-12 col-md-8 d-flex justify-content-end">
                    <div id="dataTable_filter" class="dataTables_filter mr-3">
                      <form action="/supplier">
                        <label>
                          Search:
                          <input type="search" name="search" value="{{ request('search') }}"class="form-control form-control-sm" placeholder=""
                          aria-controls="dataTable">
                        </label>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                      <thead>
                        <tr role="row">
                          <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                          rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                          style="width: 57px;">
                          Kode supplier
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                          colspan="1" aria-label="Position: activate to sort column ascending" style="width: 61px;">
                          Nama supplier
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                          colspan="1" aria-label="Office: activate to sort column ascending" style="width: 49px;">
                         Alamat 
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                          colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">
                          AKSI
                          </th>
                           
                        </tr>
                      </thead>
                    
                      <tbody>
                        @foreach ($suppliers as $supplier)
                        <tr class="odd">
                          <td class="sorting_1">
                            {{ $supplier->kode_supplier  }}
                          </td>
                          <td>
                            {{ $supplier->nama_supplier }}
                          </td>
                          <td>
                            {{ $supplier->alamat }}

                          </td>
                          <td class=" ">
                              <a href="{{ route('supplier.edit', $supplier->id) }}" data-bs-toggle="tooltip" title="Edit" class="p-2"><i class="fa fa-edit text-primary "></i>
                                </a>
                                <a href="#"  data-id="{{ $supplier->id }}"   data-toggle="modal" data-target="#deleteModal" title="Hapus"
                                    class="p-2 tombolHapus"><i class="fa fa-trash text-danger"></i>
                                </a>
                          </td>
                          {{-- class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal" --}}
                        </tr>
                         
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row justify-content-between">
                  <div class="col-sm-12 col-md-5 mb-3">
                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                      Showing {{ $suppliers->firstItem() }}  to {{ $suppliers->lastItem() }}  of  {{ $suppliers->total() }}  entries
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-5 d-flex justify-content-end mb-3">
                    {{ $suppliers->links() }}

                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>

</div>
{{-- modal --}}
{{-- @php 
  dd($supplier->id);
@endphp --}}
@component('components.modal',['label'=>'Apakah kamu yakin ingin menghapus data ini?',"id"=>"deleteModal"])

<form action="/hapus-supplier" method="post">
  @csrf
  <input type="hidden"name="id" id="inputID" >
   <button type="submit" class="btn btn-primary">Yakin</button>
   
</form>
@endcomponent

@endsection

@push('script')
    <script>
      $(document).ready(function() {
          $('.tombolHapus').click(function() {
              $('#inputID').val($(this).data('id'));
          })
      });
        
    </script>
@endpush