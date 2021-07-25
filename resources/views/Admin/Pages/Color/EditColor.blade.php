@extends ('Admin.master') 
@section('EditColor') 
    <div class="row">
        <div class="col-xl-4 offset-xl-4">
            @if(Session::get('success'))
                <p style="padding-left: 120px; color: #c00606;">{{Session::get('success')}}</p>
            @endif
            <form method="POST">
                @csrf
                <h4 style="margin-bottom: 20px;">Create Color</h4>
                <div class="form-group mr-20">
                    <p>Name</p>
                    <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" placeholder="Name" name="name" value="{{$Color->name}}">
                    @error('name')
                        <small class="form-text" style="color: red">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group mr-20">
                    <p>Slug</p>
                    <input type="text" class="form-control" id="convert_slug" placeholder="Slug" name="slug" value="{{old('slug')}}">
                </div>
                <div class="form-group mr-20">
                    <p>Mã Màu</p>
                    <input type="color" class="form-control" id="" placeholder="Input field" name="code_color" value="{{$Color->code_color}}">  
                    @error('code_color')
                        <small class="form-text" style="color: red">{{$message}}</small>
                    @enderror         
                </div>
                <button name="submit" type="submit" style="margin-top: 10px;" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
@stop