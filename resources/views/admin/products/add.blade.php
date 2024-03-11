@extends('admin.layouts.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Sản phẩm
                        <small>Thêm</small>
                    </h1>
                    @if (count($errors))
                        <div class="alert alert-danger">
                            @foreach ($errors as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" placeholder="Please Enter Title" />
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="description" placeholder="Please Enter Description" />
                        </div>
                        <div class="form-group">
                            <label>New post</label>
                            <input type="checkbox" class="check-control" name="new_post" />
                        </div>
                        <div class="form-group">
                            <label>Highlight post</label>
                            <input type="checkbox" class="check-control" name="highlight_post" />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="content" name="content" class="ckeditor"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Post Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
