@extends('admin.layout')

@section('content')
<div class="header" style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: flex-end;">
    <div>
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Site Settings</h1>
        <p style="color: var(--text-muted);">Customize your portfolio's branding, SEO, and contact information.</p>
    </div>
    <div style="background: rgba(99, 102, 241, 0.1); padding: 0.5rem 1rem; border-radius: 2rem; display: flex; align-items: center; gap: 0.5rem;">
        <i data-lucide="shield-check" style="color: var(--primary); width: 18px;"></i>
        <span style="font-size: 0.875rem; color: var(--text-white);">System Live</span>
    </div>
</div>

@if(session('success'))
    <div class="card" style="background: rgba(34, 197, 94, 0.1); border-left: 4px solid #22c55e; color: #22c55e; padding: 1rem 1.5rem; display: flex; align-items: center; gap: 1rem;">
        <i data-lucide="check-circle" style="width: 20px;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Branding Section -->
    <div class="card" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem;">
            <i data-lucide="palette" style="color: var(--primary);"></i>
            <h3 style="margin: 0;">Identity & Branding</h3>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2.5rem;">
            <div>
                <div class="form-group">
                    <label>Site Logo</label>
                    <input type="file" name="site_logo" class="dropify" data-default-file="{{ isset($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : '' }}" data-height="150">
                    <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.5rem;">Recommended size: 200x50px (PNG/SVG)</p>
                </div>

                <div class="form-group" style="margin-top: 2rem;">
                    <label>Favicon</label>
                    <input type="file" name="site_favicon" class="dropify" data-default-file="{{ isset($settings['site_favicon']) ? asset('storage/' . $settings['site_favicon']) : '' }}" data-height="100">
                </div>
            </div>

            <div>
                <div class="form-group">
                    <label>Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] ?? '' }}" placeholder="e.g. John Doe Portfolio">
                </div>
                <div class="form-group">
                    <label>Site Tagline</label>
                    <input type="text" name="site_tagline" class="form-control" value="{{ $settings['site_tagline'] ?? '' }}" placeholder="e.g. Full Stack Developer & UI Designer">
                </div>
            </div>
        </div>
    </div>

    <!-- Contact & Social Section -->
    <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 1.5rem;">
        <div class="card" style="padding: 2rem;">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem;">
                <i data-lucide="mail" style="color: var(--primary);"></i>
                <h3 style="margin: 0;">Contact Details</h3>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div class="form-group">
                    <label>Public Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="contact_phone" class="form-control" value="{{ $settings['contact_phone'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label>Office Address</label>
                <textarea name="contact_address" class="form-control" rows="3">{{ $settings['contact_address'] ?? '' }}</textarea>
            </div>
        </div>

        <div class="card" style="padding: 2rem;">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem;">
                <i data-lucide="search" style="color: var(--primary);"></i>
                <h3 style="margin: 0;">SEO & Footer</h3>
            </div>
            <div class="form-group">
                <label>Footer Credits</label>
                <input type="text" name="footer_text" class="form-control" value="{{ $settings['footer_text'] ?? '' }}">
            </div>
            <div class="form-group">
                <label>Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="4">{{ $settings['meta_description'] ?? '' }}</textarea>
            </div>
        </div>
    </div>

    <div style="position: sticky; bottom: 2rem; background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(20px); border: 1px solid var(--border); border-radius: 1.5rem; padding: 1.25rem 2rem; display: flex; justify-content: space-between; align-items: center; z-index: 100; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
        <p style="margin: 0; font-size: 0.875rem; color: var(--text-muted);">Make sure to save your changes before leaving.</p>
        <button type="submit" class="btn-primary" style="padding: 0.8rem 2.5rem; font-size: 1rem; font-weight: 600; display: flex; align-items: center; gap: 0.75rem; box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);">
            <i data-lucide="save"></i> Save All Settings
        </button>
    </div>
</form>

@endsection
