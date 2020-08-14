<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('balances.create') }}" >
                <button>New Project</button>
            </a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-hover">
    <thead class="text-primary">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone No</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach ($balances as $project)
    <tbody class="table-striped">
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->phone_no }}</td>
            <td>{{ $project->balance }}</td>
            <td>{{ $project->created_at->format('d/m/Y') }}</td>
            <td>
                <form action="{{ route('balances.destroy',$project->id) }}" method="POST">
                    <a class="fas fa-eye fa-lg text-warning mr-1" href="{{ route('balances.show',$project->id) }}"></a>
                    <a class="fas fa-edit fa-lg text-primary mr-1" data-toggle="modal" data-target="#editModal"></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="fa fa-trash fa-lg text-danger" style="border: none; background-color:transparent;"></button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>

<a class="btn btn-default btn-flat btn-sm" data-custom='open_modal' href="">
    <i class="fa fa-fw fa-pencil"></i>
</a>

{!! $balances->links() !!}