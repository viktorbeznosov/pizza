@foreach($comments as $comment)
<li class="comment">
    <div class="vcard bio">
        <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image placeholder">
    </div>
    <div class="comment-body">
        <h3>John Doe 1</h3>
        <div class="meta">June 27, 2018 at 2:21pm</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
        <p><a href="javascript:void(0)" class="reply">Reply</a></p>

        <div class="comment-form-wrap">
            <h3>Leave a comment</h3>
            <form action="{{ route('comment') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>

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
    @if(count($comment->getChilds()) > 0)
        <ul class="children">
            @include('comments', $comment->getChilds())
        </ul>
    @endif

</li>
@endforeach