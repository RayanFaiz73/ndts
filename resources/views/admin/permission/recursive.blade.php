<tr class="bg-theme-primary-700 dark:bg-gray-800">
    <th scope="row" class="{{$class}} px-6 py-2 font-mediumtext-theme-primary-100 whitespace-nowrap dark:text-white">
        <input type="hidden" name="menus[{{ $child_menu->id }}][menu_id]" value="{{ $child_menu->id }}">
        <label class="relative inline-flex items-center cursor-pointer" for="{{ $child_menu->id }}">
            <input type="checkbox" class="sr-only peer" onclick="toggleAll(this,'toggleAll_{{ $child_menu->id }}')"
                value="1" id="{{ $child_menu->id }}"
                @if ($edit)
                    @if($role->permissions->where('menu_id' , $child_menu->id)->where('create' , 1)->isEmpty())
                    @elseif($role->permissions->where('menu_id' , $child_menu->id)->where('read' , 1)->isEmpty())
                    @elseif($role->permissions->where('menu_id' , $child_menu->id)->where('update' , 1)->isEmpty())
                    @elseif($role->permissions->where('menu_id' , $child_menu->id)->where('delete' , 1)->isEmpty())
                    @else
                    checked
                    @endif
                @endif
                >
            <div
                class="w-14 h-7 bg-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-theme-primary-300 dark:peer-focus:ring-theme-primary-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-theme-success-200">
            </div>
            <span class="ml-3 text-sm font-mediumtext-theme-primary-100 dark:text-gray-300">{{ $child_menu->name }}</span>
        </label>
    </th>
    <td class="px-6 py-2 ">
        <div class="d-flex justify-center">
            <label class="relative inline-flex items-center cursor-pointer" for="create{{ $child_menu->id }}">
                <input type="checkbox" class="sr-only peer toggleAll_{{ $child_menu->id }}"
                    name="menus[{{ $child_menu->id }}][permissions][create]" value="1"
                    id="create{{ $child_menu->id }}"
                    @if ($edit)
                        @if($role->permissions->where('menu_id' , $child_menu->id)->where('create' , 1)->isNotEmpty()) checked @endif
                    @endif>
                <div
                    class="toggleAll_{{ $child_menu->id }} w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-theme-success-300 dark:peer-focus:ring-theme-success-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-theme-warning-500">
                </div>
                <span class="ml-3 text-sm font-mediumtext-theme-primary-100 dark:text-gray-300"></span>
            </label>
        </div>
    </td>
    <td class="px-6 py-2 ">
        <div class="d-flex justify-center">
            <label class="relative inline-flex items-center cursor-pointer" for="read{{ $child_menu->id }}">
                <input type="checkbox" class="sr-only peer toggleAll_{{ $child_menu->id }}"
                    name="menus[{{ $child_menu->id }}][permissions][read]" value="1"
                    id="read{{ $child_menu->id }}"
                    @if ($edit)
                        @if($role->permissions->where('menu_id' , $child_menu->id)->where('read' , 1)->isNotEmpty()) checked @endif
                    @endif>
                <div
                    class="toggleAll_{{ $child_menu->id }} w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-theme-success-300 dark:peer-focus:ring-theme-success-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-theme-warning-500">
                </div>
                <span class="ml-3 text-sm font-mediumtext-theme-primary-100 dark:text-gray-300"></span>
            </label>
        </div>
    </td>
    <td class="px-6 py-2 ">
        <div class="d-flex justify-center">
            <label class="relative inline-flex items-center cursor-pointer" for="update{{ $child_menu->id }}">
                <input type="checkbox" class="sr-only peer toggleAll_{{ $child_menu->id }}"
                    name="menus[{{ $child_menu->id }}][permissions][update]" value="1"
                    id="update{{ $child_menu->id }}"
                    @if ($edit)
                        @if($role->permissions->where('menu_id' , $child_menu->id)->where('update' , 1)->isNotEmpty()) checked @endif
                    @endif>
                <div
                    class="toggleAll_{{ $child_menu->id }} w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-theme-success-300 dark:peer-focus:ring-theme-success-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-theme-warning-500">
                </div>
                <span class="ml-3 text-sm font-mediumtext-theme-primary-100 dark:text-gray-300"></span>
            </label>
        </div>
    </td>
    <td class="px-6 py-2 ">
        <div class="d-flex justify-center">
            <label class="relative inline-flex items-center cursor-pointer" for="delete{{ $child_menu->id }}">
                <input type="checkbox" class="sr-only peer toggleAll_{{ $child_menu->id }}"
                    name="menus[{{ $child_menu->id }}][permissions][delete]" value="1"
                    id="delete{{ $child_menu->id }}"
                    @if ($edit)
                        @if($role->permissions->where('menu_id' , $child_menu->id)->where('delete' , 1)->isNotEmpty()) checked @endif
                    @endif>
                <div
                    class="toggleAll_{{ $child_menu->id }} w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-theme-success-300 dark:peer-focus:ring-theme-success-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-theme-warning-500">
                </div>
                <span class="ml-3 text-sm font-mediumtext-theme-primary-100 dark:text-gray-300"></span>
            </label>
        </div>
    </td>
</tr>


@if ($child_menu->menus)
@foreach ($child_menu->childrenMenus as $childMenu)
<tr>
    <th colspan="5" scope="col"
    class="px-6 pt-3 text-base font-bold text-theme-primary-100 dark:text-white decoration-theme-primary-500">{{ $child_menu->name }}
    <span class="text-gray-500 text-xs">({{__('Parent')}})</span>
</th>
</tr>
{{-- {{dd($edit,$role)}} --}}
        @include('admin.permission.recursive', ['child_menu' => $childMenu, 'class' =>'pb-3', 'edit' => $edit])
    @endforeach
@endif
