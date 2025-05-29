@extends('admin.layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Psychic Services</h2>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
                    <div class="form-group breadcrum-right">
                        <a href="{{ route('psychic-services.create') }}" class="btn btn-primary">
                            <i data-feather="plus"></i>
                            Add Psychic Service</a>
                    </div>
                </div>
            </div>

            <div class="content-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <div class="alert-body">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Psychic Service</th>
                                        <th>Logo</th>
                                        {{-- <th>Meta Title</th>
                                        <th>Meta Description</th>
                                        <th>Meta Keywords</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->service }}</td>
                                            <td>
                                                @if($service->logo)
                                                    <img src="{{ Storage::url($service->logo) }}" alt="{{ $service->service }}"
                                                        class="img-thumbnail" style="max-height: 50px;">
                                                @else
                                                    <span class="text-muted">No logo</span>
                                                @endif
                                            </td>
                                            {{-- <td>{{ $service->meta_title }}</td>
                                            <td>{{ Str::limit($service->meta_description, 50) }}</td>
                                            <td>{{ $service->meta_keywords }}</td> --}}
                                            <td>
                                                <a
                                                    href="{{ route('psychic-services.edit', ['psychic_service' => $service->id]) }}">
                                                    <i data-feather="edit"></i>
                                                </a>
                                                <a id="psychic_service_delete_id:{{ $service->id }}:{{ $service->service }}"
                                                    onclick="deleteModel(this.id)">
                                                    <i data-feather="trash-2" style="color:red;"></i>
                                                </a>
                                                @if ($service->slug)
                                                     <a href="{{ route('psychic-service.show', [$service->slug]) }}" target="_blank" title="View on site" >
                                                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="vertical-align: middle;"><path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                                    </a>
                                                @else
                                                    <a href="{{ route('psychic-services') }}" target="_blank" title="View on site" >
                                                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="vertical-align: middle;"><path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade modal-danger text-left" id="danger" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel120" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel120">Delete Psychic Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete?
                    </div>
                    <form id="delete-user-form" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    function deleteModel(id) {
        id = id.split(":")[1];
        $("#danger").modal();
        var route = "{{ route('psychic-services.destroy', ['psychic_service' => ':id']) }}";
        route = route.replace(':id', id);
        document.getElementById('delete-user-form').action = route;
    }
</script>
@endSection