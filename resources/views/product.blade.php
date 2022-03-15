@extends('layouts.master')
@section('headerName', 'Product Catalog')
@section('content')

    @livewire('product-catalog', ['id_mainCategory' => $id, 'id_subCategory' => $id_sub])

@endsection