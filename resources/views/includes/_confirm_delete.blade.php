<a href="" data-toggle="modal" class="btn btn-outline-danger btn-sm" data-target="#deleteConfirm-{{ $id }}"><i class="fa fa-trash-o"></i></a>
<!-- Modal -->
<div class="modal fade" id="deleteConfirm-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation???</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ $action }}" method="post">
        @csrf @method('delete')
            <div class="modal-body">
                <h3>Are you sure want to delete this?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-sm btn-outline-danger">Yes</button>
            </div>
      </form>
     
    </div>
  </div>
</div>