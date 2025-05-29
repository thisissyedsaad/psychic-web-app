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
                            <h2 class="content-header-title float-left mb-0">Pages</h2>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
                    <div class="form-group breadcrum-right">
                        <a href="{{ route('pages.create') }}" class="btn btn-primary">
                            <i data-feather="plus"></i>
                            Add Page</a>
                    </div>
                </div>
            </div>

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
                                    <th>Title</th>
                                    <th>Date</th>
                                    {{-- <th>Slug</th>
                                    <th>Status</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pages as $page)
                                    <tr>
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->created_at }}</td>
                                        {{-- <td>{{ $page->slug }}</td>
                                        <td>
                                            <span class="badge badge-{{ $page->status === 'published' ? 'success' : 'warning' }}">
                                                {{ ucfirst($page->status) }}
                                            </span>
                                        </td> --}}
                                        <td>
                                            <a href="{{ route('pages.edit', $page) }}">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a id="page_delete_id:{{ $page->id }}:{{ $page->title }}"
                                                onclick="deleteModel(this.id)">
                                                <i data-feather="trash-2" style="color:red;"></i>
                                            </a>
                                            <a href="{{ url($page->slug) }}" target="_blank" title="View on site" >
                                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="vertical-align: middle;"><path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No pages found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $pages->links() }}
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
                    <h5 class="modal-title" id="myModalLabel120">Delete Page</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <form id="delete-page-form" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    function deleteModel(id) {
        id = id.split(":")[1];
        $("#danger").modal();
        var route = "{{ route('pages.destroy', ['page' => ':id']) }}";
        route = route.replace(':id', id);
        document.getElementById('delete-page-form').action = route;
    }
</script>
@endSection 