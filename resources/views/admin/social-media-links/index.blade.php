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
                            <h2 class="content-header-title float-left mb-0">Social Media Links</h2>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
                    <div class="form-group breadcrum-right">
                        <a href="{{ route('social-media-links.create') }}" class="btn btn-primary">
                            <i data-feather="plus"></i>
                            Add Social Media Link</a>
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
                                    <th>Social Site</th>
                                    <th>Logo</th>
                                    <th>URL Prefix</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($socialMediaLinks as $socialMediaLink)
                                    <tr>
                                        <td>{{ $socialMediaLink->social_site }}</td>
                                        <td>
                                            @if($socialMediaLink->logo)
                                                <img src="{{ Storage::url($socialMediaLink->logo) }}" 
                                                    alt="{{ $socialMediaLink->social_site }}"
                                                    class="img-thumbnail" style="max-height: 50px;">
                                            @else
                                                <span class="text-muted">No logo</span>
                                            @endif
                                        </td>
                                        <td>{{ $socialMediaLink->url_prefix }}</td>
                                        <td>
                                            <a href="{{ route('social-media-links.edit', $socialMediaLink) }}">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a id="social_media_link_delete_id:{{ $socialMediaLink->id }}:{{ $socialMediaLink->social_site }}"
                                                onclick="deleteModel(this.id)">
                                                <i data-feather="trash-2" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No social media links found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $socialMediaLinks->links() }}
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
                    <h5 class="modal-title" id="myModalLabel120">Delete Social Media Link</h5>
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
@endsection

@section('scripts')
<script type="text/javascript">
    function deleteModel(id) {
        id = id.split(":")[1];
        $("#danger").modal();
        var route = "{{ route('social-media-links.destroy', ['social_media_link' => ':id']) }}";
        route = route.replace(':id', id);
        document.getElementById('delete-user-form').action = route;
    }
</script>
@endSection 