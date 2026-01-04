<div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-50 px-6 pb-4 border-r border-gray-200">
    <div class="flex h-16 shrink-0 items-center gap-2">
        <div class="bg-blue-600 p-1.5 rounded-lg">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.499 5.585 51.727 51.727 0 00-2.658.813m-15.482 0a50.55 50.55 0 00-1.653-.205m15.482 0a50.55 50.55 0 001.653-.205m-15.482 0C5.324 10.378 5.309 10.603 5.3 10.828h13.4" />
            </svg>
        </div>
        <span class="font-bold text-gray-900 text-lg tracking-wide">E-RAPOR</span>
    </div>
    <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
                <ul role="list" class="-mx-2 space-y-1">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="{{ request()->routeIs('dashboard') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                            <svg class="{{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} h-6 w-6 shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                </ul>
            </li>

            @if(Auth::user()->role === 'admin')
                <li>
                    <div class="text-xs font-semibold leading-6 text-gray-400 uppercase tracking-wider">Master Data</div>
                    <ul role="list" class="-mx-2 mt-2 space-y-1">
                        <li>
                            <a href="{{ route('academic-years.index') }}"
                                class="{{ request()->routeIs('academic-years.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                <svg class="{{ request()->routeIs('academic-years.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} h-6 w-6 shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                                Tahun Akademik
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('classes.index') }}"
                                class="{{ request()->routeIs('classes.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                <svg class="{{ request()->routeIs('classes.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} h-6 w-6 shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 22.5a3 3 0 003-3v-8.174a.75.75 0 00-.22-.53l-8.72-8.682a.75.75 0 00-1.06 0l-8.72 8.682a.75.75 0 00-.22.53V19.5a3 3 0 003 3h12zM6 20.25v-8.762l6-5.98 6 5.98v8.762H6z" />
                                </svg>
                                Data Kelas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('subjects.index') }}"
                                class="{{ request()->routeIs('subjects.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                <svg class="{{ request()->routeIs('subjects.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} h-6 w-6 shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                                Mata Pelajaran
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="{{ request()->routeIs('users.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                <svg class="{{ request()->routeIs('users.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} h-6 w-6 shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                                User Management
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li>
                <div class="text-xs font-semibold leading-6 text-gray-400 uppercase tracking-wider">Akademik</div>
                <ul role="list" class="-mx-2 mt-2 space-y-1">
                    <li>
                        <a href="{{ route('students.index') }}"
                            class="{{ request()->routeIs('students.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                            <svg class="{{ request()->routeIs('students.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} h-6 w-6 shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            Data Siswa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('course-sections.index') }}"
                            class="{{ request()->routeIs('course-sections.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                            <svg class="{{ request()->routeIs('course-sections.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} h-6 w-6 shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.499 5.585 51.727 51.727 0 00-2.658.813m-15.482 0a50.55 50.55 0 00-1.653-.205m15.482 0a50.55 50.55 0 001.653-.205m-15.482 0C5.324 10.378 5.309 10.603 5.3 10.828h13.4" />
                            </svg>
                            Pembelajaran
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('grades.index') }}"
                            class="{{ request()->routeIs('grades.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                            <svg class="{{ request()->routeIs('grades.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} h-6 w-6 shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            Input Nilai
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>