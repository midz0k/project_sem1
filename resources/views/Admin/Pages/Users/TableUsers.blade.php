@extends ('Admin.master') @section('TableUsers')
    <div class="row">
        @if(Session::get('success'))
        <div class="alert alert-info ml-lg-auto" id="hide" style="width: 300px; margin-right: 118px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{Session::get('success')}}!</strong>
        </div>
        @endif
        <div class="col-xl-10 offset-xl-1">
            <div class="row">
                <div class="col-xl-2">
                    <form>
                        @csrf
                        <select class="form-control" name="sort" id="sort">
                            <option>---Lọc---</option>
                            <option value="{{Request::url()}}?sort_by=kytu_az">--A đến Z--</option>
                            <option value="{{Request::url()}}?sort_by=kytu_za">--Z đến A--</option>
                            <option value="{{Request::url()}}">--Không--</option>
                        </select>
                    </form>
                </div>
                <div class="col-xl-5 offset-xl-5">
                    <form class="form-inline" style="float: right;" method="get">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-10 offset-xl-1" style="margin-top: 20px">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-xl-1" scope="col">#</th>
                        <th class="col-xl-3" scope="col">Name</th>
                        <th class="col-xl-4" scope="col">Email</th>
                        <th class="col-xl-3" scope="col">Phone</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($User as $value)
                        <tr>
                            <th scope="row">{{$loop -> index +1}}</th>
                            <td scope="row">{{$value -> name}}</td>
                            <td scope="row">{{$value -> email}}</td>
                            <td scope="row">{{$value -> phone}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-xl-6 offset-xl-3">
                <div class="pagination" style="margin-left: 80px;">
                    @if (ceil($User->total()/8)>1)
                        <a href="#">«</a>
                        @for($i=1;$i<=ceil($User->total()/8);$i++)
                            <a class="page-item {{($i == $User->currentPage())?'active':''}}" href="?page={{$i}}">{{$i}}</a>
                        @endfor
                        <a href="#">»</a>
                    @else
                                        
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@section('Search')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
@stop