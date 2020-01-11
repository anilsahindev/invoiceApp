@if ($crud->hasAccess('download'))
    <a href="{{ url($crud->route.'/'.$entry->getKey().'/download') }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a>
@endif
