@extends('layouts.app')

@section('content')
    <div class="backgroundSec">
        <div class="container p-5">
            <div class="boxShadow p-3 mb-5" style="min-height: max-content; border-radius: 20px; padding-left: 40px!important;">
                <div class="displayText2 d-flex justify-content-between align-items-center">
                    <span>Buat diskusi baru</span>
                    <span>
                        <button class="btn button1" data-toggle="modal" data-target="#discussionModal">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </span>
                </div>
            </div>
            {{--content forum--}}

            @foreach($discussions as $discussion)
                <a  href="{{ route('forumDetail') }}?id={{ $discussion->id }}" style="text-decoration: none; color: black">
                    <div class="boxShadow p-5 mb-5" style="min-height: max-content; border-radius: 20px;">
                        <div class="displayText1 py-4" style="font-size: 30px">{{ $discussion->title }}</div>
                        <div class="d-flex flex-row">
                            <div>
                                <div style="border-radius: 25%; background-color: grey; height: 50px; width: 50px; margin-left: 12px">
                                    <img src="{{ asset('/storage/profile-images') . $discussion->user->image }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" style="width: 100%; height: 100%; object-fit: cover">
                                </div>
                                <div class="centerItem" style="color:white; border-radius: 30%; background-color: lightseagreen; height: 30px; width: 30px; position: absolute; z-index: 1; margin-top:-20px">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>

                            <div class="d-flex flex-column px-3">
                                <div class="fw-bold displayText2">
                                    {{ $discussion->user->name }}
                                </div>
                                <div class="time-ago" style="color: grey">
                                    {{ $discussion->created_at }}
                                </div>
                            </div>
                        </div>
                        <div class="displayText2 py-4">
                            {{ $discussion->discussion_text }}
                        </div>

                        <hr>
                        <div>
                            <i class="fa-solid fa-comment" style="color: grey; margin-right: 10px"></i>{{ $discussion->discussionDetail->count() }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="discussionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambahkan Diskusi Baru</h5>


                    <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <form class="p-3" method="post" id="formInputDiscussion" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Judul Diskusi</label>
                            <input class="form-control" id="title" name="title" placeholder="Masukan Judul Diskusi">
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlTextarea1">Isi Diskusi</label>
                            <textarea class="form-control" id="discussion_text" name="discussion_text" placeholder="Masukan Isi Diskusi" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="formInputDiscussion" class="btn button1">Submit Diskusi Baru</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(e) {
            @auth()
                $('#formInputDiscussion').on('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('storeForum') }}",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            if(data.success) {
                                swal.fire({
                                    title: 'Diskusi Baru Berhasil Dibuat',
                                    text: data.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if(result.isConfirmed) {
                                        $('#discussionModal').modal('hide');
                                        location.reload();
                                    }
                                });
                            } else {
                                swal.fire({
                                    title: 'Diskusi Baru Gagal Dibuat',
                                    text: data.message,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if(result.isConfirmed) {
                                        $('#discussionModal').modal('hide');
                                    }
                                });
                            }
                        }
                    });
                });
            @endauth
        });
    </script>
@endsection
