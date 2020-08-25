<ul>
    @foreach($comments as $comment)
    <li @if(!$comment->hasChildren()) data-jstree='{ "type" : "file" }' @endif>
        <a href="{{ route('admin.comments.edit', $comment->id) }}">
            @if(isset($comment->user)) {{ $comment->user->name }} @else {{ $comment->name }} @endif
{{--            @if(isset($comment->created_at)) {{ $comment->created_at->format('d.m.Y') }} @endif--}}
        </a>
        @if($comment->hasChildren())
            @include('admin.comments_list', ['comments' => $comment->getChildren()])
        @endif
    </li>
    @endforeach
</ul>