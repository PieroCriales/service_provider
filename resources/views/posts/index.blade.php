@foreach ($service->posts->reverse() as $post)
    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{ Gravatar::get($post->user->email) }}" alt="user image">
                            <span class="username">
                                <a href="{{ route('profile.edit', $post->user->profile) }}"> {{ $post->user->profile->firstname . " " . $post->user->profile->lastname }}</a>
                            </span>
                            <span class="description">Publicado - {{ $post->created_at->setTimezone('America/Lima') }}</span>
                        </div>
                        <!-- user-block -->
                        <p>
                            {{ $post->body }}
                        </p>
                        <p>
                            <div class = 'btn-group'>
                                <button class="btn btn-default btn-xs" id=button type="button">
                                        <i class="fas fa-share mr-1"></i>
                                        Compartir
                                </button>

                                @if ( in_array($post->id, $liked_posts))
                                    @foreach ($post->likes as $like)
                                        @if (in_array($like->id, $liked_id))
                                            <form id="link-destroy" method="post" action="{{ route('like.destroy', $like) }}" >
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-primary btn-xs" id=button type="submit">
                                                    <i class="far fa-thumbs-up mr-1"></i>
                                                    Me gusta ({{$post->likes->count()}})
                                                </button>
                                            </form>
                                        @endif
                                    @endforeach
                                @else
                                    <form id="link" action="{{ route('like.store')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                                        <button class="btn btn-default btn-xs" id=button type="submit">
                                            <i class="far fa-thumbs-up mr-1"></i>
                                            Me gusta ({{$post->likes->count()}})
                                        </button>
                                    </form>
                                @endif
                                <span class="float-right">
                                    <button class="btn btn-default btn-xs" id=button type="button">
                                        <i class="far fa-comments mr-1"></i>
                                        Comentarios ({{$post->comments->count()}})
                                    </button>
                                </span>
                            </div>
                        </p>
                    </div>
                    <!-- / .post -->
                </div>
            </div>
        </div>
        <div class="card-footer card-comments">
            @foreach ($post->comments as $comment)
            <div class="card-comment">
              <img class="img-circle img-sm" src="{{ Gravatar::get($comment->user->email) }}" alt="User image">
                <div class="comment-text">
                    <span class="username">
                        <a style="color:#495057" href="{{ route('profile.show', $comment->user->profile) }}">{{ $comment->user->profile->firstname . ' ' . $comment->user->profile->lastname }}</a>
                        <span class="text-muted float-right">{{ $comment->created_at->setTimezone('America/Lima') }}</span>
                    </span>
                    <!-- /.username -->
                    {{ $comment->body }}
                </div>
                <!-- ./comment-text -->
            </div>
            <!-- /.card-comment -->
            @endforeach

            <div class="card-footer">
                <form class="form-horizontal" action="{{ route('comment.store') }}" method="post">
                    {{csrf_field()}}
                    <div class="input-group input-group-sm mb-0">
                        <input class="form-control form-control-sm" type="text" name="body" id="" placeholder="Respuesta">
                        <input type="hidden" name="post_id" id="" value="{{ $post->id }}">
                        <input type="hidden" name="user_id" id="" value="{{ \Auth::user()->id }}">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endforeach
