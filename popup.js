// popup based on HTML already on the page
$('#popup1').w2popup();

// overlay based on the same HTML
$(this).w2overlay($('#popup1 [rel=body]').html(), { css: { width: '600px', padding: '10px' } });