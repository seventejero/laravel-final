<x-app-layout>
            
    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">{{__('Dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{ __('Resource') }}</li>
                <li class="breadcrumb-item active">{{ __('Post') }}</li>
                
            </ol>
        </nav>
    </div>
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
                        <div class="text-end p-2">
                            <a href="{{ route('post.create') }}"  type="button" class="btn btn-outline-primary" ><i class="bi bi-file-earmark-plus-fill me-1  "></i> Add a New Options</a> 
                        </div>
                        <hr class="my-5">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Status</th>   
                                    <th style="text-align:center;" scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($posts)
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post -> subject}}</td>
                                            <td>{{$post -> post}}</td>
                                            <td><span class="badge bg-{{ $post->status == 1 ? 'success' : 'warning' }} status-badge">{{ $post->status == 1 ? 'Published' : 'Unpublished' }}</span></td>
                                            <style>
                                                .status-badge {
                                                    padding: 5px 10px; /* Adjust padding as needed */
                                                    border-radius: 8px; /* Adjust border-radius as needed */
                                                    font-size: 14px; /* Adjust font size as needed */
                                                    text-transform: capitalize; /* Capitalize the status text */
                                                }
                                            </style>
                                            <td style="text-align:center;">
                                            <a href="{{ route('post.show', $post) }}" class="btn btn-outline-secondary m-1" fdprocessedid="sh46d8"><i class="bi bi-folder-symlink"> Show Post</i></a>
                                            <a href="{{ route('post.edit', $post) }}" type="button" class="btn btn-outline-success m-1 " fdprocessedid="sh46d8"><i class="bi bi-pencil-square"></i> Edit Post</a>
                                            <form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy', $post->id) }}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-danger m-1" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-post-id="{{ $post->id }}"><i class="bi bi-trash-fill"></i> Delete Post</button>
                                                </form>
                                                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this post? This action cannot be undone.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary m-1" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-outline-danger m-1" id="confirmDeleteButton">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var confirmDeleteModal = document.getElementById('confirmDeleteModal');
                                                        var confirmDeleteButton = document.getElementById('confirmDeleteButton');
                                                        var formToSubmit;

                                                        confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
                                                            var button = event.relatedTarget; 
                                                            var postId = button.getAttribute('data-post-id'); 
                                                            formToSubmit = document.getElementById('delete-form-' + postId); 
                                                        });

                                                        confirmDeleteButton.addEventListener('click', function() {
                                                            formToSubmit.submit();
                                                        });
                                                    });
                                                </script>
                                            </td>                  
                                        </tr>
                                    @endforeach   
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
