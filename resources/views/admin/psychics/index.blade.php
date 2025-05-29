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
                            <h2 class="content-header-title float-left mb-0">Psychics</h2>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
                    <div class="form-group breadcrum-right">
                        <a href="{{ route('psychics.create') }}" class="btn btn-primary">
                            <i data-feather="plus"></i>
                            Add Psychic</a>
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

            <div class="content-body">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Psychics</th>
                                        <th>Main Photo</th>
                                        <th>Email</th>
                                        <th>Date Added</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($psychics as $psychic)
                                        <tr>
                                            <td>{{ $psychic->full_name }}</td>
                                            <td>
                                                @if($psychic->profile_photo)
                                                    <img src="{{ Storage::url($psychic->profile_photo) }}" 
                                                        alt="{{ $psychic->full_name }}"
                                                        class="img-thumbnail" style="max-height: 50px;">
                                                @else
                                                    <span class="text-muted">No photo</span>
                                                @endif
                                            </td>
                                            <td>{{ $psychic->email }}</td>
                                            <td>{{ $psychic->created_at }}</td>
                                            <td>
                                                    <a href="{{ route('psychics.edit', $psychic) }}" >
                                                        <i data-feather="edit-2"></i>
                                                    </a>
                                                    <a id="psychic_delete_id:{{ $psychic->id }}:{{ $psychic->profile_name }}"
                                                        onclick="deleteModel(this.id)" style="cursor: pointer;">
                                                        <i data-feather="trash-2" style="color:red;"></i>
                                                    </a>
                                                    @if ($psychic->slug)
                                                    <a href="{{ route('psychic.show', $psychic->slug) }}" target="_blank" title="View on site" >
                                                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="vertical-align: middle;"><path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                                    </a>    
                                                    @else
                                                      <a href="{{ route('psychics') }}" target="_blank" title="View on site" >
                                                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="vertical-align: middle;"><path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                                    </a>   
                                                    @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No psychics found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $psychics->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade modal-danger" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this psychic?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function deleteModel(clicked_id) {
        var model_id = clicked_id.split(":");
        var psychicId = model_id[1];
        var psychicName = model_id[2];
        
        const modal = $('#deleteModal');
        const form = $('#deleteForm');
        form.attr('action', '/admin/psychics/' + psychicId);
        modal.find('.modal-body').text(`Are you sure you want to delete psychic "${psychicName}"?`);
        modal.modal('show');
    }
</script>
@endsection 