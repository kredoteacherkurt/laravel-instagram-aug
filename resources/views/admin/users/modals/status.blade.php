<div class="modal fade" id="deactivate-user-{{ $user->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-danger">
                <h5 class="modal-title" id="modalTitleId" class="text-danger">
                    <i class="fa-solid fa-slash-user"></i> Deactivate user
                </h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <p class="text-danger">Are you sure to deactivate user {{ $user->name }} </p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.users.deactivate',$user->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm">Deactivate</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="activate-user-{{ $user->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-success">
                <h5 class="modal-title" id="modalTitleId" class="text-success">
                    <i class="fa-solid fa-check-user"></i> Activate user
                </h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <p class="text-success">Are you sure to Activate user {{ $user->name }} </p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.users.restore',$user->id)}}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-success btn-sm">Activate</button>
                </form>
            </div>
        </div>
    </div>
</div>


