{{-- @extends('master')
@section('content') --}}
<div class="space50">&nbsp;</div>
    <div class="container beta-relative">
        <div class="pull-left">
            <h2>Them san pham</h2>
        </div>
    </div>
        <div class="container">
            <div className="d-flex flex-column text-center">
                <form action="post-products" method="post" encType="multipart/form-data">   
                    @csrf                    
                    <div className="form-group">
                        <label for="">Nhập tên sản phẩm</label>          
                        <input type="text" class="form-control" name = "name" value="" placeholder="Enter name" />
                    </div>
                    <div className="form-group">
                        <label for="">Nhập unit price</label>          
                        <input type="text" class="form-control" name = "unit_price" placeholder="Enter unit_price" />
                    </div>
                    <div className="form-group">
                        <label for="">Nhập mô tả</label>          
                        <input type="textarea" class="form-control" name = "description" value=""  placeholder="Enter description" />
                    </div>
                   
                    <div className="form-group">
                        <label for="">Nhập giá khuyến mãi</label>          
                        <input type="number" class="form-control" name = "promotion_price" value=""  placeholder="Enter promotion_price"/>
                    </div>   
                    <div className="form-group">
                        <label for="">Nhập Unit</label>          
                        <input type="text" class="form-control" name = "unit" value=""  placeholder="Enter  unit"/>
                    </div> 
                    <div className="form-group">
                        <label for="">Nhập New</label>
                        <input type="number" class="form-control" name = "new" value=""  placeholder="Enter new"/>
                    </div> 
                    <div className="form-group">
                        <label for="">Chọn loại sản phẩm</label>                      
                        <select  name="id_type" form="carform" className="form-group">
                            @foreach ($types as $item)
                                <option value="{{$item->name}}" name="id_type">{{$item->name}}</option>
                            @endforeach   
                        </select>                          
                    </div>                    
                    <div className="form-group">
                        <input type="file" class="form-control-file" name = "image" value=""  />
                    </div>                               
                <button type="submit"  className="btn btn-info btn-block btn-round" >Post Drink</button>
                    </form>                 
                </div>  
    </div>
{{-- @endsection --}}