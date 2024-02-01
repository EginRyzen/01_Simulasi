@extends('front')

@section('content')
    <div class="container-fluid">

        <!-- Timelime example  -->
        @foreach ($galery as $item)
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"> {{ $item->created_at->diffForhumans() }} </span>
                                <img src="{{ asset('image/' . $item->foto) }}" height="500" class="mx-auto d-block py-5"
                                    alt="">

                                <h3 class="mx-5">{{ $item->judul }}</h3>
                                <div class="mx-5">
                                    {{ $item->deskripsi }}
                                </div>
                                <div class="mx-5 py-4">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#update{{ $item->id }}" data-aksi="update">Edit</a>
                                    <a href="{{ url('galery/' . $item->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakn Untuk Di Hapus??')">Delete</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- END timeline item -->
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="update{{ $item->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Image</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ url('galery/' . $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" value="{{ $item->judul }}" class="form-control"
                                            placeholder="Judul" name="judul" id="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->deskripsi }}"
                                            name="deskripsi" placeholder="Deskripsi" id="">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="foto" id="updateImage">
                                    </div>
                                    <div class="form-group">
                                        @if ($item->foto)
                                            <img src="{{ asset('image/' . $item->foto) }}"
                                                style="width:100%; width:150px; max-height:200px" id="previewUpdate">
                                        @else
                                            <img id="previewUpdate" style="width:100%; width:150px; max-height:200px"
                                                alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <!-- /.col -->
            </div>
        @endforeach
    </div>
    <!-- /.timeline -->
@endsection
