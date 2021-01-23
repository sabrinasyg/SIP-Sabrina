@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="pull-left">
                    <h2>Manage User</h2>
                </div>
                <div class="pull-right">
                    <a href="{{ route('user.export') }}" class="btn btn-sm btn-primary">Export to Excel</a>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#import">Import from Excel</button>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm delete_all" data-url="{{ url('user/DeleteAll') }}">Delete All Selected</button>
                    <a class="btn btn-sm btn-success" href="{{ route('user.create') }}"> Create New User</a>
                </div>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="row" style="margin: 10px;">
        <div class="col-md-4">
            <label>Grade</label>
            <select name="grade" id="filter-grade" class="form-control filter">
                <option value="">-Select-</option>
                <option value="Kelas 10">Kelas 10</option>
                <option value="Kelas 11">Kelas 11</option>
                <option value="Kelas 12">Kelas 12</option>
            </select>
        </div>
    </div>
    <div class="divider"></div>

    <table class="table table-striped table-light">
        <tr>
            <th><input type="checkbox" id="master"></th>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Grade</th>
            <th>Department</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @if($user->count())
        @foreach ($user as $user)
        <tr id="tr_{{$user->id}}">
            <td><input type="checkbox" class="sub_chk" data-id="{{$user->id}}"></td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->grade }}</td>
            <td>{{ $user->department }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}</label>
                @endforeach
                @endif
            </td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('user.show',$user->id) }}">Show</a>
                <a class="btn btn-success btn-sm" href="{{ route('user.edit',$user->id) }}">Edit</a>
                <form action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </table>
</div>

<script type="text/javascript">
    let user = $("#filter-grade").val()

    $(document).ready(function() {
        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });

        $('.delete_all').on('click', function(e) {
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });
            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {
                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {
                    var join_selected_values = allVals.join(",");
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });
                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });

        $('[data-toggle=confirm]').confirm({
            rootSelector: '[data-toggle=confirm]',
            onConfirm: function(event, element) {
                element.trigger('confirm');
            }
        });
        $(document).on('confirm', function(e) {
            var ele = e.target;
            e.preventDefault();
            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function(data) {
                    alert(data.responseText);
                }
            });
            return false;
        });
    });

    $(".filter").on('change', function() {
        user = $("#filter-grade").val()
        table.ajax.reload(null, false)
    });
</script>

<!-- modal -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">IMPORT</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endsection