(function($){
    function revealOnScroll() {
        $('.reveal').each(function(){
            const top = this.getBoundingClientRect().top;
            if (top < window.innerHeight - 80) {
                $(this).addClass('visible');
            }
        });
    }

    $(window).on('scroll', revealOnScroll);
    $(document).ready(function(){
        revealOnScroll();
        $('.mark-message').on('click', function(e){
            e.preventDefault();
            const btn = $(this);
            $.post('/admin/messages.php', {
                ajax: 1,
                message_id: btn.data('id'),
                action: btn.data('action')
            }, function(resp){
                if (resp.success) {
                    location.reload();
                }
            }, 'json');
        });
    });
})(jQuery);
