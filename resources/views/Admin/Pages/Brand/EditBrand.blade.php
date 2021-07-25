@extends ('Admin.master') 
@section('EditBrand') 
    <div class="row">
        <div class="col-xl-4 offset-xl-4">
            @if(Session::get('success'))
                <p style="padding-left: 120px; color: #c00606;">{{Session::get('success')}}</p>
            @endif
            <form method="POST">
                @csrf
                <h4 style="margin-bottom: 20px;">Create Brand</h4>
                <div class="form-group mr-20">
                    <p>Name</p>
                    <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" placeholder="Name" name="name" value="{{$Brand->name}}">
                    @error('name')
                        <small class="form-text" style="color: red">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group mr-20">
                    <p>Slug</p>
                    <input type="text" class="form-control" id="convert_slug" placeholder="Slug" name="slug" value="{{$Brand->slug}}">
                </div>
                <div class="form-group">
                    <p>Status</p>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="1" 
                                @if ($Brand->status == 1)
                                    checked
                                @endif> Hiện 
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="2" 
                                @if ($Brand->status == 2)
                                    checked
                                @endif>Ẩn
                        </label>
                    </div>
                </div>
                <button name="submit" type="submit" style="margin-top: 10px;" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
@stop