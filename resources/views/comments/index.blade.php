<x-app-layout>
    <div class="pagetitle">
        <h1>{{ __('Post Page') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Resource') }}</li>
                <li class="breadcrumb-item active">{{ __('Post Page') }}</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('message'))
                    <div id="autoDismissAlert" class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            setTimeout(function() {
                                var alertElement = document.getElementById('autoDismissAlert');
                                if (alertElement) {
                                    var alert = new bootstrap.Alert(alertElement);
                                    alert.close();
                                }
                            }, 5000);
                        });
                    </script>
                @endif
                <div class="card p-5">
                    <div class="card-body">
                        <hr class="my-10">
                        <h2 class="card-title">All Comments</h2>
                        <table class="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Comment</th>
                                    <th scope="col">From</th>
                                    <th scope="col">Status</th>
                                    <th style="text-align:center;" scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->comment }}</td>
                                        <td>{{ optional(optional($comment->post)->user)->name ?? 'user' }}</td>
                                        <td>{{ $comment->status ? 'Approved' : 'Pending' }}</td>
                                        <td style="text-align:center;">
                                            @if(auth()->id() !== optional($comment->post)->user_id)
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="approve" data-id="{{ $comment->id }}">Approve</button>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="disapprove" data-id="{{ $comment->id }}">Disapprove</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="delete" data-id="{{ $comment->id }}">Delete</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Action Modal -->
    <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="actionModalLabel">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    Are you sure you want to <span id="action-type"></span> this comment?
                </div>
                <div class="modal-footer">
                    <form id="actionForm" method="post">
                        @csrf
                        <input type="hidden" name="_method" id="method">
                        <button type="submit" class="btn" id="confirm-button"></button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var actionModal = document.getElementById('actionModal');
            actionModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var action = button.getAttribute('data-action');
                var id = button.getAttribute('data-id');
                var modalTitle = actionModal.querySelector('.modal-title');
                var modalBody = actionModal.querySelector('#modal-body');
                var actionType = actionModal.querySelector('#action-type');
                var confirmButton = actionModal.querySelector('#confirm-button');
                var form = actionModal.querySelector('#actionForm');
                var method = actionModal.querySelector('#method');

                actionType.textContent = action;
                confirmButton.textContent = 'Yes, ' + action.charAt(0).toUpperCase() + action.slice(1);
                
                if (action === 'approve') {
                    confirmButton.className = 'btn btn-success';
                    form.action = '/comments/' + id + '/approve';
                    method.value = 'PATCH';
                } else if (action === 'disapprove') {
                    confirmButton.className = 'btn btn-warning';
                    form.action = '/comments/' + id + '/disapprove';
                    method.value = 'PATCH';
                } else if (action === 'delete') {
                    confirmButton.className = 'btn btn-danger';
                    form.action = '/comments/' + id + '/destroy';
                    method.value = 'DELETE';
                }
            });
        });
    </script>
</x-app-layout>
