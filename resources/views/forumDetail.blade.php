@extends('layouts.app')

@section('content')
    <div class="backgroundSec">
        <div class="container p-5">
            <div class="boxShadow p-5 mb-5" style="min-height: max-content; border-radius: 20px;">
                <div class="displayText1 py-4" style="font-size: 30px">{{ $discussion->title }}</div>
                <div class="d-flex flex-row">
                    <div>
                        <div style="border-radius: 25%; background-color: grey; height: 50px; width: 50px; margin-left: 12px">
                            <img src="{{ asset('/storage/profile-images') . $discussion->user->image }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" style="border-radius: 25%; width: 100%; height: 100%; object-fit: cover">
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
                <div class="fw-bold displayText2">
                    Comments ({{ $discussion->discussionDetail->count() }})
                </div>

                {{--                comments--}}

                @foreach($discussion->discussionDetail as $discussionDetail)
                    <div class="d-flex flex-row mt-4">
                        <div>
                            <div style="border-radius: 25%; background-color: grey; height: 50px; width: 50px; margin-left: 12px">
                                <img src="{{ asset('/storage/profile-images') . $discussionDetail->user->image }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" style="border-radius: 25%; width: 100%; height: 100%; object-fit: cover">
                            </div>
                            <div class="centerItem" style="color:white; border-radius: 30%; background-color: lightseagreen; height: 30px; width: 30px; position: absolute; z-index: 1; margin-top:-20px">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>

                        <div class="d-flex flex-column px-3 w-100">
                            <div class="fw-bold displayText2">
                                {{ $discussionDetail->user->name }}
                            </div>
                            <div class="time-ago" style="color: grey">
                                {{ $discussionDetail->created_at }}
                            </div>


                            <div class="displayText2 mb-4">
                                {{ $discussionDetail->discussion_text }}
                            </div>


                            <hr>
                        </div>
                    </div>
                @endforeach

                <div class="d-flex flex-row mt-4">
                    <div >
                        <div style="border-radius: 25%; background-color: grey; height: 50px; width: 50px; margin-left: 12px">
                        </div>
                        <div class="centerItem" style="color:white; border-radius: 30%; background-color: lightseagreen; height: 30px; width: 30px; position: absolute; z-index: 1; margin-top:-20px">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>

                    <div class="w-100 px-3">
                        <form class="p-3" method="post" id="formInputComment" enctype="multipart/form-data">
                            @csrf
                            <textarea id="discussion_text" name="discussion_text" class="w-100 form-control displayText2" value="" rows="4" placeholder="Write your thoughts here..." style="background-color: white"></textarea>
                            <div class="py-3 flexEnd">
                                <button type="submit" form="formInputComment" class="btn button1">Submit Komen Baru</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(e) {
            @auth()
            $('#formInputComment').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append('discussion_id', {{ $discussion->id }})

                $.ajax({
                    type: 'POST',
                    url: "{{ route('storeForumDetail') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success) {
                            swal.fire({
                                title: 'Komen Baru Berhasil Dibuat',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if(result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                title: 'Komen Baru Gagal Dibuat',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if(result.isConfirmed) {

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
