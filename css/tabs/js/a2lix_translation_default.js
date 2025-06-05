$(function() {
    $('ul.translation-locales').on('click', 'a', function(evt) {
        evt.preventDefault();

        var target = $(this).attr('data-target');
        $('li:has(a[data-target="' + target + '"]), div' + target, 'div.translation').addClass('active')
            .siblings().removeClass('active');
    });

    $('div.translation-locales-selector').on('change', 'input', function(evt) {
        var $tabs = $('ul.translation-locales');

        $('div.translation-locales-selector').find('input').each(function() {
            $tabs.find('li:has(a[data-target=".translation-fields-' + this.value + '"])').toggle(this.checked);
        });

        $('ul.translation-locales li:visible:first').find('a').trigger('click');
    }).trigger('change');
});
