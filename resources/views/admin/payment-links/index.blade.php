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
                            <h2 class="content-header-title float-left mb-0">Payment Links</h2>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
                    <div class="form-group breadcrum-right">
                        <a href="{{ route('payment-links.create') }}" class="btn btn-primary">
                            <i data-feather="plus"></i>
                            Add Payment Link</a>
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
                                    <th>Payment Provider</th>
                                    <th>Logo</th>
                                    <th>URL Prefix</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($paymentLinks as $paymentLink)
                                    <tr>
                                        <td>{{ $paymentLink->payment_provider }}</td>
                                        <td>
                                            @if($paymentLink->logo)
                                                <img src="{{ Storage::url($paymentLink->logo) }}" 
                                                    alt="{{ $paymentLink->payment_provider }}"
                                                    class="img-thumbnail" style="max-height: 50px;">
                                            @else
                                                <span class="text-muted">No logo</span>
                                            @endif
                                        </td>
                                        <td>{{ $paymentLink->url_prefix }}</td>
                                        <td>
                                            <a href="{{ route('payment-links.edit', $paymentLink) }}">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a id="payment_link_delete_id:{{ $paymentLink->id }}:{{ $paymentLink->payment_provider }}"
                                                onclick="deleteModel(this.id)">
                                                <i data-feather="trash-2" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No payment links found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $paymentLinks->links() }}
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
                    <h5 class="modal-title" id="myModalLabel120">Delete Payment Link</h5>
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
        var route = "{{ route('payment-links.destroy', ['payment_link' => ':id']) }}";
        route = route.replace(':id', id);
        document.getElementById('delete-user-form').action = route;
    }
</script>
@endSection 