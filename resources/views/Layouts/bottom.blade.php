
    <footer class="bg-white py-10 mt-10 border-t border-t-slate-200">
        <div class="container mx-auto px-6">
            <div class="flex items-center">
                <img src="{{asset('images/logo-dark.svg')}}" width="50" alt="logo">
                <div class="text-sm ml-5">
                    <p>All Rights Reserved</p>
                    <p>Designed and devloped by 1st year BSIS</p>
                </div>
            </div>
        </div>
    </footer>
    
<script>
    // Account toggle
    $(function() {
        $('#acct-btn').click(function(e) {
            e.stopPropagation();
            $('.acct-dropdown-content').toggle()
        });

        $(document).on('click', function(e) {
            if (!$('.acct-dropdown-content').is(e.target) && $('.acct-dropdown-content').has(e.target).length === 0) {
                $('.acct-dropdown-content').hide();
            }
        });
    });
</script>
</body>
</html>