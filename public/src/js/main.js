var postId = 0;
var statusBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function (event) {
   //console.log('it works');
    event.preventDefault();

    statusBodyElement = event.target.parentNode.parentNode.childNodes[3];
    var statusBody = statusBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#status-body').val(statusBody);
    $('#exampleModalCenter').modal();

});

$('#edit-modal').on('click', function () {

    $.ajax({
       method : 'POST',
       url : urlEdit,
       data : { body : $('#status-body').val(), postId : postId, _token : token }
   })
       .done(function (msg) {
           //console.log(msg['message']);
           //console.log(JSON.stringify(msg));
           $(statusBodyElement).text(msg['body-status']);
           $('#exampleModalCenter').modal('hide');
       });
});

$('.like').on('click', function (event) {
    event.preventDefault();
    var isLike = event.target.previousElementSibling == null;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    //console.log(isLike);
    $.ajax({
        method : 'POST',
        url : urlLike,
        data : { isLike : isLike, postId : postId, _token : token }
    })
        .done(function () {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this status' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this status' : 'Dislike';

            if(isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});
