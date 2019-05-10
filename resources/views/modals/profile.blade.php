<style type="text/css">
.form-group{
  height: 250px;
  overflow-y: auto;
}
</style>
<!-- START SHOW FOLLOWERS -->
<div class="modal fade in" id="m_followers">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal">
               <center>Followers</center>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
            <div class="modal-body">
               <div class="form-group">
                  @foreach($user->follows as $key)
                  <h4>{{$key->user->name}}</h4>
                  @endforeach
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Save</button>
            </div>
      </div>
   </div>
</div>
<!-- END SHOW FOLLOWERS -->

<!-- START SHOW FOLLOWINGS -->
<div class="modal fade in" id="m_followings">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modal">
               <center>Followers</center>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
            <div class="modal-body">
               <div class="form-group">
                  @foreach($user->following as $key)
                  <h4>{{$key->users->name}}</h4>
                  @endforeach
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Save</button>
            </div>
      </div>
   </div>
</div>
<!-- END SHOW FOLLOWINGS -->