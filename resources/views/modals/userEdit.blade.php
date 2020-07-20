 <!--Delete Item Modal-->

 <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Delete an item</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Promote or demote user</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <form action="#" method="POST">
                     @csrf
                     @method('PUT')
                     <select name="role">
                         {{-- @foreach($roles as $role)
                       <option value="{{ $role->id }}">{{ $role->name }}</option>
                         @endforeach --}}
                         <option value="1">Admin</option>
                         <option value="2">Cook</option>
                         <option value="3">Staff</option>
                     </select>
                     <button class="btn btn-primary" type="submit">Submit</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
