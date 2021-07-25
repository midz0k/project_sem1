@extends ('Admin.master') 
@section('EditProduct') 
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-xl-8 offset-xl-2">
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <h2 style="margin-bottom: 20px;">Create Product</h2>
                <div class="row">
                    <div  class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>Name</p>
                            <input type="text" class="form-control"  id="slug" onkeyup="ChangeToSlug();" placeholder="Name" name="name" value="{{$Product->name}}">
                            @error('name')
                                <small class="form-text" style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div  class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>Slug</p>
                            <input type="text" class="form-control" id="convert_slug" placeholder="Slug" name="slug" value="{{$Product->slug}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>Origin</p>
                            <input type="text" class="form-control" id="" placeholder="Origin" name="origin" value="{{$Product->origin}}">
                            @error('origin')
                                <small class="form-text" style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group mr-20">
                            <p>Weight</p>
                            <input type="text" class="form-control" id="" placeholder="Weight" name="weight" value="{{$Product->weight}}">
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
                                    <option value="{{$value->id}}" {{$value->id == $Product->category_id ? 'selected' : ''}}>{{$value->name}}</option>
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
                            <select name="brand_id" class="form-control" id="hung" required="required">
                                <option>Chọn Nhãn Hiệu</option>
                                @foreach ($Brand as $value)
                                    <option value="{{$value->id}}"  {{$value->id == $Product->brand_id ? 'selected' : ''}}>{{$value->name}}</option>
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
                            <input type="text" class="form-control" id="" placeholder="Price" name="price" value="{{$Product->price}}">
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
                                    <input type="radio" class="form-check-input" name="sale_price" value="1"
                                    @if ($Product->status > 0)
                                        checked
                                    @endif
                                    >Có
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="sale_price" value="0"
                                    @if ($Product->status < 1)
                                        checked
                                    @endif
                                    >Không
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
                            </div>
                            <img class="img-thumbnail" style="width: 150px;" src="{{url('uploads')}}/{{$Product -> image}}" alt="">
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
                                    <option value="{{$value->id}}" {{$value->id == $Product->promotion_id ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach 
                            </select>
                            @error('promotion_id')
                                <small class="form-text" style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <p>Color</p>
                    </div>
                    @foreach ($Color as $key => $value)
                    <div class="col-xl-6">
                        <div class="form-group mr-20">
                            <div class="form-check-inline" style="margin-right: 65px;">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="color[]" value="{{$value->id}}" id="{{$value -> slug}}" {{(in_array($value->id,$col))?'checked':''}}> {{$value->name}}
                                    <div id="{{$value -> id}}" style="display:{{(in_array($value->id,$col))?'':'none'}};">
                                        <input type="file" value="{{old('fulecolors[]')}}" multiple name="fules[]" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                
                                    @if (in_array($value->id,$col))
                                       @foreach ($images as $data)
                                            @if ($value->id == $data->color_id)
                                                <p>Sản Phẩm Màu {{$value->name}}</p>
                                                <img class="img-thumbnail" style="width: 150px;" src="{{url('uploads')}}/{{$data->image}}" alt="">
                                            @endif
                                       @endforeach
                                    @else
                                        
                                    @endif
                                </label>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#{{$value -> slug}}').click(function(){
                                        $('#{{$value -> id}}').toggle();
                                    })
                                })
                            </script>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <p>Status</p>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="1"  
                            @if ($Product->status == 1)
                                checked
                            @endif
                            >Hiện 
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="2" 
                            @if ($Product->status == 2)
                                checked
                            @endif
                            >Ẩn
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <p>Description</p>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" value="{{old('description')}}"  name="description">{{$Product->description}}</textarea>
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