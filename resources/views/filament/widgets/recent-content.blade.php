<x-filament::widget>
    <x-filament::card>
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 dark:border-white/10">
                    <th class="text-start py-2 font-medium text-gray-500 dark:text-gray-400">Title</th>
                    <th class="text-start py-2 font-medium text-gray-500 dark:text-gray-400">Type</th>
                    <th class="text-start py-2 font-medium text-gray-500 dark:text-gray-400">Status</th>
                    <th class="text-start py-2 font-medium text-gray-500 dark:text-gray-400">Updated</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($this->getRecords() as $record)
                    <tr class="border-b border-gray-100 dark:border-white/5 hover:bg-gray-50 dark:hover:bg-white/5">
                        <td class="py-2">
                            <a href="{{ $record['url'] }}" class="text-primary-600 hover:underline dark:text-primary-400">
                                {{ is_array($record['title']) ? ($record['title']['en'] ?? reset($record['title'])) : $record['title'] }}
                            </a>
                        </td>
                        <td class="py-2">
                            <span @class([
                                'inline-flex items-center rounded-md px-2 py-1 text-xs font-medium',
                                'bg-info-100 text-info-700 dark:bg-info-500/20 dark:text-info-400' => $record['type'] === 'Article',
                                'bg-warning-100 text-warning-700 dark:bg-warning-500/20 dark:text-warning-400' => $record['type'] === 'Event',
                                'bg-success-100 text-success-700 dark:bg-success-500/20 dark:text-success-400' => $record['type'] === 'Publication',
                            ])>
                                {{ $record['type'] }}
                            </span>
                        </td>
                        <td class="py-2">
                            <span @class([
                                'inline-flex items-center rounded-md px-2 py-1 text-xs font-medium',
                                'bg-success-100 text-success-700 dark:bg-success-500/20 dark:text-success-400' => $record['status'] === 'published',
                                'bg-warning-100 text-warning-700 dark:bg-warning-500/20 dark:text-warning-400' => $record['status'] === 'draft',
                                'bg-gray-100 text-gray-700 dark:bg-white/10 dark:text-gray-400' => !in_array($record['status'], ['published', 'draft']),
                            ])>
                                {{ $record['status'] }}
                            </span>
                        </td>
                        <td class="py-2 text-gray-500 dark:text-gray-400">
                            {{ $record['updated_at'] instanceof \Carbon\Carbon ? $record['updated_at']->diffForHumans() : \Carbon\Carbon::parse($record['updated_at'])->diffForHumans() }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-500 dark:text-gray-400">
                            No content found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-filament::card>
</x-filament::widget>
