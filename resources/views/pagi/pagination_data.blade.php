 
                <table class="table table-striped">
                    <thead>
                        <tr align="center" >
                            <th class="table-secondary"  >Serial</th>
                            <th class="table-success">Title</th>
                            <th class="table-success">Name</th>
                        
                        </tr>
                    <thead>
                    <tbody>
                        @foreach($all_data as $data)
                        <tr align="center" >
                            <th scope="row">{{$data->title_id}}</th>
                            <th scope="row">{{$data->title}}</th>
                            <td>{{$data->name}}</td>
                           
                        </tr>
                        @endforeach


                    </tbody>


                </table>
                {!!  $all_data->links()  !!}
         