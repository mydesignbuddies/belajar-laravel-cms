@extends('layouts.masterAdmin')
@section('title', 'input News')
@section('container')
<div class="container">
    <h3 class="text-center mt-3">Form Input News</h3>
    <hr>
    <!-- Form untuk Input -->
    <form action="/store/" method="POST">
        @csrf
        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">

        <div class="form-group row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" id="inputTitle" class="form-control" placeholder="Type your Title" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputArticle" class="col-sm-2 col-form-label">Name Article</label>
            <div class="col-sm-10">
                <input type="text" name="article" id="inputArticle2" class="form-control" placeholder="Type your Article" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select name="category_id" class="form-control category" required>
                    <option value="">-Select Category-</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group-row">
            <div class="col-sm-12">
                <input type="submit" value="SAVE" class="btn btn-primary btn-block" name="submit">
            </div>
        </div>
    </form>
    <br>
    <table class="table">
        <thead class="thead-dark">
            <th>ID</th>
            <th>TITLE</th>
            <th>CONTENT</th>
            <th>CATEGORY</th>
            <th>ACTION</th>
        </thead>
        <tbody>
            @foreach($articles as $key=>$article)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->article}}</td>
                <td>{{$category->title}}</td>

                <td>
                    <!-- Tombol -->
                    <div class="btn-group">
                        <a href="/delete/{{$article->id}}" class="fa fa-trash btn btn-danger btn-delete" onclick="return confirm('Are you sure?')"></a>
                        <a href="/update/{{$article->id}}" class="fa fa-edit btn btn-dark btn-edit"></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="editGuest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Guest</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Untuk ke Proses Update -->
            <div class="modal-body">
                <form action="/update" method="POST">
                    @csrf
                    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">

                    <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="inputTitle" class="form-control" placeholder="Type your Title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputArticle" class="col-sm-2 col-form-label">Name Article</label>
                        <div class="col-sm-10">
                            <input type="text" name="article" id="inputArticle2" class="form-control" placeholder="Type your Article" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category_id" class="form-control category" required>
                                <option value="">-Select Category-</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
@endsection()

<!-- @section('ownJavascript')
<script>
    $(document).ready(function() {
        $('#editGuest').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);

            var id = button.data('id');
            var name = button.data('name');
            var email = button.data('email');
            var address = button.data('address');

            var modal = $(this);

            modal.find('.modal-body .id').val(id);
            modal.find('.modal-body .name').val(name);
            modal.find('.modal-body .email').val(email);
            modal.find('.modal-body .address').val(address);
        })
    });
</script>
@endsection() -->