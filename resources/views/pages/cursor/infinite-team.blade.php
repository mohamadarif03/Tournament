@php
    use App\Enums\ProductStatusEnum;
    use App\Enums\UserRoleEnum;
    use App\Helpers\CurrencyHelper;
    use App\Helpers\RatingHelper;
    use App\Helpers\UserHelper;
@endphp
@forelse ($teams as $team)
    <a href="{{ route('team-detail', $team->id) }}" class="loopTeam">
        <div class="team__item">
            <div class="team__thumb">
                <div class="flex justify-center"><img src="{{ asset('storage/' . $team->logo) }}" height="190"
                        width="190" style="min-width: 190px; min-height:190px; max-width: 190px; max-height: 190px"
                        alt="img"></div>
            </div>
            <div class="team__content">
                <h4 class="name">
                    <div>{{ $team->name }}</div>
                </h4>
                <span class="designation">{{ $team->game->name }}</span>
            </div>
        </div>
    </a>
@empty
    <p class="loopTeam">Tidak Ada Tim Data</p>
@endforelse
