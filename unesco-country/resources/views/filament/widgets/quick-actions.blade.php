<x-filament-widgets::widget>
    <x-filament::section heading="Quick Actions">
        <div class="flex flex-wrap gap-2">
            <x-filament::button
                tag="a"
                href="{{ \App\Filament\Resources\ArticleResource::getUrl('create') }}"
                icon="heroicon-m-plus"
                size="sm"
            >
                New Article
            </x-filament::button>
            <x-filament::button
                tag="a"
                href="{{ \App\Filament\Resources\EventResource::getUrl('create') }}"
                icon="heroicon-m-plus"
                size="sm"
                color="gray"
            >
                New Event
            </x-filament::button>
            <x-filament::button
                tag="a"
                href="{{ \App\Filament\Resources\PublicationResource::getUrl('create') }}"
                icon="heroicon-m-plus"
                size="sm"
                color="gray"
            >
                New Publication
            </x-filament::button>
            <x-filament::button
                tag="a"
                href="{{ \App\Filament\Resources\ProgrammeResource::getUrl('create') }}"
                icon="heroicon-m-plus"
                size="sm"
                color="gray"
            >
                New Programme
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
