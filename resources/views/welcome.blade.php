<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? 'My Portfolio' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="#" class="logo">{{ $info->name ?? 'Portfolio' }}</a>
                <ul class="nav-links">
                    <li><a href="#about">About</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#experience">Experience</a></li>
                </ul>
                <div style="display: flex; gap: 1rem; align-items: center;">
                    <button class="theme-toggle" id="theme-toggle">
                        <i data-lucide="sun" id="sun-icon"></i>
                        <i data-lucide="moon" id="moon-icon" style="display: none;"></i>
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Admin</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <h1>{{ $info->name ?? 'Welcome' }}</h1>
                <p>{{ $info->role ?? 'Full Stack Developer' }}</p>
                <p style="margin-bottom: 2rem;">{{ $info->bio ?? 'Passionate about building beautiful things.' }}</p>
                <div style="display: flex; gap: 1rem; justify-content: center;">
                    <a href="#projects" class="btn btn-primary">View Projects</a>
                    <a href="#contact" class="btn" style="border: 1px solid var(--border);">Contact Me</a>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about">
            <div class="container">
                <h2 class="section-title">About Me</h2>
                <div class="grid">
                    <div class="card">
                        <h3>Personal Info</h3>
                        <p style="margin-top: 1rem;"><strong>Email:</strong> {{ $info->email ?? 'N/A' }}</p>
                        <p><strong>Location:</strong> {{ $info->address ?? 'N/A' }}</p>
                        <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                            @if($info->github ?? false)
                                <a href="{{ $info->github }}" target="_blank" style="color: var(--text);"><i data-lucide="github"></i></a>
                            @endif
                            @if($info->linkedin ?? false)
                                <a href="{{ $info->linkedin }}" target="_blank" style="color: var(--text);"><i data-lucide="linkedin"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <h3>Skills Summary</h3>
                        <p>Specializing in modern web technologies to create seamless digital experiences.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" style="background: rgba(99, 102, 241, 0.05);">
            <div class="container">
                <h2 class="section-title">My Skills</h2>
                <div class="grid">
                    @foreach($skills as $skill)
                    <div class="card">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span style="font-weight: 600;">{{ $skill->name }}</span>
                            <span style="color: var(--primary);">{{ $skill->percentage }}%</span>
                        </div>
                        <div style="width: 100%; height: 8px; background: rgba(0,0,0,0.1); border-radius: 4px; overflow: hidden;">
                            <div style="width: {{ $skill->percentage }}%; height: 100%; background: var(--primary);"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects">
            <div class="container">
                <h2 class="section-title">Featured Projects</h2>
                <div class="grid">
                    @foreach($projects as $project)
                    <div class="card">
                        <h3>{{ $project->title }}</h3>
                        <p style="color: var(--text-muted); margin: 1rem 0;">{{ $project->description }}</p>
                        <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.5rem;">
                            <span style="font-size: 0.75rem; background: rgba(99, 102, 241, 0.1); color: var(--primary); padding: 0.25rem 0.75rem; border-radius: 9999px;">{{ $project->tech_stack }}</span>
                        </div>
                        <div style="display: flex; gap: 1rem;">
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-primary" style="padding: 0.5rem 1.25rem; font-size: 0.875rem;">Live Demo</a>
                            @endif
                            @if($project->repo_url)
                                <a href="{{ $project->repo_url }}" target="_blank" class="btn" style="border: 1px solid var(--border); padding: 0.5rem 1.25rem; font-size: 0.875rem;">Source Code</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Experience Section -->
        <section id="experience" style="background: rgba(99, 102, 241, 0.05);">
            <div class="container">
                <h2 class="section-title">Work Experience</h2>
                <div style="max-width: 800px; margin: 0 auto;">
                    @foreach($experiences as $exp)
                    <div class="card" style="margin-bottom: 1.5rem; position: relative;">
                        <span style="position: absolute; top: 2rem; right: 2rem; color: var(--primary); font-weight: 600;">{{ $exp->duration }}</span>
                        <h3>{{ $exp->role }}</h3>
                        <p style="color: var(--primary); font-weight: 500;">{{ $exp->company }}</p>
                        <p style="color: var(--text-muted); margin-top: 1rem;">{{ $exp->description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <footer style="padding: 4rem 0; border-top: 1px solid var(--border); text-align: center;">
        <div class="container">
            <p>&copy; {{ date('Y') }} {{ $info->name ?? 'Portfolio' }}. Built with Laravel.</p>
        </div>
    </footer>

    <script>
        lucide.createIcons();

        // Theme Toggle Logic
        const themeToggle = document.getElementById('theme-toggle');
        const sunIcon = document.getElementById('sun-icon');
        const moonIcon = document.getElementById('moon-icon');
        const html = document.documentElement;

        themeToggle.addEventListener('click', () => {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            html.setAttribute('data-theme', newTheme);
            
            if (newTheme === 'dark') {
                sunIcon.style.display = 'block';
                moonIcon.style.display = 'none';
            } else {
                sunIcon.style.display = 'none';
                moonIcon.style.display = 'block';
            }
        });
    </script>
</body>
</html>
