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
                            <a href="{{ route('profile.edit', $post->profile) }}"> {{ $post->user->profile->firstname . " " . $post->user->profile->lastname }}</a>
                        </span>
                            <span class="description">Publicado - {{ $post->created_at }}</span>
                        </div>
                        <!-- user-block -->
                        <p>
                            {{ $post->body }}
                        </p>
                        <p>
                            <a class="link-black text-sm mr-2" href="#">
                                <i class="fas fa-share mr-1"></i>
                                Compartir
                            </a>
                            <a class="link-black text-sm" href="#">
                                <i class="far fa-thumbs-up mr-1"></i>
                                Me gusta
                            </a>
                            <span class="float-right">
                            <a class="link-black text-sm" href="#">
                                <i class="far fa-comments mr-1">
                                    Comentarios (5)
                                </i>
                            </a>
                        </span>
                        </p>
                        <form class="form-horizontal" action="" method="post">
                            <div class="input-group input-group-sm mb-0">
                                <input class="form-control form-control-sm" type="text" name="comment" id="" placeholder="Commentario">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="submit">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- / .post -->
                </div>
            </div>
        </div>

    </div>
@endforeach
