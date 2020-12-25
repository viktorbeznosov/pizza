@foreach($comments as $comment)
<li class="comment">
    <div class="vcard bio">
        <img src="@if(isset($comment->user)){{ asset($comment->user->image) }}@else {{ asset('assets/images/no-user.png') }} @endif" alt="Image placeholder">
    </div>
    <div class="comment-body">
        <h3>@if(isset($comment->user)){{ $comment->user->name }}@else {{ $comment->name }} @endif</h3>
        <div class="meta">@if(isset($comment->created_at)) {{ $comment->created_at->format('d.m.Y H:i:s') }} @endif</div>
        <p>{{ $comment->text }}</p>
        <p><a href="javascript:void(0)" class="reply">Reply</a></p>

        <div class="comment-form-wrap">
            <h3>Leave a comment</h3>
            <form action="{{ route('comment') }}" name="comments" method="post" class="added-form">
                {{ csrf_field() }}
                <input type="hidden" name="parent" value="{{ $comment->id }}">
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                @if(!Auth::user())
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                @endif

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="text" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                </div>

            </form>
        </div>

    </div>
    @if($comment->hasChildren())
        <ul class="children">
            @include('comments', ['comments' => $comment->getChildren(), 'blog' => $blog])
        </ul>
    @endif

</li>
@endforeach
