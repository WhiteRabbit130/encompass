<aside id="cp_sideBar"
       class="z-[90] flex-col flex top-0 bottom-0 fixed md:sticky w-64 md:dark:bg-gray-800 md:bg-gray-100 bg-gray-300/50 dark:bg-gray-800/50
          hover:md:sticky hover:fixed group/aside max-h-screen hover:transition-[width] shadow
          backdrop-blur-xl ">

    <div  class=" dark:bg-gray-800/20 md:dark:bg-gray-800 " >
        <a class="flex items-center justify-center gap-x-4 px-8 h-16
                   text-2xl font-medium dark:text-slate-100 text-gray-700 focus:outline-none"
           type="button">
            <span><i class="fa fa-dashboard dark:font-extralight"></i></span>
            <span  class="md:block pt-1 group-hover/aside:block ">
                  {{ $header }}
            </span>
        </a>
    </div>
    <ul class="overflow-y-auto flex-1 mt-4 mb-7">

        <li class="relative group" >
            <button
                    class="flex items-center justify-center md:justify-start w-full  !py-5 pl-3
                        text-base font-normal dark text-slate-700 transition duration-75
                         md:hover:bg-gray-300 hover:bg-gray-400/30 dark:text-white
                         md:dark:hover:bg-gray-700 dark:hover:bg-gray-700/50"
                    type="button" @click="toggle_render(i)">

                         <span class="flex-shrink-0 w-6 h-6 text-lg
                          duration-75 group-hover:text-gray-900 dark:group-hover:text-white transition-all group-hover:scale-125  "
                               v-html=" item.meta.icon ">
                             <i class="fa-thin fa-gauge mr-1"></i>
                         </span>
                <x-nav-link :href="route('dashboard')"
                            class="flex relative items-center !px-2 !py-3 !pl-6 w-full text-base text-gray-900
                                     transition duration-75 group dark:hover:text-gray-700 whitespace-nowrap border-0
                                     before:absolute before:content-[''] before:bottom-0 before:left-7 before:right-7
                                     before:h-1 before:rounded hover:before:bg-fuchsia-600 "
                            :active="request()->routeIs('dashboard')">
                    {{ __('Analytics') }} {{--Or Charts--}}
                </x-nav-link>
            </button>
        </li>

       {{-- <li class="relative group" >
            <button
                    class="flex items-center justify-center md:justify-start w-full  !py-5 pl-3
                        text-base font-normal dark text-slate-700 transition duration-75
                         md:hover:bg-gray-300 hover:bg-gray-400/30 dark:text-white
                         md:dark:hover:bg-gray-700 dark:hover:bg-gray-700/50"
                    type="button" @click="toggle_render(i)">

                         <span class="flex-shrink-0 w-6 h-6 text-lg
                          duration-75 group-hover:text-gray-900 dark:group-hover:text-white transition-all group-hover:scale-125  "
                               v-html=" item.meta.icon ">
                               <i class="fa-thin fa-chalkboard-teacher mr-1"></i>
                         </span>
                <x-nav-link :href="route('teacher.index')" :active="request()->routeIs('teacher.index')"
                            class="flex   relative items-center !px-2 !py-3  !pl-6 w-full text-base text-gray-900
                                     transition duration-75 group dark:hover:text-gray-700 whitespace-nowrap border-0
                                     before:absolute before:content-[''] before:bottom-0 before:left-7 before:right-7
                                     before:h-1 before:rounded hover:before:bg-fuchsia-600 "  >
                    {{ __('Teacher') }}
                </x-nav-link>
            </button>
        </li>--}}

    </ul>


    <div class="sticky flex justify-center items-center py-2">
        <a class="rounded-full w-10 h-10 flex items-center justify-center
                   bg-gray-400 dark:bg-slate-900 text-gray-700 dark:text-gray-100" type="button" >
            <i :class="[isClosed?`fa-angles-left`:`fa-angles-right`]" class="fa-duotone "></i>
        </a>
    </div>

{{--    <div v-if="(!online || showBackOnline)" class="p-2 relative">
        <div id="statusNetwork" class=" z-50 absolute left-2 bottom-2 px-5 py-3 flex items-center
                  dark:bg-gray-200 bg-gray-700 space-x-3 bg-opacity-95 rounded-lg">
            <div class="relative flex items-center justify-center ">
                <i :class="[!online?'after:w-full text-red-600 after:border-b-[2px]'
                           :'after:w-0 text-green-600  after:border-b-[0px]']"
                   class="fa fa-wifi filter text-xl after:content-[''] flex items-center justify-center
                           after:rotate-45  after:absolute after:bg-current after:filter
                           after:rounded relative animate-pulse after:transition-all after:h-1
                           dark:after:border-gray-200 after:border-gray-700 "></i>
            </div>
            <div class="dark:text-gray-800 text-white text-sm">
                <div v-if="!online">
                    <p class="text-lg font-light ">Off line</p>
                    <p class="text-xs dark:text-gray-500 text-gray-300 font-bold  whitespace-nowrap">Verifier voter
                        connection internet</p>
                </div>
                <div v-else class="">
                    <p class="text-lg font-light ">On line</p>
                    <p class="text-xs dark:text-gray-500 text-gray-300 font-bold  whitespace-nowrap">Votre connexion
                        Internet a été restaurée
                    </p>
                </div>
            </div>
            <div v-if="!online">
                <button class="flex items-center justify-center p-2 dark:bg-gray-300 bg-gray-900 dark:text-gray-700
                    text-gray-300 rounded-full w-7 h-7 hover:dark:bg-gray-400 transition-colors hover:bg-gray-600 hover:text-white"
                        @click="event=>{toggleStatusOnline({translateX:'-150%'})}">
                    <i class="fa-thin fa-times-circle"></i>
                </button>
            </div>
        </div>
    </div>--}}
</aside>
