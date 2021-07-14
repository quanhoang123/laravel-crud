@extends('Admins.index')
@section('content')   
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables HIHI</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item "><a href="admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>               
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Hihi
            </div>
            <div class="card-body">
                <span scope="col"><a href="add-products" class="btn btn-primary">add</a></span>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">ID </th>
                            <th scope="col">Image </th>
                            <th scope="col">Name </th>
                            <th scope="col">Type </th>
                            <th scope="col">Description </th>
                            <th scope="col">Unit Price </th>
                            <th scope="col">Promotion Price </th>
                            <th scope="col">Unit </th>
                            <th scope="col">New</th>    
                            <th scope="col">Action</th>     
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">ID </th>
                            <th scope="col">Image </th>
                            <th scope="col">Name </th>
                            <th scope="col">Type </th>
                            <th scope="col">Description </th>
                            <th scope="col">Unit Price </th>
                            <th scope="col">Promotion Price </th>
                            <th scope="col">Unit </th>
                            <th scope="col">New</th>    
                            <th scope="col">Action</th>     
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($products as $sanpham)
                        <tr>
                            <th scope="col">{{$sanpham->id}}</th>
                            <td><img src="/public/image/product/{{$sanpham->image}}" height="200px" width="300px"/></td>
                            <td>{{$sanpham->name}}</td>
                            <td>{{$sanpham->id_type}}</td>
                            <td>{{$sanpham->description}}</td>
                            <td>{{$sanpham->unit_price}}</td>
                            <td>{{$sanpham->promotion_price}}</td>
                            <td>{{$sanpham->unit}}</td>
                            <td>{{$sanpham->new}}</td>
                            <td>
                                <form role="form" action="edited-products/{{$sanpham->id}}" method="get">
                                    @csrf
                                    <button class="btn btn-warning" name="edit" data-toggle="modal" data-target="#exampleModal">
                                        Editer  
                                    </button>
                                </form>
                                <form role="form" action="admin-delete/{{$sanpham->id}}" method="post">
                                    @csrf
                                    <button  class="btn btn-danger" name="delete">
                                        Delete
                                    </button>
                                </form>               
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</main>
@endsection
