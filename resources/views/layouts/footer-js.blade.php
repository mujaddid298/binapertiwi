<!-- Required Js -->
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

@if ($pc_dark_layout == 'default')
<script>
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        dark_layout = 'true';
    } else {
        dark_layout = 'false';
    }
    layout_change_default();
    if (dark_layout == 'true') {
        layout_change('dark');
    } else {
        layout_change('light');
    }
</script>
@endif

@if ($pc_dark_layout != 'default')
    @if ($pc_dark_layout == 'true')
    <script>layout_change('dark');</script>
    @endif
    @if ($pc_dark_layout == 'false')
    <script>layout_change('light');</script>
    @endif
@endif

@if ($pc_box_container == 'true')
<script>change_box_container('true');</script>
@endif

@if ($pc_box_container == 'false')
<script>change_box_container('false');</script>
@endif

@if ($pc_rtl_layout == 'true')
<script>layout_rtl_change('true');</script>
@endif

@if ($pc_rtl_layout == 'false')
<script>layout_rtl_change('false');</script>
@endif

@if (!empty($pc_preset_theme))
<script>preset_change("{{ $pc_preset_theme }}");</script>
@endif

@if (!empty($font_name))
<script>font_change("{{ $font_name }}");</script>
@endif
    
