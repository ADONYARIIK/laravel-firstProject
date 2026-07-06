<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CV</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111;
            line-height: 1.5;
        }

        .container {
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .name {
            font-size: 22px;
            font-weight: bold;
        }

        .position {
            font-size: 14px;
            color: #555;
        }

        .section {
            margin-bottom: 18px;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            margin-bottom: 8px;
            padding-bottom: 3px;
        }

        .two-col {
            width: 100%;
        }

        .left {
            width: 35%;
            vertical-align: top;
        }

        .right {
            width: 65%;
            vertical-align: top;
        }

        .box {
            margin-bottom: 10px;
        }

        .label {
            font-size: 10px;
            color: #666;
        }

        .value {
            font-size: 12px;
        }

        ul {
            margin: 0;
            padding-left: 15px;
        }

        .skill {
            display: inline-block;
            padding: 2px 6px;
            border: 1px solid #ddd;
            margin: 2px;
            font-size: 10px;
        }

        .experience {
            margin-bottom: 12px;
        }

        .company {
            font-weight: bold;
        }

        .small {
            font-size: 10px;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="container">

        {{-- HEADER --}}
        <div class="header">

            <div class="name">
                {{ $cv['personal']['name']['first'] }}
                {{ $cv['personal']['name']['last'] }}
            </div>

            <div class="position">
                {{ $cv['personal']['position'] }}
            </div>

        </div>

        <table class="two-col">

            <tr>

                {{-- LEFT --}}
                <td class="left">

                    {{-- CONTACTS --}}
                    <div class="section">
                        <div class="section-title">Contacts</div>

                        @foreach ($cv['personal']['contacts'] as $contact)
                            <div class="box">
                                <div class="label">{{ $contact['label'] }}</div>
                                <div class="value">{{ $contact['value'] }}</div>
                            </div>
                        @endforeach
                    </div>

                    {{-- LINKS --}}
                    <div class="section">
                        <div class="section-title">Links</div>

                        @foreach ($cv['personal']['links'] as $link)
                            <div class="box">
                                {{ $link['title'] }}
                            </div>
                        @endforeach
                    </div>

                    {{-- SKILLS --}}
                    <div class="section">
                        <div class="section-title">Skills</div>

                        @foreach ($cv['skills'] as $group)
                            <div class="small">{{ $group['title'] }}</div>

                            @foreach ($group['items'] as $item)
                                @if (is_array($item))
                                    <div class="small">
                                        {{ $item['name'] }} - {{ $item['level'] }}
                                    </div>
                                @else
                                    <span class="skill">{{ $item }}</span>
                                @endif
                            @endforeach

                            <br>
                        @endforeach
                    </div>

                    {{-- INTERESTS --}}
                    <div class="section">
                        <div class="section-title">Interests</div>

                        @foreach ($cv['interests'] as $i)
                            <div class="small">{{ $i }}</div>
                        @endforeach
                    </div>

                </td>

                {{-- RIGHT --}}
                <td class="right">

                    {{-- SUMMARY --}}
                    <div class="section">
                        <div class="section-title">Summary</div>
                        <div>{{ $cv['personal']['summary'] }}</div>
                    </div>

                    {{-- EXPERIENCE --}}
                    <div class="section">
                        <div class="section-title">Experience</div>

                        @foreach ($cv['experience'] as $job)
                            <div class="experience">

                                <div class="company">
                                    {{ $job['position'] }} - {{ $job['company'] }}
                                </div>

                                <div class="small">
                                    {{ $job['start_date'] }} -
                                    {{ $job['currently_working'] ? 'Present' : $job['end_date'] }}
                                    | {{ $job['location'] }}
                                </div>

                                <ul>
                                    @foreach ($job['highlights'] as $h)
                                        <li>{{ $h }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endforeach
                    </div>

                    {{-- EDUCATION --}}
                    <div class="section">
                        <div class="section-title">Education</div>

                        @foreach ($cv['education'] as $edu)
                            <div class="box">
                                <b>{{ $edu['degree'] }}</b> - {{ $edu['institution'] }}
                                <div class="small">
                                    {{ $edu['start_date'] }} - {{ $edu['end_date'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- PROJECTS --}}
                    <div class="section">
                        <div class="section-title">Projects</div>

                        @foreach ($cv['projects'] as $project)
                            <div class="box">
                                <b>{{ $project['name'] }}</b>

                                <div class="small">
                                    {{ $project['description'] }}
                                </div>

                                <div class="small">
                                    {{ implode(', ', $project['technologies']) }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                </td>

            </tr>

        </table>

    </div>

</body>

</html>
