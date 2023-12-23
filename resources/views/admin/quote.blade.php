@extends('admin.layout.main')
@section('title', env('APP_NAME').' | Quote'  )
@section('content')
    <div class="row justify-content-center">

        <div class="col-lg-10">
            <div class="card">
                <div class="card-title pr">
                    <h4>All Quotes</h4>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                {{-- <div class="card-title text-right">
                    <a href="{{ route('artworks.create') }}" class="btn btn-sm btn-success">Add Comment</a>

                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                                <tr>
                                    <th>SN.</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Description</th>
                                    <th>Quote By</th>
                                    <th>Quote To</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quotes as $quote)
                             
                                    <tr>
                                        <td>#</td>
                                        <td>
                                            {{ $quote->color }}
                                            
                                        </td>
                                        <td>
                                            {{ $quote->size }}
                                            
                                        </td>
                                        <td>
                                            {{ $quote->description }}
                                            
                                        </td>
                                        <td>
                                            {{ $quote->normalUser->name }}
                                            
                                        </td>

                                        <td>
                                            {{ $quote->artist->name }}
                                            
                                        </td>
                                       
                                       
                                        
                                        {{-- <td><span id="status-btn{{ $comment->id }}">
                                            <button class="btn btn-sm {{ $comment->status == 'Available' ? 'btn-success' : ($comment->status == 'Inactive' ? 'bg-danger' : 'bg-warning'); }}"  onclick="changeStatus('{{ $comment->id }}', {{ $comment->id}})" >
                                                {{ $comment->status }}
                                            </button>
                                        </span>
                                        </td> --}}
                                        <td>
                                          
                                            
                                            <form method="POST"
                                                action="{{ route('quote.delete', encrypt($quote->id)) }}"
                                                class="action-icon">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger  delete-icon show_confirm"
                                                    data-toggle="tooltip" title='Delete'>
                                                    <i class="ti-trash"></i>
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
        </div>

    </div>
@endsection

@section('script')
    <script>
        function changeStatus(slug, id) {
            $.ajax({
                type: "POST",
                url: "#",
                data: {
                    'service_slug': slug,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.status) {
                        $("#status-btn"+ id).load(window.location.href + " #status-btn"+ id);
                        swal('Status updated');
                    }else {
                        swal('Some Error occur, relode the page');
                    }
                }
            });
        }
    </script>
@endsection
