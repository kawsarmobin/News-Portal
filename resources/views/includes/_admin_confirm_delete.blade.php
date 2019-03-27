<a href="" data-toggle="modal" data-target="#deleteConfirm-{{ $id }}"><i class="material-icons">delete_outline</i></a>
<!-- Modal -->
<div class="modal fade" id="deleteConfirm-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation???</h5>
        <br>
      </div>
      <form action="{{ $action }}" method="post">
        @csrf @method('delete')
            <div class="modal-body">
                <h3>Are you sure want to delete this?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-sm btn-danger">Yes</button>
            </div>
      </form>
     
    </div>
  </div>
</div>