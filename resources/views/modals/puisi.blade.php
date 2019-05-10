<!-- START NEW -->
<div class="modal fade in" id="m_newpuisi">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal">
               <center>Coretan Baru</center>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{route('puisi_savepost')}}" method="POST">
            @csrf
            <div class="modal-body">
               <div class="form-group">
                  <label for="message" class="col-form-label">Puisi:</label>
                  <textarea class="form-control" name="puisi"></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Save</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- END -->

<!-- START EDIT -->
<div class="modal fade in" id="m_editpuisi">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal">
               <center>Edit</center>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{route('puisi_editpost')}}" method="POST">
            @csrf
            <div class="modal-body">
               <div class="form-group">
                  <label for="message" class="col-form-label">Puisi:</label>
                  <input type="hidden" name="id" value="sasa">
                  <textarea class="form-control" name="puisi" id="puisi"></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Save</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- END EDIT -->

<!-- START COMMENT -->
<div class="modal fade in" id="m_commentpuisi">
   <div class="modal-dialog">
      <div class="modal-content">

         <form action="{{route('puisi_postcomment')}}" method="POST">
            @csrf
            <div class="modal-body">
               <div class="form-group">
                  <label for="message" class="col-form-label">Puisi:</label>
                  <input type="text" name="id" class="zzz">
                  <textarea class="form-control" name="puisi" id="puisicomment" readonly></textarea>
                  <hr>
                  <textarea class="form-control" name="comment" placeholder="Komentarr.."></textarea>
               </div>
               <div class="form-group row" id="rowComment">
                 
               </div>
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Send !</button>
          </div>
       </form>
    </div>
 </div>
</div>
<!-- END COMMENT -->

<!-- SHOW LIKE -->
<style type="text/css">
.form-groups{
  height: 250px;
  overflow-y: auto;
}
</style>
<div class="modal fade in" id="m_showlike">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal">
               <center>Likes</center>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
            <div class="modal-body">
               <div class="form-groups">
                  @foreach($puisi->Like as $key)
                  <h4>{{$key->User->name}}</h4>
                  @endforeach
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Save</button>
            </div>
      </div>
   </div>
</div>
<!-- END SHOW LIKE -->