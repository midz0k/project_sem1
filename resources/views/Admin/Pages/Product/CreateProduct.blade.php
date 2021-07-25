@extends ('Admin.master') 
@section('CreateProduct') 
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-xl-8 offset-xl-2">
            <form method="POST" action="{{route('CreateProducts')}}" enctype="multipart/form-data">
                @csrf
                <h2 style="margin-bottom: 20px;">Create Product</h2>
                <div class="row">
                    <div  class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>Name</p>
                            <input type="text" class="form-control"  id="slug" onkeyup="ChangeToSlug();" placeholder="Name" name="name" value="{{old('name')}}">
                            @error('name')
                                <small class="form-text" style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div  class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>Slug</p>
                            <input type="text" class="form-control" id="convert_slug" placeholder="Slug" name="slug" value="{{old('slug')}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>origin</p>
                            <input type="text" class="form-control" id="" placeholder="Origin" name="origin" value="{{old('origin')}}">
                            @error('origin')
                            <small class="form-text" style="color: red">{{$message}}</small>
                        @enderror
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>weight</p>
                            <input type="text" class="form-control" id="" placeholder="Weight" name="weight" value="{{old('weight')}}">
                            @error('weight')
                            <small class="form-text" style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
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
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>Brand_Id</p>
                            <select name="brand_id" class="form-control" required="required">
                                <option>Chọn Nhãn Hiệu</option>
                                @foreach ($Brand as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach 
                            </select>
                            @error('brand_id')
                                <small class="form-text" style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>Price</p>
                            <input type="text" class="form-control" id="" placeholder="Price" name="price" value="{{old('price')}}">
                            @error('price')
                                <small class="form-text" style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <p>Sale_Price</p>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="sale_price" value="1">Có
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="sale_price" value="0" checked>Không
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>Image</p>
                            <div class="custom-file mb-3 form-group">
                                <input type="file" class="custom-file-input" id="customFile" value="{{old('file')}}" name="file">
                                <label class="custom-file-label" for="customFile">Choose file</label>   
                                @error('file')
                                    <small class="form-text" style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <script>
                            $(".custom-file-input").on("change", function() {
                                var fileName = $(this).val().split("\\").pop();
                                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                            });
                        </script>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>Promotion_id</p>
                            <select name="promotion_id" class="form-control" id="exampleFormControlSelect1">
                                <option></option>
                                @foreach ($Promotion as $value)
                                    <option value="{{$value->id}}">{{$value->detail1}}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p>Color</p>
                    @foreach ($Color as $value)
                        <div class="form-check-inline" style="margin-right: 65px;">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="color[]" value="{{$value->id}}" id="{{$value -> slug}}"> {{$value->name}}
                                <div id="{{$value -> id}}" style="display: none;">
                                    <input type="file" value="{{old('fulecolors[]')}}" multiple name="fules[]" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </label>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $('#{{$value -> slug}}').click(function(){
                                    $('#{{$value -> id}}').toggle();
                                })
                            })
                        </script>
                    @endforeach
                    @error('color')
                        <small class="form-text" style="color: red">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <p>Status</p>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="1" checked >Hiện 
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="2" >Ẩn
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <p>Description</p>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" value="{{old('description')}}"  name="description"></textarea>
                    @error('description')
                            <small class="form-text" style="color: red">{{$message}}</small>
                    @enderror
                </div>
                <button name="submit" type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
@stop

@section('script') 
{{-- ///////////////// --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    
    $('#input_cate').change(function(){
        var selectedVal = $("#input_cate option:selected").val();
        var route = '{{route("Brands_Category")}}';
       
        $.ajax({
               type:'GET',
               dataType: 'json',
               url: route,
               data:{category:selectedVal},
               success:function(data) {
                   console.log(data);
                //   $("#msg").html(data.msg);
                var html = '';

                for(let i = 0; i<data.length; i++) {
                    html+= `<option  value="${data[i].id}">${data[i].name}</option>`;
                }
                    $('#hung').html(html);
                        console.log(html);
                },
                error: function (data) {
                console.log(data);
                console.log("loi");
            }
        });
    });
</script>
@stop