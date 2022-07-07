<div class="section-header">
    @if($isNotIndex)
        <div class="section-header-back">
            <a href="{{ $backUrl ?? url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
    @endif
    <div {{ $attributes->merge(['class' => 'col-md-12 pl-1']) }}>
        <h1>{{ $title }}</h1>
    </div>
</div>
