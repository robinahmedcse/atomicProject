

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead >
                        <tr align="center" >
                            <th class="table-secondary"  >Serial</th>
                            <th class="table-success">Title</th>
                            <th class="table-success">Name</th>
                            <th class="table-danger">Action</th>
                        </tr>
                    <thead>
                    <tbody>
                        @foreach($all_data as $data)
                        <tr align="center" >
                            <th scope="row">{{$data->title_id}}</th>
                            <th scope="row">{{$data->title}}</th>
                            <td>{{$data->name}}</td>
                            <td>
                                <a href="{{url('/book/title/edit/'.$data->title_id)}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit">Edit</span>
                                </a> 

                                <a href="{{url('/book/title/delete/'.$data->title_id)}}" class="btn btn-danger"  onclick="return one_delete();">
                                    <span class="glyphicon glyphicon-trash">Delete</span>
                                </a>
                            </td>

                        </tr>
                        @endforeach


                    </tbody>


                </table>
                {!!  $all_data->links()  !!}
                </div>
           