@extends('layouts.app')
@section('content')
<div class="container">
  <a href="#" data-toggle="modal" data-target="#m_newpuisi">
    add
  </a>
   <div class="row justify-content-center">
      <div class="col-md-8">
         @foreach($puisis as $puisi)
         <div class="card">
            <div class="card-header">
               <a href="{{route('profile_index', $puisi->User->name)}}">Photo {{$puisi->User->name}} </a>
               <div class="btn-group dropright pull-right">
                  @if($puisi->user_id == Auth::user()->id)
                  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="sr-only">Toggle Dropright</span>
                  </button>
                  <div class="dropdown-menu">
                     <a class="dropdown-item" href="#" data-toggle="modal" data-puisi="{{ $puisi->isi }}" data-target="#m_editpuisi">edit</a>
                     <a class="dropdown-item" href="{{route('puisi_delete', $puisi->id)}}">Delete</a>
                  </div>
                  @endif
               </div>
            </div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               {{ $puisi->isi }}
               <br>
               @if($puisi->Like->where('user_id', Auth::user()->id)->count() == 0 )
               <a style="margin-left: 560px;" href="{{route('puisi_like', $puisi->id)}}">Like</a>
               @elseif($puisi->Like->where('user_id', Auth::user()->id)->count() != 0)
               <a style="margin-left: 560px;" href="{{route('puisi_unlike', $puisi->id)}}">UnLike</a>
               @endif
               <a style="margin-left: 560px;" href="#" data-toggle="modal" data-target="#m_commentpuisi" data-puisi_comment="{{ $puisi->isi }}" data-id="{{ $puisi->id }}">Komen gan</a>
            </div>
            <table>
               <tr>
                  <th>Liker : </th>
               </tr>
               <tr>
                  <td><a href="#" data-target="#m_showlike" data-toggle="modal">{{$puisi->Like->count()}}</a></td>
               </tr>
            </table>
         </div>
         <br>
         <!-- MODAL -->
         @include('modals.puisi')
         <!-- END MODAALLL -->
         @endforeach
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
     $("#m_editpuisi").on('show.bs.modal', function(event){
       console.log('Modal opened !');

       var button = $(event.relatedTarget)
       var puisis = button.data('puisi')

       $(this).find('.modal-body .form-group #puisi').val(puisis);
    });
     $("#m_commentpuisi").on('show.bs.modal', function(event){
      console.log('Modal opened !');

      var button = $(event.relatedTarget);
      var puisi_comments = button.data('puisi_comment');
      var ids = button.data('id');
      var html = '';
      $.ajax({
        url:"{{route('puisi_getComment')}}"+ "/" +ids,
        method:"GET",
        dataType:'json',
        contentType:'application/json',
        success: function(data) {
          $.each(data, function(key, value){
            html += '<div class="col-12">'+value.user.name+': '+value.comment+'</div>'+'<a href="{{url('comment/like/')}}">Sukasuka</a>';
          });
            $('#rowComment').html(html);
        },
        error: function(xHR, judul, apalah) {
          console.log(xHR);
        }
      });

      $(this).find('.modal-body .form-group #puisicomment').val(puisi_comments);
      $(this).find('.modal-body .form-group #puisiid').val(ids);
      $(this).find('.modal-body .form-group .zzz').val(ids);
     });
  });
</script>
@endsection