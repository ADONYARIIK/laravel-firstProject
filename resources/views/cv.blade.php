@php
    $icons = [
        'github' => 'fa-brands fa-github',
        'linkedin' => 'fa-brands fa-linkedin',
        'website' => 'fa-solid fa-globe',
        'email' => 'fa-solid fa-envelope',
        'phone' => 'fa-solid fa-phone',
    ];
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $cv['personal']['name']['first'] }}
        {{ $cv['personal']['name']['last'] }}
    </title>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100">

    <div class="max-w-7xl mx-auto lg:my-10 bg-white shadow-2xl">

        {{-- ========================= HEADER ========================= --}}

        <header class="bg-slate-800 text-white px-8 py-10 flex flex-col md:flex-row gap-8 items-center md:items-start">

            @if (!empty($cv['personal']['photo']))
                <img src="{{ $cv['personal']['photo'] }}" alt="Profile photo"
                    class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-white shadow-lg">
            @endif

            <div class="flex-1 text-center md:text-left">

                <h1 class="text-4xl md:text-5xl font-bold">

                    {{ $cv['personal']['name']['first'] }}

                    {{ $cv['personal']['name']['last'] }}

                </h1>

                <p class="mt-3 text-xl text-slate-300">

                    {{ $cv['personal']['position'] }}

                </p>

            </div>

        </header>

        {{-- ========================= CONTENT ========================= --}}

        <div class="grid grid-cols-1 lg:grid-cols-12">

            {{-- ===================================================== --}}
            {{-- ======================= SIDEBAR ===================== --}}
            {{-- ===================================================== --}}

            <aside class="lg:col-span-4 bg-slate-50 p-8 space-y-10 border-r border-slate-200">

                {{-- CONTACTS --}}

                @if (count($cv['personal']['contacts']))

                    <section>

                        <h2 class="uppercase tracking-widest font-bold text-slate-700 mb-5 border-b pb-2">
                            Contact
                        </h2>

                        <div class="space-y-4">

                            @foreach ($cv['personal']['contacts'] as $contact)
                                <div>

                                    <p class="text-xs uppercase text-slate-500">
                                        {{ $contact['label'] }}
                                    </p>

                                    <p class="text-sm break-all text-slate-700">
                                        {{ $contact['value'] }}
                                    </p>

                                </div>
                            @endforeach

                        </div>

                    </section>

                @endif

                {{-- LINKS --}}

                @if (count($cv['personal']['links']))

                    <section>

                        <h2 class="uppercase tracking-widest font-bold text-slate-700 mb-5 border-b pb-2">
                            Links
                        </h2>

                        <div class="space-y-3">

                            @foreach ($cv['personal']['links'] as $link)
                                <a href="{{ $link['url'] }}" target="_blank"
                                    class="block text-blue-600 hover:text-blue-800 break-all transition">

                                    @if (!empty($link['icon']))
                                        <i class="{{ $icons[$link['icon']] ?? 'fa-solid fa-link' }}"></i>
                                    @endif

                                    <span>
                                        {{ $link['title'] }}
                                    </span>

                                </a>
                            @endforeach

                        </div>

                    </section>

                @endif

                {{-- SKILLS --}}

                @foreach ($cv['skills'] as $skillGroup)
                    <section>

                        <h2 class="uppercase tracking-widest font-bold text-slate-700 mb-5 border-b pb-2">
                            {{ $skillGroup['title'] }}
                        </h2>

                        @if ($skillGroup['type'] === 'tags')
                            <div class="flex flex-wrap gap-2">

                                @foreach ($skillGroup['items'] as $item)
                                    <span class="px-3 py-1 rounded-full bg-slate-200 text-sm">

                                        {{ $item }}

                                    </span>
                                @endforeach

                            </div>
                        @elseif($skillGroup['type'] === 'levels')
                            <div class="space-y-3">

                                @foreach ($skillGroup['items'] as $language)
                                    <div class="flex justify-between text-sm">

                                        <span>

                                            {{ $language['name'] }}

                                        </span>

                                        <span class="font-semibold text-slate-600">

                                            {{ $language['level'] }}

                                        </span>

                                    </div>
                                @endforeach

                            </div>
                        @endif

                    </section>
                @endforeach

                {{-- INTERESTS --}}

                @if (count($cv['interests']))

                    <section>

                        <h2 class="uppercase tracking-widest font-bold text-slate-700 mb-5 border-b pb-2">
                            Interests
                        </h2>

                        <div class="flex flex-wrap gap-2">

                            @foreach ($cv['interests'] as $interest)
                                <span class="bg-slate-200 rounded-full px-3 py-1 text-sm">

                                    {{ $interest }}

                                </span>
                            @endforeach

                        </div>

                    </section>

                @endif

            </aside>

            {{-- ===================================================== --}}
            {{-- ========================= MAIN ====================== --}}
            {{-- ===================================================== --}}

            <main class="lg:col-span-8 p-8 space-y-12">

                {{-- ========================= SUMMARY ========================= --}}

                @if (!empty($cv['personal']['summary']))
                    <section>

                        <h2 class="text-2xl font-bold text-slate-800 mb-4 border-b pb-2">
                            Professional Summary
                        </h2>

                        <p class="leading-8 text-slate-700">
                            {{ $cv['personal']['summary'] }}
                        </p>

                    </section>
                @endif


                {{-- ========================= EXPERIENCE ========================= --}}

                @if (count($cv['experience']))

                    <section>

                        <h2 class="text-2xl font-bold text-slate-800 mb-8 border-b pb-2">
                            Work Experience
                        </h2>

                        <div class="space-y-10">

                            @foreach ($cv['experience'] as $job)
                                <article class="relative border-l-4 border-slate-300 pl-6">

                                    <div class="absolute w-4 h-4 rounded-full bg-slate-700 -left-[10px] top-2">
                                    </div>

                                    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-3">

                                        <div>

                                            <h3 class="text-xl font-bold text-slate-800">
                                                {{ $job['position'] }}
                                            </h3>

                                            <p class="font-semibold text-slate-600 mt-1">
                                                {{ $job['company'] }}
                                            </p>

                                            <p class="text-sm text-slate-500 mt-1">
                                                {{ $job['location'] }}
                                            </p>

                                        </div>

                                        <div class="text-sm text-slate-500 whitespace-nowrap">

                                            <span>

                                                {{ \Carbon\Carbon::parse($job['start_date'])->format('M Y') }}

                                            </span>

                                            —

                                            <span>

                                                @if ($job['currently_working'])
                                                    Present
                                                @else
                                                    {{ \Carbon\Carbon::parse($job['end_date'])->format('M Y') }}
                                                @endif

                                            </span>

                                        </div>

                                    </div>

                                    @if (count($job['highlights']))
                                        <ul class="list-disc pl-5 mt-5 space-y-2 text-slate-700">

                                            @foreach ($job['highlights'] as $highlight)
                                                <li>

                                                    {{ $highlight }}

                                                </li>
                                            @endforeach

                                        </ul>
                                    @endif

                                </article>
                            @endforeach

                        </div>

                    </section>

                @endif



                {{-- ========================= EDUCATION ========================= --}}

                @if (count($cv['education']))

                    <section>

                        <h2 class="text-2xl font-bold text-slate-800 mb-8 border-b pb-2">
                            Education
                        </h2>

                        <div class="space-y-8">

                            @foreach ($cv['education'] as $education)
                                <article class="border border-slate-200 rounded-xl p-6">

                                    <div class="flex flex-col lg:flex-row lg:justify-between gap-4">

                                        <div>

                                            <h3 class="text-xl font-bold text-slate-800">

                                                {{ $education['degree'] }}

                                                @if (!empty($education['field']))
                                                    —
                                                    {{ $education['field'] }}
                                                @endif

                                            </h3>

                                            <p class="mt-2 font-semibold text-slate-600">

                                                {{ $education['institution'] }}

                                            </p>

                                            @if (!empty($education['location']))
                                                <p class="text-sm text-slate-500 mt-1">

                                                    {{ $education['location'] }}

                                                </p>
                                            @endif

                                        </div>

                                        <div class="text-sm text-slate-500 whitespace-nowrap">

                                            {{ \Carbon\Carbon::parse($education['start_date'])->format('M Y') }}

                                            —

                                            {{ \Carbon\Carbon::parse($education['end_date'])->format('M Y') }}

                                        </div>

                                    </div>

                                    @if (!empty($education['description']))
                                        <p class="mt-5 text-slate-700 leading-7">

                                            {{ $education['description'] }}

                                        </p>
                                    @endif

                                    @if (!empty($education['gpa']))
                                        <div class="mt-5 text-sm font-semibold text-slate-700">

                                            GPA:
                                            {{ $education['gpa'] }}

                                        </div>
                                    @endif

                                    @if (count($education['achievements']))
                                        <div class="mt-6">

                                            <h4 class="font-semibold mb-3 text-slate-700">

                                                Achievements

                                            </h4>

                                            <ul class="list-disc pl-5 space-y-2 text-slate-700">

                                                @foreach ($education['achievements'] as $achievement)
                                                    <li>

                                                        {{ $achievement }}

                                                    </li>
                                                @endforeach

                                            </ul>

                                        </div>
                                    @endif

                                </article>
                            @endforeach

                        </div>

                    </section>

                @endif

                {{-- ========================= PROJECTS ========================= --}}

                @if (count($cv['projects']))

                    <section>

                        <h2 class="text-2xl font-bold text-slate-800 mb-8 border-b pb-2">
                            Projects
                        </h2>

                        <div class="grid gap-6">

                            @foreach ($cv['projects'] as $project)
                                <article class="border border-slate-200 rounded-xl p-6 hover:shadow-lg transition">

                                    <div class="flex flex-col lg:flex-row lg:justify-between gap-4">

                                        <div>

                                            <h3 class="text-xl font-bold text-slate-800">
                                                {{ $project['name'] }}
                                            </h3>

                                            @if (!empty($project['role']))
                                                <p class="text-slate-600 mt-1">
                                                    {{ $project['role'] }}
                                                </p>
                                            @endif

                                        </div>

                                        @if (!empty($project['status']))
                                            <span
                                                class="self-start bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                                {{ $project['status'] }}

                                            </span>
                                        @endif

                                    </div>

                                    <p class="mt-4 leading-7 text-slate-700">
                                        {{ $project['description'] }}
                                    </p>

                                    @if (count($project['technologies']))
                                        <div class="flex flex-wrap gap-2 mt-5">

                                            @foreach ($project['technologies'] as $tech)
                                                <span class="bg-slate-200 rounded-full px-3 py-1 text-sm">

                                                    {{ $tech }}

                                                </span>
                                            @endforeach

                                        </div>
                                    @endif

                                    <div class="flex flex-wrap gap-6 mt-6">

                                        @if (!empty($project['url']))
                                            <a href="{{ $project['url'] }}" target="_blank"
                                                class="text-blue-600 hover:text-blue-800">

                                                Live Demo

                                            </a>
                                        @endif

                                        @if (!empty($project['github']))
                                            <a href="{{ $project['github'] }}" target="_blank"
                                                class="text-blue-600 hover:text-blue-800">

                                                GitHub

                                            </a>
                                        @endif

                                    </div>

                                </article>
                            @endforeach

                        </div>

                    </section>

                @endif



                {{-- ========================= CERTIFICATES ========================= --}}

                @if (count($cv['certificates']))

                    <section>

                        <h2 class="text-2xl font-bold text-slate-800 mb-8 border-b pb-2">
                            Certificates
                        </h2>

                        <div class="grid md:grid-cols-2 gap-5">

                            @foreach ($cv['certificates'] as $certificate)
                                <article class="border rounded-xl p-5">

                                    <h3 class="font-bold text-lg">

                                        {{ $certificate['name'] }}

                                    </h3>

                                    <p class="text-slate-600 mt-2">

                                        {{ $certificate['issuer'] }}

                                    </p>

                                    <p class="text-sm text-slate-500 mt-2">

                                        {{ $certificate['date'] }}

                                    </p>

                                    @if (!empty($certificate['credential_id']))
                                        <p class="text-xs text-slate-500 mt-3">

                                            Credential ID:
                                            {{ $certificate['credential_id'] }}

                                        </p>
                                    @endif

                                    @if (!empty($certificate['url']))
                                        <a href="{{ $certificate['url'] }}" target="_blank"
                                            class="inline-block mt-4 text-blue-600">

                                            View Certificate

                                        </a>
                                    @endif

                                </article>
                            @endforeach

                        </div>

                    </section>

                @endif



                {{-- ========================= COURSES ========================= --}}

                @if (count($cv['courses']))

                    <section>

                        <h2 class="text-2xl font-bold text-slate-800 mb-8 border-b pb-2">
                            Courses
                        </h2>

                        <div class="space-y-4">

                            @foreach ($cv['courses'] as $course)
                                <article
                                    class="flex flex-col md:flex-row md:justify-between md:items-center border rounded-lg p-4 gap-3">

                                    <div>

                                        <h3 class="font-semibold">

                                            {{ $course['name'] }}

                                        </h3>

                                        <p class="text-slate-600">

                                            {{ $course['provider'] }}

                                        </p>

                                    </div>

                                    <div class="text-sm text-slate-500">

                                        {{ $course['date'] }}

                                    </div>

                                </article>
                            @endforeach

                        </div>

                    </section>

                @endif



                {{-- ========================= REFERENCES ========================= --}}

                @if (count($cv['references']))

                    <section>

                        <h2 class="text-2xl font-bold text-slate-800 mb-8 border-b pb-2">
                            References
                        </h2>

                        <div class="grid gap-5">

                            @foreach ($cv['references'] as $reference)
                                <article class="border rounded-xl p-6">

                                    <h3 class="text-lg font-bold">

                                        {{ $reference['name'] }}

                                    </h3>

                                    <p class="text-slate-600 mt-2">

                                        {{ $reference['position'] }}

                                    </p>

                                    <p class="text-slate-600">

                                        {{ $reference['company'] }}

                                    </p>

                                    <div class="mt-5 space-y-2 text-sm">

                                        @if (!empty($reference['email']))
                                            <p>

                                                {{ $reference['email'] }}

                                            </p>
                                        @endif

                                        @if (!empty($reference['phone']))
                                            <p>

                                                {{ $reference['phone'] }}

                                            </p>
                                        @endif

                                    </div>

                                </article>
                            @endforeach

                        </div>

                    </section>

                @endif

            </main>

        </div>

    </div>

</body>

</html>
