@extends ('Admin.master') 
@section('CreateBrand_Category') 
    <div class="row">
        <div class="col-xl-4 offset-xl-4">
            @if(Session::get('success'))
                <p style="padding-left: 120px; color: #c00606;">{{Session::get('success')}}</p>
            @endif
            <form method="POST" action="{{route('Create-Brand-Categorys')}}">
                @csrf
                <h4 style="margin-bottom: 20px;">Create Brand Category</h4>
                <div class="form-group mr-20">
                    <p>Brand_id</p>
                    <select name="brand_id" class="form-control" id="input_cate" required="required">
                        <option>Chọn Danh Mục</option>
                        @foreach ($Brand as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <small class="form-text" style="color: red">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group mr-20">
                    <p>Category_id</p>
                    <select name="category_id" class="form-control" id="input_cate" required="required">
                        <option>Chọn Danh Mục</option>
                        @foreach ($Category as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach 
                    </select>
                    @error('category_id')
                        <small class="form-text" style="color: red">{{$message}}</small>
                    @enderror
                </div>
                <button name="submit" type="submit" style="margin-top: 10px;" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
@stop