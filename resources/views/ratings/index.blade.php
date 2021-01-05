<div class="rating_average">
    <b>Calificacion Promedio :</b>
    @php
        $prom = 0;
        foreach ($service->ratings as $rating){
            $prom= $prom + $rating->rating_star/$rating->count();
        }
        $prom = round($prom, 1,PHP_ROUND_HALF_UP);
    @endphp
    <input id="input-3" name="input-3" class="rating rating-loading" data-min="0" data-max="5" disabled="true" data-size="md" data-step="0.1" value="<?php echo $prom; ?>">
    <b>Votos totales: {{ $service->ratings->count() }}</b>


</div> 

@foreach ($service->ratings->reverse() as $rating)
    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <!-- Ratings -->
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{ Gravatar::get($rating->user->email) }}" alt="user image">
                            <span class="username">
                                <a href="{{ route('profile.edit', $rating->user->profile) }}"> {{ $rating->user->profile->firstname . " " . $rating->user->profile->lastname }}</a>
                            </span>
                            <span class="description">Publicado - {{ $rating->created_at->setTimezone('America/Lima') }}</span>
                        </div>
                        <!-- user-block -->
                        <p>
                        <div class="container">
                            Calificación:
                            <input id="input-2" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-size="rating-xs" data-step="1" value="{{ $rating->rating_star }}" disabled="true">
                        </div>
                        </p>
                        <p>
                            {{ $rating->rating_com }}
                        </p>

                    </div>
                    <!-- / .rating -->
                </div>
            </div>
        </div>
    </div>
@endforeach