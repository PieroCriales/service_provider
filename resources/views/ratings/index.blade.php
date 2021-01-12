<b>Calificacion Promedio</b>
    <input id="input-3" name="input-3" class="rating rating-loading" data-min="0" data-max="5" data-size="md" data-step="0.1" value="{{ $prom }}" disabled="true">

@foreach ($service->purchases->reverse() as $purchase)
    @if ($purchase->rating->comment)
    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <!-- Ratings -->
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{ Gravatar::get($purchase->user->email) }}" alt="user image">
                            <span class="username">
                                <a href="{{ route('profile.edit', $purchase->user->profile) }}"> {{ $purchase->user->profile->firstname . " " . $purchase->user->profile->lastname }}</a>
                            </span>
                            <span class="description">Publicado - {{ $purchase->rating->created_at->setTimezone('America/Lima') }}</span>
                        </div>
                        <!-- user-block -->
                        <p>
                        <div class="container">
                            Calificación:
                            <input id="input-2" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-size="rating-xs" data-step="1" value="{{ $purchase->rating->type_rating_id }}" disabled="true">
                        </div>
                        </p>
                        <p>
                            {{ $purchase->rating->comment }}
                        </p>

                    </div>
                    <!-- / .rating -->
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach