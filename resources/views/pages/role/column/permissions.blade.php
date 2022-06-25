@foreach($data->permissions as $permission)
    <span class="badge badge-info mb-1">{{ $permission->name }}</span>
@endforeach
