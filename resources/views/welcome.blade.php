<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? 'Portfolio' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ ($settings['favicon'] ?? null) ? asset('storage/' . $settings['favicon']) : '' }}">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="#" class="logo">
                    @if($settings['logo'] ?? false)
                        <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" style="height: 40px;">
                    @else
                        {{ $settings['site_name'] ?? 'Portfolio' }}
                    @endif
                </a>
                <ul class="nav-links">
                    <li><a href="#about">About</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#experience">Experience</a></li>
                    <li><a href="#education">Education</a></li>
                </ul>
                <div style="display: flex; gap: 1rem; align-items: center;">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Admin</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                @if(($info->image ?? false) && $info)
                    <img src="{{ asset('storage/' . $info->image) }}" alt="Profile" class="profile-pic">
                @endif
                <h1>Hi, I'm <span style="color: var(--primary);">{{ $info->name ?? 'User' }}</span></h1>
                <p class="role">{{ $info->role ?? 'Full Stack Developer' }}</p>
                <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto 2rem;">{{ $info->bio ?? 'Crafting high-performance web applications with modern technologies.' }}</p>
                <div style="display: flex; gap: 1rem; justify-content: center;">
                    <a href="#projects" class="btn btn-primary">Featured Work <i data-lucide="arrow-right"></i></a>
                    <a href="#contact" class="btn glass">Contact Me</a>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section id="about" style="padding: 4rem 0;">
            <div class="container">
                <div class="grid">
                    <div class="card glass">
                        <i data-lucide="mail" style="color: var(--primary); margin-bottom: 1rem;"></i>
                        <h3>Email</h3>
                        <p style="color: var(--text-muted);">{{ $info->email ?? 'N/A' }}</p>
                    </div>
                    <div class="card glass">
                        <i data-lucide="map-pin" style="color: var(--primary); margin-bottom: 1rem;"></i>
                        <h3>Location</h3>
                        <p style="color: var(--text-muted);">{{ $info->address ?? 'N/A' }}</p>
                    </div>
                    <div class="card glass">
                        <i data-lucide="share-2" style="color: var(--primary); margin-bottom: 1rem;"></i>
                        <h3>Socials</h3>
                        <div style="display: flex; gap: 1rem; margin-top: 0.5rem;">
                            @if(($info->github ?? false) && $info) <a href="{{ $info->github }}" target="_blank"><i data-lucide="github"></i></a> @endif
                            @if(($info->linkedin ?? false) && $info) <a href="{{ $info->linkedin }}" target="_blank"><i data-lucide="linkedin"></i></a> @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" style="padding: 8rem 0;">
            <div class="container">
                <h2 class="section-title">Projects</h2>
                <div class="grid">
                    @foreach($projects as $project)
                    <div class="card glass">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="project-img">
                        @endif
                        <h3>{{ $project->title }}</h3>
                        <p style="color: var(--text-muted); margin: 1rem 0; font-size: 0.95rem;">{{ $project->description }}</p>
                        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1.5rem;">
                            @foreach(explode(',', $project->tech_stack) as $tech)
                                <span style="font-size: 0.75rem; background: var(--glass); padding: 0.25rem 0.75rem; border-radius: 99px; border: 1px solid var(--border);">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                        <div style="display: flex; gap: 1rem;">
                            @if($project->demo_url) <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.85rem;">Live Link</a> @endif
                            @if($project->repo_url) <a href="{{ $project->repo_url }}" target="_blank" class="btn glass" style="padding: 0.5rem 1rem; font-size: 0.85rem;">Code</a> @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Experience & Education -->
        <section id="experience" style="padding: 8rem 0; background: var(--glass);">
            <div class="container">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem;">
                    <div>
                        <h2 class="section-title" style="text-align: left;">Experience</h2>
                        <div class="timeline">
                            @foreach($experiences as $exp)
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <div class="timeline-date">{{ $exp->duration }}</div>
                                <h3 style="font-size: 1.1rem;">{{ $exp->role }}</h3>
                                <p style="color: var(--primary);">{{ $exp->company }}</p>
                                <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 0.5rem;">{{ $exp->description }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="education">
                        <h2 class="section-title" style="text-align: left;">Education</h2>
                        <div class="timeline">
                            @foreach($educations as $edu)
                            <div class="timeline-item">
                                <div class="timeline-dot" style="background: var(--secondary); box-shadow: 0 0 10px var(--secondary);"></div>
                                <div class="timeline-date" style="color: var(--secondary);">{{ $edu->year }}</div>
                                <h3 style="font-size: 1.1rem;">{{ $edu->degree }}</h3>
                                <p style="color: var(--text-muted);">{{ $edu->institution }}</p>
                                @if($edu->result) <p style="font-size: 0.8rem; color: var(--primary);">{{ $edu->result }}</p> @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Training Section -->
        <section id="training" style="padding: 8rem 0;">
            <div class="container">
                <h2 class="section-title">Certifications & Training</h2>
                <div class="grid">
                    @foreach($trainings as $training)
                    <div class="card glass" style="border-left: 4px solid var(--primary);">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <div>
                                <h3 style="font-size: 1.1rem;">{{ $training->title }}</h3>
                                <p style="color: var(--text-muted); margin-top: 0.25rem;">{{ $training->organization }}</p>
                            </div>
                            <span style="font-size: 0.8rem; color: var(--primary); font-weight: 600;">{{ $training->year }}</span>
                        </div>
                        @if($training->duration)
                            <p style="font-size: 0.8rem; margin-top: 0.5rem; opacity: 0.7;">Duration: {{ $training->duration }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" style="padding: 8rem 0; background: var(--glass);">
            <div class="container">
                <h2 class="section-title">Technical Expertise</h2>
                <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
                    @foreach($skills as $skill)
                    <div class="skill-item">
                        <div style="display: flex; justify-content: space-between;">
                            <span>{{ $skill->name }}</span>
                            <span style="color: var(--primary);">{{ $skill->percentage }}%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ $skill->percentage }}%;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <h2 class="logo" style="margin-bottom: 2rem;">{{ $info->name ?? 'Portfolio' }}</h2>
            <p style="color: var(--text-muted);">© {{ date('Y') }} All Rights Reserved. Built with passion.</p>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
