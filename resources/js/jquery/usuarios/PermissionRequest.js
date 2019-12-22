
$(document).ready(function(){
    $('.roles-get').on('click', function(e){
        e.preventDefault()
        let url = $(this).attr('href');
        alert(url);
    })
});