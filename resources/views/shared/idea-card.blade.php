<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $brain->user->getImageURL() }}"
                    alt="{{ $brain->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $brain->user->id) }}">
                            {{ $brain->user->name }}
                        </a></h5>
                </div>
            </div>
            <div class="d-flex">
                <a href="{{ route('brain.show', $brain->id) }}">View</a>
                @auth()
                    @can('update', $brain)
                        <a class="mx-1" href="{{ route('brain.edit', $brain->id) }}">Edit</a>
                        <form method="POST" action="{{ route('brain.destroy', $brain->id) }}">
                            @csrf
                            @method('delete')
                            <button class="ms-1 btn btn-danger btn-sm">X</button>
                        </form>
                    @endcan
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('brain.update', $brain->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $brain->content }}</textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark mb-2 btn-sm"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $brain->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('Confess.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $brain->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>
