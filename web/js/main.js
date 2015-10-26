$(document).ready(function(){
    $('.data-tooltip').tooltip({});
    $('.remove_menu_items input[type=checkbox]').on('change', function(event){
        event.preventDefault();
        if ($('.remove_menu_items input[type=checkbox]:checked').length) {
            $('.do_delete').removeAttr('disabled');
        }
        else {
            $('.do_delete').attr({'disabled':'disable'});
        }
    });
    $('.do_delete').on('click', function(event){
        event.preventDefault();
        alertify.confirm('Are you sure?', function(confirm){
            if (confirm) {
                $('.remove_menu_items').submit();
                $(this).closest('form').submit(); console.log(['submit', $(this).closest('form')]);
                return true;
            }
        });
    });
});