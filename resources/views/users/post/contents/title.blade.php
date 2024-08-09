<div class="card-header bg-white py-3">
    <div class="row align-items-center">
        <div class="col-auto">
            {{-- icon or avatar --}}
            <a href="">
                @if ($post->user->avatar)
                    <img src="#" alt="#" class="rounded-circle avatar-sm">
                @else
                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                @endif
            </a>
        </div>
        <div class="col ps-0"> 
            {{-- name --}}
            <a href="#" class="text-decoration-none">
                {{$post->user->name}}
            </a>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn btn-sm shadow-none"  data-bs-toggle="dropdown" >
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
            </div>
        </div>
    </div>
</div>
