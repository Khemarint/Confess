<div>
    @auth()
    @if (Auth::user()->likes($brain))
    <form action="{{route('brains.unlike',$brain->id)}}" method="POST">
        @csrf
        <button type="submit" href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
            </span> {{ $brain->likes()->count() }} </button>
    </form>
    @else
    <form action="{{route('brains.like',$brain->id)}}" method="POST">
        @csrf
        <button type="submit" href="#" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
            </span> {{ $brain->likes()->count() }} </button>
    </form>
    @endif
    @guest
    <a href="{{route('login')}}" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
    </span> {{ $brain->likes()->count() }} </a>
    @endguest
    @endauth
</div>
