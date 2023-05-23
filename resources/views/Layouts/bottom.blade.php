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