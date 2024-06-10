@auth()
<h4> Confess your feelings </h4>
<div class="row">
    <form action="{{route('brain.create')}}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth
@guest()
<h4>Login to confess your feeling.</h4>
@endguest
