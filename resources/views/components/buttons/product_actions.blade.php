<div class="flex flex-wrap items-center space-x-2 gap-y-2">
    <x-buttons.show :model="$model" />
    <x-buttons.edit :model="$model" />
    @if ($model->is_active)
    <x-buttons.deactivate :model="$model" />
    @else
    <x-buttons.activate :model="$model" />
    @endif
    <x-buttons.delete :model="$model" />
    @if ($model->available_qty != null && $model->available_qty > 0)
    <x-buttons.plain bgColor="bg-red-500" wireClick="$emit('setOutOfStock', {{ $model->id }} )" title="{{ __('Set product to out of stock') }}">
        <x-lineawesome-ban-solid class="w-5 h-5" />
    </x-buttons.plain>
    @endif

    @if ($model->vendor->has_sub_categories ?? false)
    <x-buttons.plain wireClick="$emit('initiateSubcategoriesAssign', {{ $model->id }} )" title="">
        <x-heroicon-o-document-duplicate class="w-5 h-5 mr-2" />
        <span class="text-xs">{{__('Subcategories')}}</span>
    </x-buttons.plain>

    @else
    <x-buttons.plain wireClick="$emit('initiateAssign', {{ $model->id }} )" title="">
        <x-heroicon-o-book-open class="w-5 h-5 mr-2" />
        <span class="text-xs">{{__('Menu')}}</span>
    </x-buttons.plain>
    @endif
</div>
