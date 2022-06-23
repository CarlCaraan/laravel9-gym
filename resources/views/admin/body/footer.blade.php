<footer class="footer text-center">
    @php
    $adminsiteinfo = DB::table('admin_site_infos')->first();
    @endphp
    {!! $adminsiteinfo->footer !!}
</footer>