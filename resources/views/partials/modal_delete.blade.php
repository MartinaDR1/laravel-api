<button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#modal{{$project->id}}">
    <i class="fas fa-trash fa-sm fa-fw"></i>
</button>

<div class="modal fade" id="modal{{$project->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modal{{$project->title}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content" id="modal">
            <div class="modal-header">
                <h5 class="modal-title" id="modal{{$project->title}}">Delete {{$project->title}}?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <span class="p-2">
                    Are you sure you want to delete the <strong>{{$project->title}}</strong>?
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <form action="{{route('admin.projects.destroy', $project)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger" title="Delete" >Conferm</button>
                </form>
            </div>
        </div>
    </div>
</div>
